<?php get_header(); ?>


<div class="wrapper">

    <h1><?= get_the_archive_title() ?></h1>

    <ul class="basic-list">
	    <?php
	    if ( have_posts() ) {
		    while ( have_posts() ) {
			    the_post();
			    ?>
                <li class="basic-list-item">
                    <a class="basic-list-link" href="<?php the_permalink() ?>">

	                    <?php if ( has_post_thumbnail() ) { ?>
                            <div class="list-thumb-right">
			                    <?php the_post_thumbnail(); ?>
                            </div>
	                    <?php } ?>

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

    <div class="text-center  padding">
	    <?= paginate_links() ?>
    </div>

</div>

<?php get_footer() ?>
