<?php
function mbs_register_post_type() {
    register_post_type( 'book', [
        'has_archive' => true,
        'labels' => [
            'name'               => '책',
            'singular_name'      => '책',
            'menu_name'          => '책',
            'name_admin_bar'     => '책',
            'add_new'            => '새 책 추가',
            'add_new_item'       => '새 책을 추가합니다',
            'new_item'           => '새 책',
            'edit_item'          => '책 수정',
            'view_item'          => '책 보기',
            'all_items'          => '책 목록',
            'search_items'       => '책 검색',
            'parent_item_colon'  => '상위 책:',
            'not_found'          => '현재 입력한 책이 없습니다.',
            'not_found_in_trash' => '휴지통에 책이 없습니다.',
        ],
        'public' => true,
        'menu_position' => 3,
        // 'menu_icon' => 'dashicons-book',
        // 'menu_icon' => get_template_directory_uri() . '/images/book-solid.svg',
        'menu_icon' => 'data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjIwIiB2aWV3Qm94PSIwIDAgMTcuNSAyMCIgd2lkdGg9IjE3LjUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0ibTE3LjUgMTQuMDYyNXYtMTMuMTI1YzAtLjUxOTUzLS40MTc5NjktLjkzNzUtLjkzNzUtLjkzNzVoLTEyLjgxMjVjLTIuMDcwMzEyNSAwLTMuNzUgMS42Nzk2OS0zLjc1IDMuNzV2MTIuNWMwIDIuMDcwMzEgMS42Nzk2ODc1IDMuNzUgMy43NSAzLjc1aDEyLjgxMjVjLjUxOTUzMSAwIC45Mzc1LS40MTc5Ny45Mzc1LS45Mzc1di0uNjI1YzAtLjI5Mjk3LS4xMzY3MTktLjU1ODU5LS4zNDc2NTYtLjczMDQ3LS4xNjQwNjMtLjYwMTU2LS4xNjQwNjMtMi4zMTY0MSAwLTIuOTE3OTcuMjEwOTM3LS4xNjc5Ny4zNDc2NTYtLjQzMzU5LjM0NzY1Ni0uNzI2NTZ6bS0xMi41LTguODI4MTNjMC0uMTI4OS4xMDU0Njg3LS4yMzQzNy4yMzQzNzUtLjIzNDM3aDguMjgxMjVjLjEyODkwNiAwIC4yMzQzNzUuMTA1NDcuMjM0Mzc1LjIzNDM3di43ODEyNWMwIC4xMjg5MS0uMTA1NDY5LjIzNDM4LS4yMzQzNzUuMjM0MzhoLTguMjgxMjVjLS4xMjg5MDYzIDAtLjIzNDM3NS0uMTA1NDctLjIzNDM3NS0uMjM0Mzh6bTAgMi41YzAtLjEyODkuMTA1NDY4Ny0uMjM0MzcuMjM0Mzc1LS4yMzQzN2g4LjI4MTI1Yy4xMjg5MDYgMCAuMjM0Mzc1LjEwNTQ3LjIzNDM3NS4yMzQzN3YuNzgxMjVjMCAuMTI4OTEtLjEwNTQ2OS4yMzQzOC0uMjM0Mzc1LjIzNDM4aC04LjI4MTI1Yy0uMTI4OTA2MyAwLS4yMzQzNzUtLjEwNTQ3LS4yMzQzNzUtLjIzNDM4em05Ljg5ODQzOCA5Ljc2NTYzaC0xMS4xNDg0MzhjLS42OTE0MDYyIDAtMS4yNS0uNTU4NTktMS4yNS0xLjI1IDAtLjY4NzUuNTYyNS0xLjI1IDEuMjUtMS4yNWgxMS4xNDg0MzhjLS4wNzQyMi42Njc5Ny0uMDc0MjIgMS44MzIwMyAwIDIuNXoiIGZpbGw9IiMwMDAiIHN0cm9rZS13aWR0aD0iLjAzOTA2MyIvPjwvc3ZnPg==',
    ] );
}

add_action( 'init', 'mbs_register_post_type' );


add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'mbs-style', get_stylesheet_uri() );
} );

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
} );