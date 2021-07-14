<?php
add_action( 'admin_enqueue_scripts', function () {

	$screen = get_current_screen();

	if ( $screen->id === 'book' ) {
		wp_enqueue_script(
			'mbs_media',
			get_template_directory_uri() . '/js/book-edit-media.js',
			[ 'media-views' ],
			'2018-12-30',
			true
		);
	}

	wp_enqueue_style(
		'mytory-bookstore-admin',
		get_template_directory_uri() . '/admin.css',
		array(),
		1.1
	);
} );

add_action( 'wp_enqueue_scripts', function () {
	if ( is_home() ) {
		wp_enqueue_script(
			'swiperjs',
			get_template_directory_uri() . '/js-lib/swiperjs/swiper-bundle.min.js',
			[],
			'6.7.5',
			true
		);

		wp_enqueue_style(
			'swiperjs',
			get_template_directory_uri() . '/js-lib/swiperjs/swiper-bundle.min.css',
			array(),
			'6.7.5'
		);
	}
} );