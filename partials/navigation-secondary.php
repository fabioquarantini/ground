<nav class="navigation navigation--secondary">

	<?php
	$args = array(
		'theme_location' => 'secondary',
		'menu_class'     => 'navigation__list navigation__list--secondary',
		'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
		'fallback_cb'    => false,
		'depth'          => 0,
		'container'      => '',
	);

	wp_nav_menu( $args ); ?>

</nav> <!-- End .navigation -->
