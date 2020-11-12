<?php
function ground_woocommerce_checkout_create_order_line_item_meta( $item, $cart_item_key, $values, $order ) {

	$product = $values['data'];

	$regular_price = $product->get_regular_price();
	if ( ! empty( $regular_price ) ) {
		$item->update_meta_data( 'price_regular_original', $regular_price );
	}

	$sale_price = $product->get_sale_price();
	if ( ! empty( $sale_price ) ) {
		$item->update_meta_data( 'price_sale_original', $sale_price );
	}

	$price = $product->get_price();
	if ( ! empty( $price ) ) {
		$item->update_meta_data( 'price_original', $price );
	}

	$type = $product->get_type();
	if ( ! empty( $type ) ) {
		$item->update_meta_data( 'type', $type );
	}

}

add_action( 'woocommerce_checkout_create_order_line_item', 'ground_woocommerce_checkout_create_order_line_item_meta', 20, 4 );
