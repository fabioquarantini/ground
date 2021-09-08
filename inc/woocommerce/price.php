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
			$wc_format_price_range = sprintf( __( '<div class="ground__price-range"><span class="price__label">' . __( 'from', 'ground' ) . '</span><ins>%2$s</ins><del>%1$s</del></div>', 'woocommerce' ), wc_price( $min_var_reg_price ), wc_price( $min_var_sale_price ) );
		} else {
			if ( is_post_type_archive( 'product' ) || is_product_category() || is_product_tag() ) {
				$wc_format_price_range = sprintf( __( '<div class="ground__price-range"><span class="price__label">' . __( 'from', 'ground' ) . '</span>%1$s</div>', 'woocommerce' ), wc_price( $min_var_reg_price ) );
			} else {
				$wc_format_price_range = sprintf( __( '<div class="ground__price-range"><span class="price__label">' . __( 'from', 'ground' ) . '</span>%1$s</div>', 'woocommerce' ), wc_price( $min_var_reg_price ) );
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
function ground_buy_now_save_x_notice() {
	$savings = 0;

	foreach ( WC()->cart->get_cart() as $key => $cart_item ) {
		/** @var WC_Product $product */
		$product = $cart_item['data'];

		if ( $product->is_on_sale() ) {
			$savings += ( $product->get_regular_price() - $product->get_sale_price() ) * $cart_item['quantity'];
		}
	}

	if ( ! empty( $savings ) ) { ?>
		<div class="relative m-6 p-6 bg-green-500 rounded-theme w-72 text-white">
			<h6 class="mb-2"><?php _e( 'Your savings' ); ?></h6>
			<p class="opacity-80"><?php echo sprintf( __( 'Buy now and save' ) ); ?> <?php echo sprintf( __( '%s' ), wc_price( $savings ) ); ?></p>
		</div>
		<?php
	}
}
// add_action( 'ground_notice', 'ground_buy_now_save_x_notice', 10 );




/**
 * Free shipping notice.
 */
function ground_free_shipping_notice() {

	$min_amount = 50; // change this to your free shipping threshold

	$current = WC()->cart->subtotal;

	if ( WC()->cart->get_cart_contents_count() > 0 ) {

		if ( $current < $min_amount ) {
			?>
			<div class="relative m-6 p-6 bg-green-500 rounded-theme w-72 text-white">
				<h6 class="mb-2">Free Shipping</h6>
				<p class="opacity-80">Get free shipping if you order  <?php echo wc_price( $min_amount - $current ); ?> more!</p>
				<!-- <a class="button" href="<?php echo wc_get_page_permalink( 'shop' ); ?>">shop</a> -->
			</div>
			<?php
		} else {
			?>
			<div class="relative m-6 p-6 bg-green-500 rounded-theme w-72 text-white">
				<h6 class="mb-2">Congratulazioni!</h6>
				<p class="opacity-80">Hai diritto alle spese di spedizione gratuite!</p>
			</div>
			<?php
		}
	}

}

// add_action( 'ground_notice', 'ground_free_shipping_notice', 5 );

