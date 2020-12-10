<?php
/**
 * Global
 *
 * @package Ground
 */

/**
 * Remove WooCommerce styles
 */
function ground_dequeue_woocommerce_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] ); // Remove the gloss.
	unset( $enqueue_styles['woocommerce-layout'] ); // Remove the gloss.
	unset( $enqueue_styles['woocommerce-smallscreen'] ); // Remove the smallscreen optimisation.
	return $enqueue_styles;
}

add_filter( 'woocommerce_enqueue_styles', 'ground_dequeue_woocommerce_styles' );

/**
 * Add WooCommerce body class
 *
 * @param string|string[] $classes Space-separated string or array of class names to add to the class list.
 */
function ground_woocommerce_active_body_class( $classes ) {
	$classes[] = 'is-woocommerce-active';
	return $classes;
}

add_filter( 'body_class', 'ground_woocommerce_active_body_class' );
