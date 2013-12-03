<aside class="sidebar">

	<?php ground_custom_category_menu('ground_catalog', 'ground_catalog_taxonomy'); ?>

	<?php ground_child_menu(); ?>

	<?php get_search_form(); ?>

	<?php

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		dynamic_sidebar( 'sidebar-1' );
	}

	if ( is_active_sidebar( 'sidebar-2' ) ) {
		dynamic_sidebar( 'sidebar-2' );
	}

	?>

</aside> <!-- End .sidebar -->