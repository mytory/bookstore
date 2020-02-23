<?php
add_action( 'save_post_book', function (int $post_id, WP_Post $post, bool $is_update) {

	if ( ! empty( $_POST['meta'] ) ) {
		foreach ( $_POST['meta'] as $k => $v ) {
			update_post_meta( $post->ID, $k, $v );
		}
	}

	if ( ! $is_update or ! get_post_thumbnail_id( $post->ID ) ) {
		if ( ! empty( $_POST['meta']['cover_id'] ) ) {
			set_post_thumbnail( $post->ID, $_POST['meta']['cover_id'] );
		}
	}

}, 10, 3 );