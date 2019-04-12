<?php get_template_part( 'partials/header' );

	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="container">
			<div class="row">
				<div class="gr-12">
					<?php get_template_part( 'partials/content', 'single-post' ); ?>
				</div>
			</div> <!-- End .row -->
		</div> <!-- End .container -->

	<?php endwhile; endif;

get_template_part( 'partials/footer' ); ?>