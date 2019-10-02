<?php
/*
Template Name: Home page
*/

get_template_part( 'partials/header' ); ?>

	<?php get_template_part( 'partials/slider-primary' ); ?>
	<div class="container">
		<div class="row">
			<div class="gr-12">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					get_template_part( 'partials/content', 'page' );
				endwhile; endif; ?>
				<?php get_template_part( 'partials/woocommerce/product-categories' ); ?>
				<?php get_template_part( 'partials/woocommerce/recent-products' ); ?>
				<?php get_template_part( 'partials/recent', 'posts' ); ?>
			</div>
		</div> <!-- End .row -->
	</div> <!-- End .container -->

<?php get_template_part( 'partials/footer' ); ?>