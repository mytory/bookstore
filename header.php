<html>
<head>
    <?php wp_head() ?>
</head>
<body>

<div>
    <?php if (function_exists('the_custom_logo')) {
        the_custom_logo();
    } ?>

    <nav>
        <?php
        if (has_nav_menu('main_nav')) {
            wp_nav_menu(['theme_location' => 'main_nav']);
        } else { ?>
            <p>메인 내비게이션에 메뉴를 할당해 주세요.</p>
        <?php } ?>
    </nav>
</div>
