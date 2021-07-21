<?php
/**
 * @var WP_Query $new_book_query
 */
?>
<div class="swiper-container">
    <div class="swiper-wrapper">
		<?php
		if ( $new_book_query->have_posts() ) {
			while ( $new_book_query->have_posts() ) {
				$new_book_query->the_post();
				$cover_id               = get_cover_id();
				$book_author_string     = get_term_names( 'book_author', '', false );
				$book_translator_string = get_term_names( 'book_translator', ' 번역', false );
				$published_date         = get_post_meta( get_the_ID(), 'published_date', true );
				?>
                <div class="swiper-slide  main-slide-<?= $new_book_query->current_post + 1 ?>">
                    <a class="main-slide-content-wrapper" href="<?php the_permalink() ?>">

                        <div class="main-slide-content">
                            <h1><?php the_title(); ?></h1>

                            <div class="main-slide-meta">
	                            <?= $book_author_string ? "{$book_author_string}," : '' ?>
	                            <?= $book_translator_string ? "{$book_translator_string}," : '' ?>
	                            <?= $published_date ?>
                            </div>

                            <div class="main-slide-description">
                                <?php the_content(); ?>
                            </div>
                        </div>

                        <div class="main-slide-cover">
		                    <?php if ( $cover_id ) { ?>
			                    <?= wp_get_attachment_image( $cover_id, [ 500, 800 ] ); ?>
		                    <?php } ?>
                        </div>
                    </a>
                </div>
				<?php
			}
			wp_reset_postdata();
		} ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
