<?php

class MytoryImportBooks
{

    function __construct()
    {
        add_action('admin_menu', [$this, 'addMenu']);
        add_action('admin_enqueue_scripts', [$this, 'scripts']);
        add_action('wp_ajax_import_books', [$this, 'import']);
    }

    public function addMenu()
    {
        add_submenu_page(
            'edit.php?post_type=book',
            '책 가져오기',
            '가져오기',
            'publish_posts',
            'import-books',
            function () {
                include get_template_directory() . '/admin-pages/import-books-form.php';

                if (!empty($_GET['query'])) {
                    $request_page = (!empty($_GET['request_page'])) ? $_GET['request_page'] : 1;
                    $this->result($_GET['query'], $request_page);
                }
            }
        );
    }

    public function result($query, $request_page)
    {
        $response = $this->get($query, $request_page);

        $response_code = wp_remote_retrieve_response_code($response);
        $response_message = wp_remote_retrieve_response_message($response);
        $headers = wp_remote_retrieve_headers($response);
        $body = json_decode(wp_remote_retrieve_body($response));

        $body->documents = $this->markDuplications($body->documents);

        include get_template_directory() . '/admin-pages/import-books-result.php';
    }


    public function get($query, $page = 1)
    {
        $url = 'https://dapi.kakao.com/v3/search/book?';
        $query_string = http_build_query([
            'query' => $query,
            'size' => 50,
            'page' => $page,
        ]);

        $args = [
            'httpversion' => '1.1',
            'headers' => [
                'Authorization' => 'KakaoAK ' . KAKAO_REST_API_KEY,
            ],
        ];

        return wp_remote_get($url . $query_string, $args);
    }

    public function scripts()
    {
        $current_screen = get_current_screen();

        if ($current_screen->id === 'book_page_import-books') {
            wp_enqueue_script(
                'import-books',
                get_template_directory_uri() . '/js/import-books.js',
                ['jquery'],
                '1.0',
                true
            );
        }
    }

    public function import()
    {
        $book = json_decode(base64_decode($_POST['base64EncodedBook']));

        try {
            $post_id = $this->insertBook($book);

            if (!empty($book->authors)) {
                $this->insertAuthors($post_id, $book);
            }

            if (!empty($book->translators)) {
                $this->insertTranslators($post_id, $book);
            }

            if (!empty($book->thumbnail)) {
                $this->insertCover($post_id, $book);
            }

            $this->insertEtc($post_id, $book);

            $response = [
                'result' => 'success',
                'message' => $book->title . ' 입력 완료.',
            ];

        } catch (\Exception $e) {
            $response = [
                'result' => 'fail',
                'message' => $e->getMessage(),
            ];
        }

        echo json_encode($response);
        die();
    }

    /**
     * @param $post_id
     * @param $book
     * @return array|false|WP_Error
     * @throws Exception
     */
    private function insertAuthors($post_id, $book)
    {
        $result = wp_set_post_terms($post_id, $book->authors, 'book_author', true);

        if ($result === false) {
            throw new Exception('저자 입력중 post_id에 0이 들어왔습니다.');
        }

        if (is_wp_error($result)) {
            $wp_error = $result;
            throw new Exception('저자 입력중 에러. ' . $wp_error->get_error_code() . ': ' . $wp_error->get_error_message());
        }
        return $result;
    }

    /**
     * @param $post_id
     * @param $book
     * @return array|false|WP_Error
     * @throws Exception
     */
    private function insertTranslators($post_id, $book)
    {
        $result = wp_set_post_terms($post_id, $book->translators, 'book_translator', true);

        if ($result === false) {
            throw new Exception('역자 입력중 post_id에 0이 들어왔습니다.');
        }

        if (is_wp_error($result)) {
            $wp_error = $result;
            throw new Exception('역자 입력중 에러. ' . $wp_error->get_error_code() . ': ' . $wp_error->get_error_message());
        }

        return $result;
    }

    /**
     * @param $book
     * @return int|WP_Error
     * @throws Exception
     */
    private function insertBook($book)
    {
        $post_id = wp_insert_post([
            'post_title' => $book->title,
            'post_content' => $book->contents,
            'post_status' => 'publish', // private
            'post_type' => 'book',
        ], true);

        if (is_wp_error($post_id)) {
            $wp_error = $post_id;
            throw new Exception('책 입력중 에러. ' . $wp_error->get_error_code() . ': ' . $wp_error->get_error_message());
        }
        return $post_id;
    }

    /**
     * @param $post_id
     * @param $book
     * @throws Exception
     */
    private function insertCover($post_id, $book)
    {
        try {
            $parsed = parse_url($book->thumbnail);

            // $parsed['query'] is like fname=http%3A%2F%2Ft1.daumcdn.net%2Flbook%2Fimage%2F1467038
            parse_str($parsed['query'], $query);
            if (!empty($query['fname'])) {
                $cover_url = $query['fname'];
            } else {
                $cover_url = $book->thumbnail;
            }


            $attachment_id = crb_insert_attachment_from_url($cover_url, "{$book->isbn}.jpg", $post_id);
            update_post_meta($post_id, 'cover_id', $attachment_id);
            set_post_thumbnail($post_id, $attachment_id);
        } catch (\Exception $e) {
            throw $e;
        }

    }

    private function insertEtc($post_id, $book)
    {
        update_post_meta($post_id, 'price', $book->price);
        update_post_meta($post_id, 'isbn', $book->isbn);
        update_post_meta($post_id, 'published_date', date('Y-m-d', strtotime($book->datetime)));
    }

    private function markDuplications($books)
    {
        foreach ($books as $i => $book) {
            // $book->isbn이 이미 들어와 있는지 확인한다.

            $the_query = new WP_Query([
                'post_type' => 'book',
                'meta_query' => [
                    [
                        'key' => 'isbn',
                        'value' => $book->isbn,
                    ],
                ],
            ]);

            // 들어와 있으면 $book->duplication = true
            // 없으면 $book->duplication = false
            $books[$i]->is_duplication = false;
            if ($the_query->post_count) {
                $books[$i]->is_duplication = true;
            }
        }

        return $books;
    }
}

new MytoryImportBooks();

