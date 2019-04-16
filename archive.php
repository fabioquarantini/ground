<?php get_template_part( 'partials/header' ); ?>

	<div class="container">
		<div class="row">

			<?php get_template_part( 'partials/breadcrumbs' ); ?>

			<div class="gr-12">
				<section class="page page--archive">

					<?php if ( have_posts() ) : ?>

						<header class="page__header">
							<?php the_archive_title( '<h1 class="page__title">', '</h1>' ); ?>
						</header>

						<div class="page__body js-infinite-container">

							<?php the_archive_description(); ?>

							<?php while ( have_posts() ) : the_post();

								get_template_part( 'partials/abstract', 'post' );

							endwhile; ?>

						</div> <!-- End .page__body -->

						<?php get_template_part( 'partials/pagination' ); ?>

					<?php endif; ?>

				</section> <!-- End .page -->
			</div>
		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php get_template_part( 'partials/footer' ); ?>
