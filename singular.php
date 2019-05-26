<?php
get_header();

the_post();
?>

    <article class="wrapper">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <?php if (!is_page()) { ?>
            <aside>
                <?php the_author(); ?>
                | <?php the_date(); ?>
            </aside>
        <?php } ?>

        <div>
            <?php the_content(); ?>
        </div>
    </article>


<?php

get_footer();
