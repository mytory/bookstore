<div>
    <a href="<?= get_post_type_archive_link('book') ?>">책 목록</a>
</div>


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
