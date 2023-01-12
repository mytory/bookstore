<ul class="basic-list">
    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            ?>
            <li class="basic-list-item">
                <a class="basic-list-link" href="<?php the_permalink() ?>">

                    <?php
                    $cover_id = get_cover_id();
                    if ( $cover_id ) { ?>
                        <div class="list-thumb">
                            <?= wp_get_attachment_image( $cover_id, 'book-cover' ); ?>
                        </div>
                    <?php } ?>

                    <h2 class="basic-list-title">
                        <?php the_title(); ?>
                    </h2>
                    <div class="basic-list-meta">
                        <?= get_post_meta( get_the_ID(), 'published_date', true ) ?> 발행
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