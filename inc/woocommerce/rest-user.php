<?php

add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer', // Object type.
			'vat', // field slug.
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
					'description' => __( 'Vat', 'woocommerce' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);


add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer', // Object type.
			'qualification', // field slug.
			array(
				'get_callback'    => function( $object, $field_name, $request ) {
					return get_user_meta( $object['id'], 'billing_qualification', true );
				},
				'update_callback' => function( $value, $object, $field_name ) {
					if ( ! empty( $value ) ) {
						return update_user_meta( $object->ID, 'billing_qualification', sanitize_text_field( $value ) );
					}
				},
				'schema'          => array(
					'description' => __( 'Qualification', 'woocommerce' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer', // Object type.
			'invoice', // field slug.
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
					'description' => __( 'Invoice', 'woocommerce' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer', // Object type.
			'customer_type', // field slug.
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
					'description' => __( 'Customer type', 'woocommerce' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer', // Object type.
			'fiscal_code', // field slug.
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
					'description' => __( 'Fiscal code', 'woocommerce' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer', // Object type.
			'pec', // field slug.
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
					'description' => __( 'Pec', 'woocommerce' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);


add_action(
	'rest_api_init',
	function() {
		register_rest_field(
			'customer', // Object type.
			'sdi', // field slug.
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
					'description' => __( 'Sdi', 'woocommerce' ),
					'type'        => 'string',
					'context'     => array( 'view', 'edit' ),
				),
			)
		);
	}
);

// https://github.com/claudiosanches/woocommerce-extra-checkout-fields-for-brazil/blob/master/includes/class-extra-checkout-fields-for-brazil-api.php
function filter_woocommerce_rest_prepare_customer( $response, $user_data, $request ) {

	$response->data['billing']['vat']           = get_user_meta( $user_data->ID, 'billing_vat', true );
	$response->data['billing']['qualification'] = get_user_meta( $user_data->ID, 'billing_qualification', true );
	$response->data['billing']['invoice']       = get_user_meta( $user_data->ID, 'billing_invoice', true );
	$response->data['billing']['customer_type'] = get_user_meta( $user_data->ID, 'billing_customer_type', true );
	$response->data['billing']['fiscal_code']   = get_user_meta( $user_data->ID, 'billing_fiscal_code', true );
	$response->data['billing']['pec']           = get_user_meta( $user_data->ID, 'billing_pec', true );
	$response->data['billing']['sdi']           = get_user_meta( $user_data->ID, 'billing_sdi', true );

	return $response;
};

add_filter( 'woocommerce_rest_prepare_customer', 'filter_woocommerce_rest_prepare_customer', 10, 3 );
