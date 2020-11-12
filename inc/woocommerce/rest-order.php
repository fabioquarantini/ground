<?php

function ground_woocommerce_prepare_shop_order( $response, $object, $request ) {

	$order_data                             = $response->get_data();
	$order_data['billing']['vat']           = get_post_meta( $object->get_id(), '_billing_vat', true );
	$order_data['billing']['qualification'] = get_post_meta( $object->get_id(), '_billing_qualification', true );
	$order_data['billing']['invoice']       = get_post_meta( $object->get_id(), '_billing_invoice', true );
	$order_data['billing']['customer_type'] = get_post_meta( $object->get_id(), '_billing_customer_type', true );
	$order_data['billing']['fiscal_code']   = get_post_meta( $object->get_id(), '_billing_fiscal_code', true );
	$order_data['billing']['pec']           = get_post_meta( $object->get_id(), '_billing_pec', true );
	$order_data['billing']['sdi']           = get_post_meta( $object->get_id(), '_billing_sdi', true );

	foreach ( $order_data['line_items'] as $key => $item ) {

		$order_data['line_items'][ $key ]['price_regular_original'] = wc_get_order_item_meta( $item['id'], 'price_regular_original', true );
		$order_data['line_items'][ $key ]['price_sale_original']    = wc_get_order_item_meta( $item['id'], 'price_sale_original', true );
		$order_data['line_items'][ $key ]['type']                   = wc_get_order_item_meta( $item['id'], 'type', true );
	}

	$response->data = $order_data;
	return $response;
}

add_filter( 'woocommerce_rest_prepare_shop_order_object', 'ground_woocommerce_prepare_shop_order', 10, 3 );
