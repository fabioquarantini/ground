<?php get_template_part( 'partials/header' ); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( 'partials/content', 'single' );

	endwhile; else :

		get_template_part( 'partials/content', 'none' );

	endif;

	get_template_part( 'partials/sidebar', 'secondary' );

get_template_part( 'partials/footer' ); ?>
