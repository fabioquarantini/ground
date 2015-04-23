<?php get_template_part( 'partials/header' ); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/content', 'single' ); ?>

	<?php endwhile; else : ?>

		<?php get_template_part( 'partials/content', 'none' ); ?>

	<?php endif; ?>

	<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>

<?php get_template_part( 'partials/footer' ); ?>
