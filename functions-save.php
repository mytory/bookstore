<?php
add_action( 'save_post_book', function () {

	if ( ! empty( $_POST['meta'] ) ) {
		foreach ( $_POST['meta'] as $k => $v ) {
			update_post_meta( $_POST['ID'], $k, $v );
		}
	}

	if ( ! get_post_thumbnail_id( $_POST['ID'] ) ) {
		if ( ! empty( $_POST['meta']['cover_id'] ) ) {
			set_post_thumbnail( $_POST['ID'], $_POST['meta']['cover_id'] );
		}
	}

} );