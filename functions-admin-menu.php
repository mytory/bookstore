<?php
add_action('admin_menu', function () {
    add_submenu_page(
        'edit.php?post_type=book',
        '책 가져오기',
        '가져오기',
        'publish_posts',
        'import-books',
        function () {
            include get_template_directory() . '/admin-pages/import-books.php';
        }
    );
});