<nav class="navigation navigation--primary relative lg:static">

	<?php
	$args = array(
		'theme_location' => 'primary',
		'menu_class'     => 'navigation__list navigation__list--primary m-0 lg:flex lg:justify-start',
		'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'    => false,
		'depth'          => 0,
		'container'      => '',
		'walker' 		=> new Ground_Wp_Nav_Menu_Bem
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation -->
