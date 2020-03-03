<?php
get_header();

$wp_query = new WP_Query([
    'post_type' => 'book',
]);
?>


<div class="wrapper">

    <ul>
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <li>
                    <a href="<?php the_permalink() ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
                <?php
            }
        } ?>
    </ul>

</div>

<?php get_footer() ?>
