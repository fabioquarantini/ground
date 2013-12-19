<aside class="sidebar">

	<?php ground_cpt_list_categories('ground_catalog', 'ground_catalog_taxonomy'); ?>

	<?php ground_hierarchy_list_pages(); ?>

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