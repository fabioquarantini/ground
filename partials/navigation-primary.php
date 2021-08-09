<nav class="navigation navigation--primary">

	<?php
	$args = array(
		'theme_location' => 'primary',
		'menu_class'     => 'navigation__list navigation__list--primary m-0 lg:flex lg:justify-start lg:space-x-3 xl:space-x-5',
		'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'    => false,
		'depth'          => 0,
		'container'      => '',
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation -->
