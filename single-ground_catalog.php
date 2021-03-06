<?php
/**
 * Single ground_catalog
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

<div class="container">
	<div class="row">

		<?php get_template_part( 'partials/breadcrumbs' ); ?>

		<div class="gr-12 gr-3@md">
			<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>
		</div>

		<div class="gr-12 gr-9@md">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'partials/content', 'single-ground_catalog' );

			endwhile;
			?>

		</div>

	</div> <!-- End .row -->
</div> <!-- End .container -->

<?php
get_template_part( 'partials/footer' );
