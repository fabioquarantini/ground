<aside id="sidebar">

	<?php ground_custom_category_menu('custom_catalog_category'); ?>

	<?php ground_child_menu(); ?>

	<?php

	if ( is_active_sidebar( 'sidebar-1' ) ) { 	
		dynamic_sidebar( 'sidebar-1' ); 
	} 

	if ( is_active_sidebar( 'sidebar-2' ) ) { 	
		dynamic_sidebar( 'sidebar-2' ); 
	}

	?>

</aside> <!-- End #sidebar -->