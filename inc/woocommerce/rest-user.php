<?php
/**
 * REST - User/customer fields
 *
 * @package Ground
 */

/**
 * Register customer invoice field
 */
add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer',
			'invoice',
			array(
				'get_callback'    => function( $object, $field_name, $request ) {
					return get_user_meta( $object['id'], 'billing_invoice', true );
				},
				'update_callback' => function( $value, $object, $field_name ) {
					if ( ! empty( $value ) ) {
						return update_user_meta( $object->ID, 'billing_invoice', sanitize_text_field( $value ) );
					}
				},
				'schema'          => array(
					'description' => __( 'Invoice', 'ground-admin' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

/**
 * Register customer type field
 */
add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer',
			'customer_type',
			array(
				'get_callback'    => function( $object, $field_name, $request ) {
					return get_user_meta( $object['id'], 'billing_customer_type', true );
				},
				'update_callback' => function( $value, $object, $field_name ) {
					if ( ! empty( $value ) ) {
						return update_user_meta( $object->ID, 'billing_customer_type', sanitize_text_field( $value ) );
					}
				},
				'schema'          => array(
					'description' => __( 'Customer type', 'ground-admin' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

/**
 * Register customer VAT field
 */
add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer',
			'vat',
			array(
				'get_callback'    => function( $object, $field_name, $request ) {
					return get_user_meta( $object['id'], 'billing_vat', true );
				},
				'update_callback' => function( $value, $object, $field_name ) {
					if ( ! empty( $value ) ) {
						return update_user_meta( $object->ID, 'billing_vat', sanitize_text_field( $value ) );
					}
				},
				'schema'          => array(
					'description' => __( 'Vat', 'ground-admin' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

/**
 * Register customer fiscal code field
 */
add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer',
			'fiscal_code',
			array(
				'get_callback'    => function( $object, $field_name, $request ) {
					return get_user_meta( $object['id'], 'billing_fiscal_code', true );
				},
				'update_callback' => function( $value, $object, $field_name ) {
					if ( ! empty( $value ) ) {
						return update_user_meta( $object->ID, 'billing_fiscal_code', sanitize_text_field( $value ) );
					}
				},
				'schema'          => array(
					'description' => __( 'Fiscal code', 'ground-admin' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

/**
 * Register customer PEC field
 */
add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer',
			'pec',
			array(
				'get_callback'    => function( $object, $field_name, $request ) {
					return get_user_meta( $object['id'], 'billing_pec', true );
				},
				'update_callback' => function( $value, $object, $field_name ) {
					if ( ! empty( $value ) ) {
						return update_user_meta( $object->ID, 'billing_pec', sanitize_text_field( $value ) );
					}
				},
				'schema'          => array(
					'description' => __( 'Pec', 'ground-admin' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

/**
 * Register customer SDI field
 */
add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer',
			'sdi',
			array(
				'get_callback'    => function( $object, $field_name, $request ) {
					return get_user_meta( $object['id'], 'billing_sdi', true );
				},
				'update_callback' => function( $value, $object, $field_name ) {
					if ( ! empty( $value ) ) {
						return update_user_meta( $object->ID, 'billing_sdi', sanitize_text_field( $value ) );
					}
				},
				'schema'          => array(
					'description' => __( 'Sdi', 'ground-admin' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

/**
 * Filter customer data returned from the REST API.
 *
 * @link https://github.com/claudiosanches/woocommerce-extra-checkout-fields-for-brazil/blob/master/includes/class-extra-checkout-fields-for-brazil-api.php
 * @param WP_REST_Response $response   The response object.
 * @param WP_User          $user_data  User object used to create response.
 * @param WP_REST_Request  $request    Request object.
 */
function ground_woocommerce_filter_rest_prepare_customer( $response, $user_data, $request ) {

	$response->data['billing']['invoice']       = get_user_meta( $user_data->ID, 'billing_invoice', true );
	$response->data['billing']['customer_type'] = get_user_meta( $user_data->ID, 'billing_customer_type', true );
	$response->data['billing']['vat']           = get_user_meta( $user_data->ID, 'billing_vat', true );
	$response->data['billing']['fiscal_code']   = get_user_meta( $user_data->ID, 'billing_fiscal_code', true );
	$response->data['billing']['pec']           = get_user_meta( $user_data->ID, 'billing_pec', true );
	$response->data['billing']['sdi']           = get_user_meta( $user_data->ID, 'billing_sdi', true );

	return $response;
};

add_filter( 'woocommerce_rest_prepare_customer', 'ground_woocommerce_filter_rest_prepare_customer', 10, 3 );
