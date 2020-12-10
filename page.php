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
		echo 'container--medium';
	} if ( is_checkout() ) {
		echo 'container--small'; }
	?>
	">
		<div class="row">


			<?php if ( is_checkout() || is_cart() || is_account_page() ) { ?>
				<div class="gr-12">
			<?php } else { ?>
				<?php get_template_part( 'partials/breadcrumbs' ); ?>

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
