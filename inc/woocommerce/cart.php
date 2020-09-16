<?php

/*  == CART =================================================================

	1 - WooCommerce ensure cart contents update when products are added to the cart via AJAX
	2 - Disable cart fragments
	3 - Add cross-sells products in minicart

=============================================================================  */


/*  ==========================================================================
	1 - WooCommerce ensure cart contents update when products are added to the cart via AJAX
	==========================================================================  */

	function ground_woocommerce_add_to_cart_fragment( $fragments ) {
		ob_start();
		$count = WC()->cart->cart_contents_count;

		if ($count >= 1) {
			$class = "is-minicart-full";
		} else {
			$class = '';
		} ?>

		<a class="minicart__link <?php echo esc_attr( $class ); ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'ground' ); ?>">
			<?php ground_icon( 'shopping-cart', 'minicart__icon' ); ?>
			<?php if ( $count > 0 ) { ?>
				<span class="minicart__count small"><?php echo esc_html( $count ); ?></span>
			<?php } ?>
		</a>

		<?php $fragments['.minicart__link'] = ob_get_clean();

		return $fragments;
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'ground_woocommerce_add_to_cart_fragment' );



/*  ==========================================================================
	2 - Disable cart fragments
	==========================================================================  */

    function ground_woocommerce_disable_woocommerce_cart_fragments() {
        wp_dequeue_script( 'wc-cart-fragments' );
    }
    // add_action( 'wp_enqueue_scripts', 'ground_woocommerce_disable_woocommerce_cart_fragments', 11 );



    /*  ==========================================================================
	3 - Add cross-sells products in minicart
	==========================================================================  */

	// https://github.com/woocommerce/woocommerce/blob/master/templates/cart/mini-cart.php
	// https://hotexamples.com/examples/-/-/woocommerce_cross_sell_display/php-woocommerce_cross_sell_display-function-examples.html
	function ground_add_crosssells_minicart() {
		wp_reset_query();
		woocommerce_cross_sell_display(4, 2);
	}

	add_action( 'woocommerce_mini_cart_contents', 'ground_add_crosssells_minicart' );