<?php
/**
 * REST - Order fields
 *
 * @package Ground
 */

/**
 * Filter the data for a response.
 *
 * @param WP_REST_Response $response  The response object.
 * @param WC_Data          $object    Object data.
 * @param WP_REST_Request  $request   Request object.
 */
function ground_woocommerce_rest_prepare_shop_order( $response, $object, $request ) {

	$order_data                             = $response->get_data();
	$order_data['billing']['vat']           = get_post_meta( $object->get_id(), '_billing_vat', true );
	$order_data['billing']['qualification'] = get_post_meta( $object->get_id(), '_billing_qualification', true );
	$order_data['billing']['invoice']       = get_post_meta( $object->get_id(), '_billing_invoice', true );
	$order_data['billing']['customer_type'] = get_post_meta( $object->get_id(), '_billing_customer_type', true );
	$order_data['billing']['fiscal_code']   = get_post_meta( $object->get_id(), '_billing_fiscal_code', true );
	$order_data['billing']['pec']           = get_post_meta( $object->get_id(), '_billing_pec', true );
	$order_data['billing']['sdi']           = get_post_meta( $object->get_id(), '_billing_sdi', true );

	$response->data = $order_data;
	return $response;
}

add_filter( 'woocommerce_rest_prepare_shop_order_object', 'ground_woocommerce_rest_prepare_shop_order', 10, 3 );
