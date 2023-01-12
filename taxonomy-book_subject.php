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

    <?php get_template_part('templates/basic-list') ?>

    <div class="text-center  padding">
		<?= paginate_links() ?>
    </div>

</div>

<?php get_footer() ?>
