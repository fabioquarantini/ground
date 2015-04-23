<?php get_template_part( 'partials/header' ); ?>

	<section class="blog" id="main-content" role="main">

		<h1 class="blog__title"><?php single_post_title(); ?></h1>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content', 'abstract' ); ?>

		<?php endwhile; ?>

			<?php get_template_part( 'partials/pagination', 'numeric' ); ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</section> <!-- End .blog -->

	<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>

<?php get_template_part( 'partials/footer' ); ?>
