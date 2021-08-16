<nav class="navigation navigation--secondary">

	<?php
	$args = array(
		'theme_location' => 'header-secondary',
		'menu_class'     => 'navigation__list navigation__list--secondary block m-0 lg:flex lg:justify-start lg:space-x-3',
		'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'    => false,
		'depth'          => 0,
		'container'      => '',
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation -->
