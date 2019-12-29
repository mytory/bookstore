<?php get_header(); ?>


<div class="wrapper">

    <h1><?= get_the_archive_title() ?></h1>

	<?php
	$term_description = term_description();
	if ( $term_description ) { ?>
        <div class="description-box  margin-bottom">
			<?= term_description() ?>
        </div>
	<?php } ?>

    <ul class="basic-list">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				?>
                <li class="basic-list-item">
                    <a class="basic-list-link" href="<?php the_permalink() ?>">

						<?php
						// 1 썸네일이 있으면 그걸 쓴다.
						// 2 썸네일이 없으면 표지를 쓴다.
						$cover_id = null;
						if ( has_post_thumbnail() ) {
							$cover_id = get_post_thumbnail_id();
						} else {
							$cover_id = get_post_meta( get_the_ID(), 'cover_id', true );
						}

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

    <div class="text-center  padding">
		<?= paginate_links() ?>
    </div>

</div>

<?php get_footer() ?>
