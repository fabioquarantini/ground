<nav class="navigation navigation--all-products relative lg:static lg:hidden lg:w-full lg:absolute lg:right-0 lg:p-6 lg:bg-white">

	<?php
	$args = array(
		'theme_location' => 'all-products',
		'menu_class'     => 'navigation__list navigation__list--all-products',
		'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'    => false,
		'depth'          => 0,
		'container'      => '',
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation -->
