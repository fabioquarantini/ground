<?php

/**
 * Products loop
 *
 * @package Ground
 */

/**
 *  Remove add to cart button in product loop
 */

if ( GROUND_PRODUCT_ADD_TO_CART == '1' ) {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}

/**
 * Add term attribute in product loop
 */
function ground_woocommerce_add_product_loop_term() {
	global $product;
	$product_id    = $product->get_id();
	$product_terms = wc_get_product_terms(
		$product_id,
		'product_cat',
		array( 'fields' => 'all' )
	); // For attribute use "pa_nameofattribute.

	if ( count( $product_terms ) ) {
		echo '<div class="product__terms">';
		foreach ( $product_terms as $term ) {
			$term_name = "$term->name";
			if ( next( $product_terms ) == true ) {
				$term_name .= ',';
			}
			echo $term_name;
		}
		echo '</div>';
	}
}

// add_action( 'woocommerce_after_shop_loop_item_title', 'ground_woocommerce_add_product_loop_term', 9 );

/**
 * Remove, Rename, Reorder or Add Custom Sorting Options
 *
 * @param [type] $options
 * @return void
 */
function ground_woocommerce_customize_product_sorting( $options ) {
	$options = array(
		'menu_order' => __( 'Default sorting', 'woocommerce' ),
		'popularity' => __( 'Sort by popularity', 'woocommerce' ),
		'rating'     => __( 'Sort by average rating', 'woocommerce' ),
		'date'       => __( 'Sort by newness', 'woocommerce' ),
		'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
		'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
	);

	// unset( $options[ 'popularity' ] );
	// unset( $options[ 'menu_order' ] );
	// unset( $options[ 'rating' ] );
	// unset( $options[ 'date' ] );
	// unset( $options[ 'price' ] );
	// unset( $options[ 'price-desc' ] );

	return $options;
}

// add_filter('woocommerce_catalog_orderby', 'ground_woocommerce_customize_product_sorting');

/**
 * Remove product sorting dropdown
 */
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );

/**
 * Remove result count
 */
// remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );


/**
 * WooCommerce, Add Short Description to Products on Shop Page
 */
function ground_add_short_description_to_product_loop() {
	global $product;
	if ( $product->get_short_description() ) : ?>
		<div class="woocommerce-loop-product__description">
			<?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
		</div>
		<?php
endif;
}
add_action( 'woocommerce_after_shop_loop_item_title', 'ground_add_short_description_to_product_loop', 2 );




/**
 * WooCommerce, Add WC_Widget_Layered_Nav_Filters to Products on Shop Page
 */
function ground_add_widget_active_filters() {
	the_widget( 'WC_Widget_Layered_Nav_Filters' );
}
add_action( 'woocommerce_before_shop_loop', 'ground_add_widget_active_filters', 2 );
