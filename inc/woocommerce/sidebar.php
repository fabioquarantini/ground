<?php
/**
 * Sidebar
 *
 * @package Ground
 */

/**
 * Disable default WooCommerce sidebar
 *
 * @return void
 */
function ground_woocommerce_disable_woocommerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
}

add_action( 'init', 'ground_woocommerce_disable_woocommerce_sidebar' );

/**
 * Register custom WooCommerce sidebar
 *
 * @return void
 */
function ground_woocommerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Shop sidebar', 'ground' ),
			'id'            => 'sidebar-woocommerce',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="widgettitle">',
			'after_title'   => '</h6>',
		)
	);
}

add_action( 'widgets_init', 'ground_woocommerce_widgets_init' );
