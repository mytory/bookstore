<?php

class MytoryImportBooks
{

    function __construct()
    {
        add_action('admin_menu', [$this, 'addMenu']);
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


}

new MytoryImportBooks();

