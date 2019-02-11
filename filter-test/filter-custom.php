<?php
//======= 테마, 플러그인 개발자들이 고칠 수 있는 파일 ============

// 변형
add_filter('the_content', function ($content) {
    return str_replace('0', 'a', $content);
});

// 추가
add_filter('the_content', function ($content) {
    return $content . '-b';
});

// 제거
add_filter('the_content', function ($content) {
    return mb_substr($content, 0, 5);
});