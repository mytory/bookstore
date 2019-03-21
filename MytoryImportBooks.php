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
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    include get_template_directory() . '/admin-pages/import-books-form.php';
                }
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $this->result();
                }
            }
        );
    }

    public function result()
    {
        $response = $this->get($_POST['query']);

        $response_code = wp_remote_retrieve_response_code($response);
        $response_message = wp_remote_retrieve_response_message($response);
        $headers = wp_remote_retrieve_headers($response);
        $body = json_decode(wp_remote_retrieve_body($response));

        include get_template_directory() . '/admin-pages/import-books-form.php';
        include get_template_directory() . '/admin-pages/import-books-result.php';
    }


    public function get($query)
    {
        $url = 'https://dapi.kakao.com/v3/search/book?';
        $query_string = http_build_query([
            'query' => $query,
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



            // 표지를 임포트.

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
}

new MytoryImportBooks();

