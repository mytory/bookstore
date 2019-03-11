<?php
date_default_timezone_set('Asia/Seoul');

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'mbs-style', get_stylesheet_uri() );
} );

add_action( 'after_setup_theme', function () {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    add_image_size('book_cover', 300, 300, false);
} );