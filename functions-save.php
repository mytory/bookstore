<?php
add_action( 'save_post_book', function () {

	if ( ! empty( $_POST['meta'] ) ) {
		foreach ( $_POST['meta'] as $k => $v ) {
			update_post_meta( $_POST['ID'], $k, $v );
		}
	}

} );