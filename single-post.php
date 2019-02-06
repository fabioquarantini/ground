<?php get_template_part( 'partials/header' );

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="container">
			<?php get_template_part( 'partials/content', 'single-post' ); ?>
		</div>

	<?php endwhile; endif;

get_template_part( 'partials/footer' ); ?>
