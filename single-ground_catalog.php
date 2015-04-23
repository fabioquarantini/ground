<?php /* Rename file with the name of custom post type ( single-name_of_custom_post_type.php ) */ ?>

<?php get_template_part( 'partials/header' ); ?>

	<div class="sidebar sidebar--primary">

		<?php get_template_part( 'partials/menu', 'cpt-category' ); ?>

	</div> <!-- End .sidebar- -primary -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/content', 'single' ); ?>

	<?php endwhile; else : ?>

		<?php get_template_part( 'partials/content', 'none' ); ?>

	<?php endif; ?>

<?php get_template_part( 'partials/footer' ); ?>
