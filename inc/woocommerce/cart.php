<?php
/**
 * Cart
 *
 * @package Ground
 */

/**
 * Update cart contents when products are added to the cart via AJAX
 *
 * @param array $fragments Cart fragment.
 * @return array
 */
function ground_woocommerce_add_to_cart_fragment( $fragments ) {
	ob_start();
	$count = WC()->cart->cart_contents_count;

	if ( $count >= 1 ) {
		$class = 'is-minicart-full';
	} else {
		$class = '';
	} ?>

	<a class="minicart__link <?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'ground' ); ?>">
		<?php ground_icon( 'shopping-cart', 'minicart__icon' ); ?>
		<?php if ( $count > 0 ) { ?>
			<span class="minicart__count small"><?php echo esc_html( $count ); ?></span>
		<?php } ?>
	</a>

	<?php
	$fragments['.minicart__link'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'ground_woocommerce_add_to_cart_fragment', 10, 1 );

/**
 * Add cross-sells products in minicart
 *
 * @link https://github.com/woocommerce/woocommerce/blob/master/templates/cart/mini-cart.php
 * @link https://hotexamples.com/examples/-/-/woocommerce_cross_sell_display/php-woocommerce_cross_sell_display-function-examples.html
 */
function ground_add_crosssells_minicart() {
	wp_reset_query();
	woocommerce_cross_sell_display( 4, 2 );
}

add_action( 'woocommerce_mini_cart_contents', 'ground_add_crosssells_minicart' );

/**
 * Remove attributes in product title
 */
add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

/**
 * Move cross sells under cart table
 */
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
