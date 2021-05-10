<?php
get_header();

$notice_query = new WP_Query( [
	'category_name'  => 'notice',
	'posts_per_page' => 5,
] );

$new_book_query = new WP_Query( [
	'post_type'      => 'book',
	'posts_per_page' => 5,
] );
?>
<div class="wrapper">
    <div class="layout-2-column">
        <div class="layout-item">
            <h2>신간</h2>
            <ul>
		        <?php
		        if ( $new_book_query->have_posts() ) {
			        while ( $new_book_query->have_posts() ) {
				        $new_book_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink() ?>">
						        <?php the_title(); ?>
                            </a>
                        </li>
				        <?php
			        }
			        wp_reset_postdata();
		        } ?>
            </ul>
        </div>

        <div class="layout-item">
            <h2>공지사항</h2>
            <ul>
		        <?php
		        if ( $notice_query->have_posts() ) {
			        while ( $notice_query->have_posts() ) {
				        $notice_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink() ?>">
						        <?php the_title(); ?>
                            </a>
                        </li>
				        <?php
			        }
			        wp_reset_postdata();
		        } ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer() ?>
