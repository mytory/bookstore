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

            <?php
            $book_author_string = get_term_names('book_author', ' 지음');
            $book_translator_string = get_term_names('book_translator', ' 번역');
            $book_publisher_string = get_term_names('book_publisher');
            $book_subject_string = get_term_names('book_subject');
            ?>

            <ul class="nav">
                <?php if ($book_author_string) { ?>
                    <li class="nav-item"><?= $book_author_string ?></li>
                <?php } ?>

                <?php if ($book_translator_string) { ?>
                    <li class="nav-item"><?= $book_translator_string ?></li>
                <?php } ?>

                <?php if ($book_publisher_string) { ?>
                    <li class="nav-item"><?= $book_publisher_string ?></li>
                <?php } ?>

                <?php if ($book_subject_string) { ?>
                    <li class="nav-item"><?= $book_subject_string ?></li>
                <?php } ?>
            </ul>

            <div>
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
            </div>
        </aside>

        <div class="book-cover-container">
            <?php
            $cover_id = get_post_meta(get_the_ID(), 'cover_id', true);
            echo wp_get_attachment_image($cover_id, 'book_cover');
            ?>
        </div>

        <div>
            <h3>책 소개</h3>
            <?php the_content(); ?>
        </div>

        <?php if ($meta['toc'][0]) { ?>
            <div>
                <h3>목차</h3>
                <?php
                $toc = apply_filters('the_content', $meta['toc'][0]);
                $toc = str_replace(']]>', ']]&gt;', $toc);
                echo $toc;
                ?>
            </div>
        <?php } ?>

        <?php if ($meta['book_author_intro'][0]) { ?>
            <div>
                <h3>저자 소개</h3>
                <?php
                $book_author_intro = apply_filters('the_content', $meta['book_author_intro'][0]);
                $book_author_intro = str_replace(']]>', ']]&gt;', $book_author_intro);
                echo $book_author_intro;
                ?>
            </div>
        <?php } ?>

        <?php if ($meta['book_translator_intro'][0]) { ?>
            <div>
                <h3>역자 소개</h3>
                <?php
                $book_translator_intro = apply_filters('the_content', $meta['book_translator_intro'][0]);
                $book_translator_intro = str_replace(']]>', ']]&gt;', $book_translator_intro);
                echo $book_translator_intro;
                ?>
            </div>
        <?php } ?>


    </article>


<?php

get_footer();
