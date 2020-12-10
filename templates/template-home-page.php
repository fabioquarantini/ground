<?php
/**
 * Template Name: Home page
 *
 * @package Ground
 */

get_template_part( 'partials/header' ); ?>

	<?php get_template_part( 'partials/slider-primary' ); ?>
	<div class="container">
		<div class="row">
			<div class="gr-12">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'partials/content', 'page' );
					get_template_part( 'partials/woocommerce/product-categories' );
					get_template_part( 'partials/woocommerce/featured-products' );
					get_template_part( 'partials/recent', 'posts' );

				endwhile;
				?>
			</div>
		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php
get_template_part( 'partials/footer' );
