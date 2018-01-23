<?php get_template_part( 'partials/header' ); ?>

	<section class="page page--archive">

		<?php if ( have_posts() ) : ?>

			<header class="page__header">
				<?php the_archive_title( '<h1 class="page__title">', '</h1>' ); ?>
			</header>

			<div class="page__body">

				<?php the_archive_description(); ?>

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'partials/abstract', 'post' );

				endwhile;

					get_template_part( 'partials/pagination' ); ?>

			</div>  <!-- End .page__body -->

		<?php endif; ?>

	</section> <!-- End .page -->

<?php get_template_part( 'partials/footer' ); ?>
