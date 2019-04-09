<?php
add_action('init', function () {

    register_taxonomy('book_subject', 'book', [
        'labels' => [
            'name' => '주제',
            'singular_name' => '주제',
            'search_items' => '주제 검색',
            'all_items' => '전체 주제',
            'parent_item' => '상위 주제',
            'parent_item_colon' => '상위 주제:',
            'edit_item' => '주제 편집',
            'update_item' => '주제 수정',
            'add_new_item' => '새 주제',
            'new_item_name' => '새 주제 이름',
            'menu_name' => '주제',
        ],
        'show_admin_column' => true,
        'hierarchical' => true,
    ]);

    register_taxonomy('book_author', 'book', [
        'labels' => [
            'name' => '저자',
            'singular_name' => '저자',
            'search_items' => '저자 검색',
            'all_items' => '전체 저자',
            'edit_item' => '저자 편집',
            'update_item' => '저자 수정',
            'add_new_item' => '새 저자 ',
            'new_item_name' => '새 저자 이름',
            'menu_name' => '저자',
            'popular_items' => '많이 사용한 저자',
            'separate_items_with_commas' => '저자를 쉼표로 구분해 주세요',
            'add_or_remove_items' => '저자 추가 제거',
            'choose_from_most_used' => '가장 많이 사용한 저자 중에 고르기',
        ],
        'show_admin_column' => true,
    ]);

    register_taxonomy('book_translator', 'book', [
        'labels' => [
            'name' => '역자',
            'singular_name' => '역자',
            'search_items' => '역자 검색',
            'all_items' => '전체 역자',
            'edit_item' => '역자 편집',
            'update_item' => '역자 수정',
            'add_new_item' => '새 역자 ',
            'new_item_name' => '새 역자 이름',
            'menu_name' => '역자',
            'popular_items' => '많이 사용한 역자',
            'separate_items_with_commas' => '역자를 쉼표로 구분해 주세요',
            'add_or_remove_items' => '역자 추가 제거',
            'choose_from_most_used' => '가장 많이 사용한 역자 중에 고르기',
        ],
        'show_admin_column' => true,
    ]);

    register_taxonomy('book_publisher', 'book', [
        'labels' => [
            'name' => '출판사',
            'singular_name' => '출판사',
            'search_items' => '출판사 검색',
            'all_items' => '전체 출판사',
            'edit_item' => '출판사 편집',
            'update_item' => '출판사 수정',
            'add_new_item' => '새 출판사 ',
            'new_item_name' => '새 출판사 이름',
            'menu_name' => '출판사',
            'popular_items' => '많이 사용한 출판사',
            'separate_items_with_commas' => '출판사를 쉼표로 구분해 주세요',
            'add_or_remove_items' => '출판사 추가 제거',
            'choose_from_most_used' => '가장 많이 사용한 출판사 중에 고르기',
        ],
        'show_admin_column' => true,
    ]);
});