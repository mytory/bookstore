<html>
<head>
    <?php wp_head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
</head>
<body>

<div>
    <div class="wrapper">
        <?php if (function_exists('the_custom_logo')) {
            the_custom_logo();
        } ?>
    </div>

    <nav class="nav-bg">
        <div class="wrapper">
            <?php
            if (has_nav_menu('main_nav')) {
                wp_nav_menu(['theme_location' => 'main_nav']);
            } else { ?>
                <p>메인 내비게이션에 메뉴를 할당해 주세요.</p>
            <?php } ?>
        </div>
    </nav>
</div>
