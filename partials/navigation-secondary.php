<nav class="navigation-container navigation-container--secondary">

	<?php
	$args = array(
		'theme_location'	=> 'navigation-secondary',
		'menu_class'		=> 'navigation navigation--secondary list-inline',
		'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'		=> false,
		'depth'				=> 0,
		'container'			=> '',
		'walker' 			=> new Ground_Wp_Nav_Menu_Bem
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation-container -->
