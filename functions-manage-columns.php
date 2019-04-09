<?php
add_filter('manage_book_posts_columns', function ($columns) {

    $columns = [
        'cb' => '<input type="checkbox" />',
        'cover' => '표지',
        'title' => '제목',
        'taxonomy-book_subject' => '주제',
        'taxonomy-book_author' => '저자',
        'taxonomy-book_translator' => '역자',
        'taxonomy-book_publisher' => '출판사',
        'date' => '일자',
    ];

    return $columns;
});

add_action('manage_book_posts_custom_column', function ($column, $post_id) {

    switch ($column) {
        case 'cover':

            $cover_id = get_post_meta($post_id, 'cover_id', true);
            if (!$cover_id) {
                break;
            }

            $url = wp_get_attachment_image_url($cover_id);
            if (!$url) {
                break;
            }

            echo "<img src='{$url}' height='150'>";

            break;
    }

}, 10, 2);