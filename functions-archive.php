<?php
add_filter('get_the_archive_title', function ($title) {
    if (strstr($title, ':')) {
        // ex) 카테고리: 공지사항
        // $array = ['카테고리', '공지사항'];
        $array = explode(': ', $title);
        $title = $array[1];
    }
    return $title;
});