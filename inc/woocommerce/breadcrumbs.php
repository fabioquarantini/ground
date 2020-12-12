<?php
/**
 * Breadcrumbs
 *
 * @package Ground
 */

/**
 * WooCommerce breadcrumbs markup
 */
function ground_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => '',
		'wrap_before' => '<nav class="breadcrumb"><ol class="breadcrumb__list">',
		'wrap_after'  => '</ol></nav>',
		'before'      => '<li class="breadcrumb__item">',
		'after'       => '</li>',
		'home'        => _x( 'Home', 'ground' ),
	);
}

add_filter( 'woocommerce_breadcrumb_defaults', 'ground_woocommerce_breadcrumbs' );

/**
 * Remove Yoast "BreadcrumbList" schema data in WooCommerce pages
 */
function ground_woocommerce_disable_yoast_schema_data( $data ) {
	if ( is_woocommerce() && isset( $data['@type'] ) && 'BreadcrumbList' === $data['@type'] ) {
		$data = array();
	}
	return $data;
}

add_filter( 'wpseo_json_ld_output', 'ground_woocommerce_disable_yoast_schema_data', 10, 1 );
