<?php
/**
 * Pagination
 *
 * @package Ground
 */

/**
 * WooCommerce custom pagination
 */
function ground_woocommerce_pagination() {
	get_template_part( 'partials/pagination' );
}

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'ground_woocommerce_pagination', 10 );

/**
 * Change number of products that are displayed per page (shop page)
 *
 * @param int $cols Contains the current number of products per page based on the value stored on Options -> Reading.
 */
function ground_woocommerce_products_per_page( $cols ) {
	$cols = 9;
	return $cols;
}

// add_filter( 'loop_shop_per_page', 'ground_woocommerce_products_per_page', 20 );
