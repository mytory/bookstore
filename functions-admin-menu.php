<?php
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=book',
        '책 가져오기',
        '가져오기',
        'publish_posts',
        'import-books',
        function () {
            include get_template_directory() . '/admin-pages/import-books-form.php';

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $response = mbs_remote_books($_POST['query']);

                $response_code = wp_remote_retrieve_response_code($response);
                $response_message = wp_remote_retrieve_response_message($response);
                $headers = wp_remote_retrieve_headers($response);
                $body = json_decode(wp_remote_retrieve_body($response));

                include get_template_directory() . '/admin-pages/import-books-result.php';

            }
        }
    );
});


function mbs_remote_books($query)
{
    $url = 'https://dapi.kakao.com/v3/search/book?';
    $query_string = http_build_query([
        'query' => $query,
    ]);

    $args = [
        'httpversion' => '1.1',
        'headers' => [
            'Authorization' => 'KakaoAK 0fc0c2dc50f30e94f25eacdbfc49e436',
        ],
    ];

    return wp_remote_get($url . $query_string, $args);
}