<?php
date_default_timezone_set( 'Asia/Seoul' );

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-logo' );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(300);

	add_image_size( 'book_cover', 300, 300, false );

	register_nav_menus( [
		'main_nav' => '메인 내비게이션',
	] );
} );

add_filter( 'upload_mimes', function ( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
	$mime_types['hwp'] = 'application/x-hwp';

	return $mime_types;
} );

