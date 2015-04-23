<?php get_template_part( 'partials/header' ); ?>

	<section class="search" id="main-content" role="main">

		<h1 class="search__title"><?php _e( "Search results:", "ground" ); ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content', 'abstract' ); ?>

		<?php endwhile; ?>

			<?php get_template_part( 'partials/pagination', 'numeric' ); ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</section> <!-- End .search -->

	<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>

<?php get_template_part( 'partials/footer' ); ?>
