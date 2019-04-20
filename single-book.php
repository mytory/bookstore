<?php
get_header();

the_post();
?>

    <article class="wrapper">

        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <aside class="margin-bottom">
            <?php the_author(); ?>
            | <?php the_date(); ?>
        </aside>

        <div class="book-cover-container">
            <?php
            $cover_id = get_post_meta(get_the_ID(), 'cover_id', true);
            echo wp_get_attachment_image($cover_id, 'book_cover');
            ?>
        </div>

        <div>
            <?php the_content(); ?>
        </div>
    </article>


<?php

get_footer();
