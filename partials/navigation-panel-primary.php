 <nav class="js-navigation-panel navigation navigation--panel-primary relative">
	<?php
	$args = array(
		'theme_location' => 'panel-primary',
		'menu_class'     => 'navigation__list navigation__list--panel-primary',
		'items_wrap'     => '<ul class="navigation__list--panel %2$s">%3$s</ul>',
		'fallback_cb'    => false,
		'depth'          => 0,
		'container'      => '',
	);

	wp_nav_menu( $args ); ?>
</nav> <!-- End .navigation -->
