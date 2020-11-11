<?php
/**
 * Pages
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

	<div class="container <?php if ( is_checkout() || is_cart() ) { echo "container--small"; } ?>">
		<div class="row">

			<?php get_template_part( 'partials/breadcrumbs' ); ?>

			<?php if ( is_checkout() || is_cart() ) { ?>
				<div class="gr-12">
			<?php } else { ?>
				<div class="gr-12 gr-3@md">
					<?php get_template_part( 'partials/sidebar', 'primary' ); ?>
				</div>

				<div class="gr-12 gr-9@md">
			<?php } ?>
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'partials/content', 'page' );

				endwhile;
				?>
			</div>
		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php
get_template_part( 'partials/footer' );
