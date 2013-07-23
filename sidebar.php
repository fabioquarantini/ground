<aside id="sidebar">

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