<?php

/*
  == CHECKOUT ============================================================

	1 - Payment checkout title
	2 - Hide coupon field on the checkout page
	3 - Show Product Image on Checkout
	4 - Billing fields

=============================================================================  */



	/*
	  =====================================================================
	1 - Payment checkout title
	=========================================================================  */

function ground_woocommerce_checkout_payment_title() {
	echo '<h3>' . __( 'Metodo di pagamento', 'ground' ) . '</h3>';
}

	add_action( 'woocommerce_review_order_before_payment', 'ground_woocommerce_checkout_payment_title' );



/*
  ==========================================================================
	2 - Hide coupon field on the checkout page
	==========================================================================  */

function ground_woocommerce_disable_coupon_field_on_checkout( $enabled ) {
	if ( is_checkout() ) {
		$enabled = false;
	}
	return $enabled;
}

	add_filter( 'woocommerce_coupons_enabled', 'ground_woocommerce_disable_coupon_field_on_checkout' );



	/*
	  ==========================================================================
	3 - Show Product Image on Checkout
	==========================================================================  */
function ground_product_image_on_checkout( $name, $cart_item, $cart_item_key ) {

	/* Return if not checkout page */
	if ( ! is_checkout() ) {
		return $name;
	}

	/* Get product object */
	$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

	/* Get product thumbnail */
	$thumbnail = $_product->get_image();

	/* Add wrapper to image and add some css */
	$image = '<div style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">' . $thumbnail . '</div>';

	/* Prepend image to name and return it */
	return $image . $name;
}

	add_filter( 'woocommerce_cart_item_name', 'ground_product_image_on_checkout', 10, 3 );



/*
  ==========================================================================
	4 - Billing fields
	==========================================================================  */

	// Add checkout fields
function ground_woocommerce_custom_override_checkout_fields( $fields ) {

	// unset( $fields['billing']['billing_address_2'] );

	// Fattura richiesta
	$fields['billing']['billing_invoice']             = array(
		'type'     => 'checkbox',
		'label'    => __( 'Hai bisogno della fattura?', 'ground' ),
		'required' => false,
		'clear'    => true,
	);
	$fields['billing']['billing_invoice']['priority'] = 120;

	// Se viene modificato cambiare anche gli acf users
	$fields['billing']['billing_customer_type']             = array(
		'type'        => 'select',
		'required'    => true,
		'class'       => array( 'form__field--billing' ),
		'label'       => __( 'Tipologia cliente', 'ground' ),
		'label_class' => 'form__checkout',
		'options'     => array(
			'azienda'     => __( 'Società', 'ground' ),
			'individuale' => __( 'Ditta individuale/Professionista', 'ground' ),
			'pubblico'    => __( 'Pubblica amministrazione', 'ground' ),
			'privato'     => __( 'Cliente privato', 'ground' ),
		),
	);
	$fields['billing']['billing_customer_type']['priority'] = 130;

	$fields['billing']['billing_company']['priority'] = 140;

	$fields['billing']['billing_vat']             = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-vat form__field--billing' ),
		'label'       => __( 'P.IVA' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);
	$fields['billing']['billing_vat']['priority'] = 150;

	$fields['billing']['billing_fiscal_code']             = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-vat form__field--billing' ),
		'label'       => __( 'Codice fiscale' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);
	$fields['billing']['billing_fiscal_code']['priority'] = 155;

	$fields['billing']['billing_pec']             = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-pec form__field--billing' ),
		'label'       => __( 'Pec' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);
	$fields['billing']['billing_pec']['priority'] = 160;

	$fields['billing']['billing_sdi']             = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-receiver form__field--billing' ),
		'label'       => __( 'Codice destinatario (SDI)' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);
	$fields['billing']['billing_sdi']['priority'] = 170;

	return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'ground_woocommerce_custom_override_checkout_fields' );


// Display field value on the order edit page (wp-admin)
function ground_woocommerce_custom_checkout_field_display_admin_order_meta( $order ) {

	$is_invoice = get_post_meta( $order->get_id(), '_billing_invoice', true );

	echo '<h3 style="margin-bottom:6px;margin-top:28px;">' . __( 'Dati Fatturazione', 'ground' ) . '</h3>';

	if ( empty( $is_invoice ) ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Fattura non richiesta', 'ground' ) . '</p>';
		return;
	}

	$invoice_customer_type = get_post_meta( $order->get_order_number(), '_billing_customer_type', true );
	$invoice_company       = get_post_meta( $order->get_order_number(), '_billing_company', true );
	$invoice_vat           = get_post_meta( $order->get_order_number(), '_billing_vat', true );
	$invoice_fiscal_code   = get_post_meta( $order->get_order_number(), '_billing_fiscal_code', true );
	$invoice_pec           = get_post_meta( $order->get_order_number(), '_billing_pec', true );
	$invoice_sdi           = get_post_meta( $order->get_order_number(), '_billing_sdi', true );

	if ( $invoice_customer_type ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Tipologia cliente', 'ground' ) . ': <strong>' . $invoice_customer_type . '</strong></p>';
	};
	if ( $invoice_company ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Nome della società', 'ground' ) . ': <strong>' . $invoice_company . '</strong></p>';
	};
	if ( $invoice_vat ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'P.IVA', 'ground' ) . ': <strong>' . $invoice_vat . '</strong></p>';
	};
	if ( $invoice_fiscal_code ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Codice fiscale', 'ground' ) . ': <strong>' . $invoice_fiscal_code . '</strong></p>';
	};
	if ( $invoice_pec ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Pec', 'ground' ) . ': <strong>' . $invoice_pec . '</strong></p>';
	};
	if ( $invoice_sdi ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Codice destinatario (SDI)', 'ground' ) . ': <strong>' . $invoice_sdi . '</strong></p>';
	};

}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'ground_woocommerce_custom_checkout_field_display_admin_order_meta', 10, 1 );





	// Display order custom meta data in order received (thankyou) page
function ground_woocommerce_custom_checkout_field_order_received_order_meta( $order_id ) {

	$order_obj  = wc_get_order( $order_id );
	$is_invoice = get_post_meta( $order_obj->get_order_number(), '_billing_invoice', true );

	echo '<div class="woocommerce-column woocommerce-column--2 woocommerce-column--billing col-2">
		<h2 class="woocommerce-column__title" style="margin-top:18px;"> ' . __( 'Dati Fatturazione', 'ground' ) . '</h2>';

	if ( empty( $is_invoice ) ) {
		echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Fattura non richiesta', 'ground' ) . '</p>';
	} else {
		$invoice_customer_type = get_post_meta( $order_obj->get_order_number(), '_billing_customer_type', true );
		$invoice_company       = get_post_meta( $order_obj->get_order_number(), '_billing_company', true );
		$invoice_vat           = get_post_meta( $order_obj->get_order_number(), '_billing_vat', true );
		$invoice_fiscal_code   = get_post_meta( $order_obj->get_order_number(), '_billing_fiscal_code', true );
		$invoice_pec           = get_post_meta( $order_obj->get_order_number(), '_billing_pec', true );
		$invoice_sdi           = get_post_meta( $order_obj->get_order_number(), '_billing_sdi', true );

		if ( $invoice_customer_type ) {
			echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Tipologia cliente', 'ground' ) . ': <strong>' . $invoice_customer_type . '</strong></p>';
		};
		if ( $invoice_company ) {
			echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Nome della società', 'ground' ) . ': <strong>' . $invoice_company . '</strong></p>';
		};
		if ( $invoice_vat ) {
			echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'P.IVA', 'ground' ) . ': <strong>' . $invoice_vat . '</strong></p>';
		};
		if ( $invoice_fiscal_code ) {
			echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Codice fiscale', 'ground' ) . ': <strong>' . $invoice_fiscal_code . '</strong></p>';
		};
		if ( $invoice_pec ) {
			echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Pec', 'ground' ) . ': <strong>' . $invoice_pec . '</strong></p>';
		};
		if ( $invoice_sdi ) {
			echo '<p style="margin-bottom:6px;margin-top:6px;">' . __( 'Codice destinatario (SDI)', 'ground' ) . ': <strong>' . $invoice_sdi . '</strong></p>';
		};
	}
	echo '</div>';
}

add_action( 'woocommerce_thankyou', 'ground_woocommerce_custom_checkout_field_order_received_order_meta', 10, 2 );


/*
  ==========================================================================
	5 - Move checkout fields
	==========================================================================  */

	add_filter( 'woocommerce_billing_fields', 'ground_woocommerce_move_checkout_billing_fields', 10, 1 );

function ground_woocommerce_move_checkout_billing_fields( $address_fields ) {
	$address_fields['billing_email']['priority'] = 1;
	return $address_fields;
}

	add_filter( 'woocommerce_shipping_fields', 'ground_woocommerce_move_checkout_shipping_fields', 10, 1 );

function ground_woocommerce_move_checkout_shipping_fields( $address_fields ) {
	$address_fields['shipping_city']['priority']     = 25;
	$address_fields['shipping_postcode']['priority'] = 28;
	$address_fields['shipping_state']['priority']    = 30;
	return $address_fields;
}


	/*
	  ==========================================================================
		6 - Shipping title
		==========================================================================  */

function ground_woocommerce_checkout_payment_title2() {
	echo '<h3 class="margin-top-2">' . __( "Dove vuoi spedire l'acquisto?", 'ground' ) . '</h3>';
}

	add_action( 'woocommerce_before_checkout_shipping_form', 'ground_woocommerce_checkout_payment_title2' );


	/*
	  ==========================================================================
		8 - Replace billing title
		==========================================================================  */

function ground_woocommerce_billing_field_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Dettagli di fatturazione':
			$translated_text = __( 'Dati personali', 'ground' );
			break;
		case 'Additional information':
			$translated_text = __( 'Hai altro da comunicare?', 'ground' );
			break;
	}
	return $translated_text;
}
	add_filter( 'gettext', 'ground_woocommerce_billing_field_strings', 20, 3 );


	/*
	  ==========================================================================
		9 - Remove unused fields
		==========================================================================  */

function ground_woocommerce_override_checkout_fields( $fields ) {

	// Billing
	// unset($fields['billing']['billing_company']);
	unset( $fields['billing']['billing_address_1'] );
	unset( $fields['billing']['billing_address_2'] );
	unset( $fields['billing']['billing_city'] );
	unset( $fields['billing']['billing_postcode'] );
	unset( $fields['billing']['billing_country'] );
	unset( $fields['billing']['billing_state'] );
	// unset($fields['billing']['billing_phone']);

	// Shipping
	// unset($fields['shipping']['shipping_country']);
	unset( $fields['shipping']['shipping_company'] );
	unset( $fields['shipping']['shipping_address_2'] );
	return $fields;
}

	add_filter( 'woocommerce_checkout_fields', 'ground_woocommerce_override_checkout_fields' );

	/*
	  ==========================================================================
		10 - Replace Satispay text
		==========================================================================  */

function ground_woocommerce_satispay_strings( $string ) {
	$string = str_ireplace( 'Pay with Satispay', 'Paga con Satispay', $string );
	$string = str_ireplace( 'With Satispay you can send money to friends and pay in stores from your phone. Free, simple, secure! #doitsmart', 'Paga con Satispay.', $string );
	return $string;
}

	// add_filter('gettext', 'ground_woocommerce_satispay_strings');
	// add_filter('ngettext', 'ground_woocommerce_satispay_strings');


	/*
	  ==========================================================================
		11 - Required fields
		==========================================================================  */

function ground_woocommerce_require_wc_phone_field( $fields ) {
	$fields['billing_phone']['required'] = true;
	return $fields;
}

	add_filter( 'woocommerce_billing_fields', 'ground_woocommerce_require_wc_phone_field' );
