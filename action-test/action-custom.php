<?php
//======= 테마, 플러그인 개발자들이 고칠 수 있는 파일 ============

add_action('5지점진입직전', function () {
    echo '4.5';
    echo '<br>';
});

add_action('5지점진입직전', function () {
    echo '4.7';
    echo '<br>';
});


function floats_between_5_6 () {
    foreach (range(5.01, 5.99, 0.01) as $number) {
        echo $number;
        echo '<br>';
    }
}

add_action('5지점진입직후', 'floats_between_5_6');