<?php get_header() ?>


<div class="wrapper">

    <ul class="basic-list">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                ?>
                <li class="basic-list-item">
                    <a class="basic-list-link" href="<?php the_permalink() ?>">
                        <h2 class="basic-list-title">
                            <?php the_title(); ?>
                        </h2>
                        <div class="basic-list-meta">
                            <?= get_the_date() ?>
                        </div>
                        <div class="basic-list-excerpt">
                            <?php the_excerpt() ?>
                        </div>
                    </a>
                </li>
                <?php
            }
        } ?>
    </ul>

</div>

<?php get_footer() ?>
