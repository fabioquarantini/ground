<?php get_template_part( 'partials/header' ); ?>

	<section class="page">

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

			<?php
			get_template_part( 'partials/pagination' );
			get_template_part( 'partials/loader', 'infinite' );
			?>

		<?php } ?>

	</section> <!-- End .page -->

<?php get_template_part( 'partials/footer' ); ?>
