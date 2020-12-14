<?php
/**
 * Single ground_catalog
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

<div class="container">

	<?php get_template_part( 'partials/breadcrumbs' ); ?>

	<div class="lg:flex lg:flex-wrap">

		<div class="lg:w-3/12 lg:pr-8">
			<?php get_template_part( 'partials/sidebar', 'secondary' ); ?>
		</div>

		<div class="lg:w-9/12">

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
