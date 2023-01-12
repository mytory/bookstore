<?php
/**
 * @var WP_Query $wp_query
 */
get_header();
?>


<div class="wrapper">

    <header class="margin-bottom">
        <h1 class="margin-bottom-none">“<?= get_search_query(false) ?>” 검색 결과</h1>
        <div><?= $wp_query->found_posts ?>개</div>
    </header>

    <?php get_template_part('templates/basic-list') ?>

    <div class="text-center  padding">
        <?= paginate_links() ?>
    </div>

</div>

<?php get_footer() ?>
