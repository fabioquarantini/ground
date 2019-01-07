<?php get_template_part( 'partials/header' );

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( 'partials/content', 'single-post' );

	endwhile; endif;

get_template_part( 'partials/footer' ); ?>
