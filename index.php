<?php get_header() ?>


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
