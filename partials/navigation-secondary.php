<nav class="navigation navigation--secondary" role="navigation">

	<?php

	$args = array(
		'theme_location'	=> 'navigation-secondary',
		'menu'				=> '',
		'container'			=> '',
		'container_class'	=> '',
		'container_id'		=> '',
		'menu_class'		=> 'navigation-secondary',
		'menu_id'			=> '',
		'echo'				=> true,
		'fallback_cb'		=> '',
		'before'			=> '',
		'after'				=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'				=> 0,
		'walker'			=> ''
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation- -secondary -->
