<?php
/**
 * Pages
 *
 * @package Ground
 */

get_template_part( 'partials/header' );
?>

	<div class="container
		<?php
		if ( is_cart() || is_account_page() ) {
			echo 'max-w-screen-lg';
		} if ( is_checkout() ) {
			echo 'max-w-screen-md'; }
		?>
	">

		<?php get_template_part( 'partials/breadcrumbs' ); ?>

		<div class="lg:flex lg:flex-wrap">

			<?php if ( is_checkout() || is_cart() || is_account_page() ) { ?>
				<div class="w-full">
			<?php } else { ?>

				<div class="lg:w-3/12 lg:pr-8">
					<?php get_template_part( 'partials/sidebar', 'primary' ); ?>
				</div>

				<div class="lg:w-9/12">
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
