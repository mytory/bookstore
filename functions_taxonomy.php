<?php
add_action('init', function () {
    register_taxonomy('book_author', 'book', [
        'label' => '저자'
    ]);

    register_taxonomy('book_translator', 'book', [
        'label' => '역자'
    ]);

    register_taxonomy('book_subject', 'book', [
        'label' => '주제'
    ]);
});