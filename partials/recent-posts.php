<?php
$args = array(
	'posts_per_page'		=> '2',
	'ignore_sticky_posts'	=> true,
	'order'					=> 'DESC',
	'orderby'				=> 'date',
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();

		get_template_part( 'partials/abstract', 'post' );
	}
} else {
	// no posts found
}

// Restore original Post Data
wp_reset_postdata();
?>