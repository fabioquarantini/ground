<?php

/**
 * Price
 *
 * @package Ground
 */

/**
 * Remove Variable Product Price Range: "From: $$$min_price" (https://businessbloomer.com/disable-variable-product-price-range-woocommerce/)
 *
 * @param string  $wc_format_price_range The wc format price range.
 * @param unknown $product The instance.
 * @return $wc_format_price_range
 */
function ground_woocommerce_variation_price_format( $wc_format_price_range, $product ) {

	$min_var_reg_price  = $product->get_variation_regular_price( 'min', true );
	$min_var_sale_price = $product->get_variation_sale_price( 'min', true );
	$max_var_reg_price  = $product->get_variation_regular_price( 'max', true );
	$max_var_sale_price = $product->get_variation_sale_price( 'max', true );

	// New $wc_format_price_range, unless all variations have exact same prices.
	if ( ! ( $min_var_reg_price === $max_var_reg_price && $min_var_sale_price === $max_var_sale_price ) ) {
		if ( $min_var_sale_price < $min_var_reg_price ) {
			$wc_format_price_range = sprintf( __( '<div class="ground__price-range">' . __( 'from', 'ground' ) . '<del>%1$s</del><ins>%2$s</ins></div>', 'woocommerce' ), wc_price( $min_var_reg_price ), wc_price( $min_var_sale_price ) );
		} else {
			if ( is_post_type_archive( 'product' ) || is_product_category() || is_product_tag() ) {
				$wc_format_price_range = sprintf( __( '<div class="ground__price-range">' . __( 'from', 'ground' ) . '%1$s</div>', 'woocommerce' ), wc_price( $min_var_reg_price ) );
			} else {
				$wc_format_price_range = sprintf( __( '<div class="ground__price-range">' . __( 'Price starting from', 'ground' ) . ' %1$s</div>', 'woocommerce' ), wc_price( $min_var_reg_price ) );
			}
		}
	}

	return $wc_format_price_range;
}

add_filter( 'woocommerce_variable_price_html', 'ground_woocommerce_variation_price_format', 10, 2 );



/**
 * Show sale prices in the cart.
 */
function ground_show_sale_price_at_cart( $old_display, $cart_item, $cart_item_key ) {

	/** @var WC_Product $product */
	$product = $cart_item['data'];

	if ( $product ) {
		return $product->get_price_html();
	}

	return $old_display;
}
add_filter( 'woocommerce_cart_item_price', 'ground_show_sale_price_at_cart', 10, 3 );



/**
 * Show savings at the cart.
 */
function ground_buy_now_save_x_cart() {
	$savings = 0;

	foreach ( WC()->cart->get_cart() as $key => $cart_item ) {
		/** @var WC_Product $product */
		$product = $cart_item['data'];

		if ( $product->is_on_sale() ) {
			$savings += ( $product->get_regular_price() - $product->get_sale_price() ) * $cart_item['quantity'];
		}
	}

	if ( ! empty( $savings ) ) { ?>
		<tr class="order-savings">
			<th><?php _e( 'Your savings' ); ?></th>
			<td data-title="<?php _e( 'Your savings' ); ?>"><?php echo sprintf( __( 'Buy now and save %s!' ), wc_price( $savings ) ); ?></td>
		</tr>
		<?php
	}
}
add_action( 'woocommerce_cart_totals_before_order_total', 'ground_buy_now_save_x_cart' );
