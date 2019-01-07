<nav class="navigation navigation--primary">

	<?php
	$args = array(
		'theme_location'	=> 'navigation-primary',
		'menu_class'		=> 'navigation__list',
		'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'		=> false,
		'depth'				=> 0,
		'container'			=> '',
		'walker' 			=> new Ground_Wp_Nav_Menu_Bem
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation -->
