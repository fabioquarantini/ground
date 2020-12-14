<?php
/**
 * Single posts
 *
 * @package Ground
 */

get_template_part( 'partials/header' );

while ( have_posts() ) :
	the_post(); ?>

		<div class="container">
			<?php get_template_part( 'partials/breadcrumbs' ); ?>
			<?php get_template_part( 'partials/content', 'single-post' ); ?>
		</div> <!-- End .container -->

	<?php
endwhile;

get_template_part( 'partials/footer' );
