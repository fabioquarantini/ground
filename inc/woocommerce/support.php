<?php
/**
 * Support
 *
 * @package Ground
 */

/*  ==========================================================================
	1 - Add WooCommerce support
	==========================================================================  */

function ground_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	//add_theme_support( 'wc-product-gallery-zoom' );
	//add_theme_support( 'wc-product-gallery-lightbox' );
	//add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'ground_add_woocommerce_support' );

/*  ==========================================================================
	2 - Remove WooCommerce styles
	==========================================================================  */

function ground_dequeue_woocommerce_styles( $enqueue_styles ) {
	// Remove the gloss
	unset( $enqueue_styles['woocommerce-general'] );
	// Remove the layout
	unset( $enqueue_styles['woocommerce-layout'] );
	// Remove the smallscreen optimisation
	unset( $enqueue_styles['woocommerce-smallscreen'] );

	return $enqueue_styles;
}

add_filter( 'woocommerce_enqueue_styles', 'ground_dequeue_woocommerce_styles' );

/*  ==========================================================================
	4 - WooCommerce body class
	==========================================================================  */

function ground_woocommerce_active_body_class( $classes ) {
	$classes[] = 'is-woocommerce-active';
	return $classes;
}

add_filter( 'body_class', 'ground_woocommerce_active_body_class' );
