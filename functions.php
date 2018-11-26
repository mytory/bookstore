<?php
function getHelloWorld() {
	return '<h1>Hello World!</h1>';
}


function mbs_register_post_type() {
	register_post_type( 'book', [
		'label' => '책',
		'public' => true,
	]);
}

add_action( 'init', 'mbs_register_post_type' );


// register_post_type( 'book', [
// 	'label' => '책',
// ] );