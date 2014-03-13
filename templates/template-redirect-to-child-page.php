<?php
/*
Template Name: Redirect to child page
Description: Redirect to the first child page if the current page have children pages.
*/

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();


	$pagechild = get_pages( "child_of=".$post->ID."&sort_column=menu_order" );
	$firstchild = $pagechild[0];

	wp_redirect( get_permalink($firstchild->ID) );

endwhile; else : endif; ?>
