<?php get_template_part( 'partials/header' ); ?>

	<div class="container">
		<div class="clear-fix">
			<div class="gr-12">
				<section class="page page--blog">

					<?php if (single_post_title('', false)) : ?>
						<header class="page__header">
							<h1 class="page__title"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>

					<?php if ( have_posts() ) { ?>

						<div class="page__body js-infinite-container">

							<?php while ( have_posts() ) {

								the_post();
								get_template_part( 'partials/abstract', 'post' );

							} ?>

						</div> <!-- End .page__body -->

						<?php get_template_part( 'partials/pagination' ); ?>

					<?php } ?>

				</section> <!-- End .page -->
			</div>
		</div> <!-- End .clear-fix -->
	</div> <!-- End .container -->

<?php get_template_part( 'partials/footer' ); ?>
