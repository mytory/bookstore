<html>
<head>
    <?php wp_head() ?>
</head>
<body>

<nav>
    <?php if (function_exists('the_custom_logo')) {
        the_custom_logo();
    } ?>

    <a href="<?= home_url() ?>">Mytory Bookstore</a>
    |
    <a href="<?= get_post_type_archive_link('book') ?>">책 목록</a>
</nav>

<hr>