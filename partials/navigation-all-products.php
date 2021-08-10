 <nav class="navigation navigation--all-products">
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
