<?php // Rename file with the name of custom post type ( single-name_of_custom_post_type.php )

get_template_part( 'partials/header' ); ?>

	<div class="sidebar sidebar--primary">

		<?php get_template_part( 'partials/menu', 'cpt-category' ); ?>

	</div> <!-- End .sidebar- -primary -->

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

		get_template_part( 'partials/content', 'single' );

	endwhile; else :

		get_template_part( 'partials/content', 'none' );

	endif;

get_template_part( 'partials/footer' ); ?>
