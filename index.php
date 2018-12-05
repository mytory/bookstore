<?php get_header() ?>



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


<?php get_footer() ?>
