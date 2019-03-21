<?php
/**
 * Insert an attachment from an URL address.
 *
 * @see https://gist.github.com/m1r0/f22d5237ee93bcccb0d9
 * @param  String $url
 * @param  String $filename
 * @param  Int $parent_post_id
 * @return Int    Attachment ID
 * @throws Exception
 */
function crb_insert_attachment_from_url($url, $filename = '', $parent_post_id = null) {
    if( !class_exists( 'WP_Http' ) )
        include_once( ABSPATH . WPINC . '/class-http.php' );
    $http = new WP_Http();
    $response = $http->request( $url );
    if( $response['response']['code'] != 200 ) {
        throw new Exception($url . ' HTTP 통신 실패');
    }
    $upload = wp_upload_bits( (($filename) ?: basename($url)), null, $response['body'] );
    if( !empty( $upload['error'] ) ) {
        throw new Exception($upload['error']);
    }
    $file_path = $upload['file'];
    $file_name = basename( $file_path );
    $file_type = wp_check_filetype( $file_name, null );
    $attachment_title = sanitize_file_name( pathinfo( $file_name, PATHINFO_FILENAME ) );
    $wp_upload_dir = wp_upload_dir();
    $post_info = array(
        'guid'           => $wp_upload_dir['url'] . '/' . $file_name,
        'post_mime_type' => $file_type['type'],
        'post_title'     => $attachment_title,
        'post_content'   => '',
        'post_status'    => 'inherit',
    );
    // Create the attachment
    $attach_id = wp_insert_attachment( $post_info, $file_path, $parent_post_id );

    if (is_wp_error($attach_id)) {
        $wp_error = $attach_id;
        throw new Exception($wp_error->get_error_message());
    }

    // Include image.php
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    // Define attachment metadata
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file_path );
    // Assign metadata to attachment
    wp_update_attachment_metadata( $attach_id,  $attach_data );
    return $attach_id;
}