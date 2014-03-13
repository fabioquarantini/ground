<aside class="sidebar">

	<?php get_search_form(); ?>

	<?php get_template_part( 'partials/menu', 'cpt-category' ); ?>

	<?php get_template_part( 'partials/menu', 'page-hierarchy' ); ?>

	<?php

	if ( is_active_sidebar( 'primary-sidebar' ) ) {

		dynamic_sidebar( 'primary-sidebar' );

	}

	if ( is_active_sidebar( 'secondary-sidebar' ) ) {

		dynamic_sidebar( 'secondary-sidebar' );

	}

	?>

</aside> <!-- End .sidebar -->