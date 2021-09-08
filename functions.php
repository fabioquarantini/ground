<?php
/**
 * Functions and definitions
 *
 * @package Ground
 */

/**
 * Require files
 */
require_once 'inc/constants.php';
require_once 'inc/extend.php';
require_once 'inc/gutenberg.php';
require_once 'inc/acf-constants.php';
require_once 'inc/cpt-catalog.php';
require_once 'inc/head-output.php';
require_once 'inc/navigations.php';
require_once 'inc/shortcode.php';
require_once 'inc/walker.php';

if ( class_exists( 'WooCommerce' ) ) {
	require_once 'inc/woocommerce/breadcrumbs.php';
	require_once 'inc/woocommerce/cart.php';
	require_once 'inc/woocommerce/category.php';
	require_once 'inc/woocommerce/checkout.php';
	require_once 'inc/woocommerce/pagination.php';
	require_once 'inc/woocommerce/payments.php';
	require_once 'inc/woocommerce/price.php';
	require_once 'inc/woocommerce/product-loop.php';
	require_once 'inc/woocommerce/product-single.php';
	require_once 'inc/woocommerce/rest-order.php';
	require_once 'inc/woocommerce/rest-user.php';
	require_once 'inc/woocommerce/sidebar.php';
	require_once 'inc/woocommerce/global.php';
}

// https://dcdalrymple.com/enable-gutenberg-in-woocommerce/
// Enable Gutenberg for Product Descriptions
function activate_product_block_editor( $can_edit, $post_type ) {
	if ( $post_type == 'product' ) {
		return true;
	}
	return $can_edit;
}
// add_filter('use_block_editor_for_post_type', 'activate_product_block_editor', 10, 2);


// Add Categories and Tags Meta Boxes
function enable_tax_rest( $args ) {
	$args['show_in_rest'] = true;
	return $args;
}
// add_filter( 'woocommerce_taxonomy_args_product_cat', 'enable_tax_rest', 10, 1 );
// add_filter( 'woocommerce_taxonomy_args_product_tag', 'enable_tax_rest', 10, 1 );



// Enable Gutenberg editor for WooCommerce
// function j0e_activate_gutenberg_product( $can_edit, $post_type ) {
// if ( $post_type == 'product' ) {
// $can_edit = true;
// }
// return $can_edit;
// }
// add_filter( 'use_block_editor_for_post_type', 'j0e_activate_gutenberg_product', 10, 2 );

// enable taxonomy fields for woocommerce with gutenberg on
// function j0e_enable_taxonomy_rest( $args ) {
// $args['show_in_rest'] = true;
// return $args;
// }
// add_filter( 'woocommerce_taxonomy_args_product_cat', 'j0e_enable_taxonomy_rest' );
// add_filter( 'woocommerce_taxonomy_args_product_tag', 'j0e_enable_taxonomy_rest' );
