<?php
add_action('save_post_book', function () {
    var_dump($_POST['meta']);
    exit;
});