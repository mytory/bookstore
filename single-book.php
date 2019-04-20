<?php
get_header();

the_post();

$meta = get_post_meta(get_the_ID());
?>

    <article class="wrapper">

        <header>
            <h1>
                <?php if (!empty($meta['subtitle_head'][0])) { ?>
                    <span class="subtitle">
                        <?= $meta['subtitle_head'][0] ?>
                    </span>
                <?php } ?>

                <span class="title"><?php the_title(); ?></span>
                <?php if (!empty($meta['subtitle_tail'][0])) { ?>
                    <span class="subtitle">
                        <?= $meta['subtitle_tail'][0] ?>
                    </span>
                <?php } ?>
            </h1>
        </header>

        <aside class="margin-bottom">
            <?php if (!empty($meta['published_date'][0])) { ?>
                <?= $meta['published_date'][0] ?> 발행 |
            <?php } ?>
            <?php if (!empty($meta['pages'][0])) { ?>
                <?= $meta['pages'][0] ?> |
            <?php } ?>
            <?php if (!empty($meta['price'][0])) { ?>
                <?= number_format($meta['price'][0]) ?> |
            <?php } ?>
            <?php if (!empty($meta['isbn'][0])) { ?>
                <?= $meta['isbn'][0] ?>
            <?php } ?>
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
