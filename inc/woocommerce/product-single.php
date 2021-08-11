<?php
/**
 * Product single
 *
 * @package Ground
 */

function ground_woocommerce_add_gallery_support() {
	// add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	// add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'ground_woocommerce_add_gallery_support' );


/**
 * Change gallery image size
 */
add_filter(
	'woocommerce_gallery_image_size',
	function( $size ) {
		return 'medium_large';
	}
);

/**
 *  Change gallery thumbnail size
 */
add_filter(
	'woocommerce_gallery_thumbnail_size',
	function( $size ) {
		return 'thumbnail';
	}
);

/**
 * Add brand in product single
 */
function ground_woocommerce_add_brand_single_product() {
	global $post;
	echo '<h2 class="woocommerce-product-details__brand">' . get_the_term_list( $post->ID, 'pa_brand', '', ', ' ) . '</h2>';
}

// add_action('woocommerce_single_product_summary', 'ground_woocommerce_add_brand_single_product', 6);

/**
 * Remove single product tabs
 */
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );




/**
 * Reordering the SKU
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );
