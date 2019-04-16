<?php get_template_part( 'partials/header' ); ?>

	<div class="container">
		<div class="row">

			<?php get_template_part( 'partials/breadcrumbs' ); ?>

			<div class="gr-12">
				<section class="page page--search">

					<header class="page__header">
						<h1 class="page__title"><?php _e( 'Search results:', 'ground' ); ?></h1>
					</header>

					<div class="page__body">

						<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

							get_template_part( 'partials/abstract', 'post' );

						endwhile;

							get_template_part( 'partials/pagination' );

						else : ?>

							<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ground' ); ?></p>

						<?php endif; ?>

					</div> <!-- End .page__body -->

				</section> <!-- End .page -->
			</div>
		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php get_template_part( 'partials/footer' ); ?>
