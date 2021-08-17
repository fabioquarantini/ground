<?php
/**
 * Checkout
 *
 * @package Ground
 */

/**
 * Billing fields
 *
 * @param array $fields Billing fields.
 */
function ground_woocommerce_billing_fields( $fields ) {

	// Remove fields.
	unset( $fields['billing_address_1'] );
	unset( $fields['billing_address_2'] );
	unset( $fields['billing_city'] );
	unset( $fields['billing_postcode'] );
	unset( $fields['billing_country'] );
	unset( $fields['billing_state'] );

	// Force required.
	$fields['billing_phone']['required'] = true;

	// New fields.
	$fields['billing_invoice'] = array(
		'type'     => 'checkbox',
		'label'    => __( 'Hai bisogno della fattura?', 'ground' ),
		'required' => false,
		'clear'    => true,
	);

	$fields['billing_customer_type'] = array( // Se viene modificato cambiare anche gli acf users.
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

	$fields['billing_vat'] = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-vat form__field--billing' ),
		'label'       => __( 'P.IVA', 'ground' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);

	$fields['billing_fiscal_code'] = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-vat form__field--billing' ),
		'label'       => __( 'Codice fiscale', 'ground' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);

	$fields['billing_pec'] = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-pec form__field--billing' ),
		'label'       => __( 'Pec', 'ground' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);

	$fields['billing_sdi'] = array(
		'type'        => 'text',
		'class'       => array( 'form__field form__field-receiver form__field--billing' ),
		'label'       => __( 'Codice destinatario (SDI)', 'ground' ),
		'placeholder' => '',
		'required'    => false,
		'clear'       => true,
	);

	// Move fields.
	$fields['billing_email']['priority']         = 1;
	$fields['billing_invoice']['priority']       = 120;
	$fields['billing_customer_type']['priority'] = 130;
	$fields['billing_company']['priority']       = 140;
	$fields['billing_vat']['priority']           = 150;
	$fields['billing_fiscal_code']['priority']   = 155;
	$fields['billing_pec']['priority']           = 160;
	$fields['billing_sdi']['priority']           = 170;

	return $fields;
}

add_filter( 'woocommerce_billing_fields', 'ground_woocommerce_billing_fields' );


/**
 * Shipping fields
 *
 * @param array $fields Shipping fields.
 */
function ground_woocommerce_shipping_fields( $fields ) {

	// Remove fields.
	unset( $fields['shipping_company'] );
	unset( $fields['shipping_address_2'] );
	// unset($fields['shipping_country']);

	// Move fields.
	$fields['shipping_city']['priority']     = 25;
	$fields['shipping_postcode']['priority'] = 28;
	$fields['shipping_state']['priority']    = 30;

	return $fields;
}

add_filter( 'woocommerce_shipping_fields', 'ground_woocommerce_shipping_fields' );

/**
 * Admin order billing fields
 *
 * @param array $fields Billing fields.
 * @return array
 */
function ground_woocommerce_admin_order_billing_fields( $fields ) {

	global $post;
	$order      = wc_get_order( $post->ID );
	$order_data = $order->get_meta( '_billing_invoice' );

	if ( '1' === $order_data ) {

		// Remove fields.
		unset( $fields['billing_first_name'] );
		unset( $fields['billing_last_name'] );
		unset( $fields['billing_address_1'] );
		unset( $fields['billing_address_2'] );
		unset( $fields['billing_city'] );
		unset( $fields['billing_postcode'] );
		unset( $fields['billing_country'] );
		unset( $fields['billing_state'] );

		$fields['customer_type'] = array(
			'label'   => __( 'Tipologia cliente', 'ground' ),
			'show'    => true,
			'type'    => 'select',
			'options' => array(
				'azienda'     => __( 'Società', 'ground' ),
				'individuale' => __( 'Ditta individuale/Professionista', 'ground' ),
				'pubblico'    => __( 'Pubblica amministrazione', 'ground' ),
				'privato'     => __( 'Cliente privato', 'ground' ),
			),
		);

		$fields['vat'] = array(
			'label' => __( 'P.IVA', 'ground' ),
			'show'  => true,
		);

		$fields['fiscal_code'] = array(
			'label' => __( 'Codice fiscale', 'ground' ),
			'show'  => true,
		);

		$fields['sdi'] = array(
			'label' => __( 'Codice destinatario (SDI)', 'ground' ),
			'show'  => true,
		);

		$fields['pec'] = array(
			'label' => __( 'Pec', 'ground' ),
			'show'  => true,
		);
	} else {
		$fields = array();
	}

	return $fields;
}

add_filter( 'woocommerce_admin_billing_fields', 'ground_woocommerce_admin_order_billing_fields' );

/**
 * Admin order billing invoice request
 *
 * @param object $order Order.
 * @return void
 */
function ground_woocommerce_admin_order_after_billing_fields( $order ) {

	$invoice = get_post_meta( $order->get_id(), '_billing_invoice', true );

	echo '<h3>' . __( 'Fattura richiesta?', 'ground' ) . '</h3>';

	if ( empty( $invoice ) ) {
		echo '<p>' . __( 'Non è richiesta fattura', 'ground' ) . '</p>';
	} else {
		echo '<p>' . __( 'Il cliente ha richiesto la fattura', 'ground' ) . '</p>';
	}

}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'ground_woocommerce_admin_order_after_billing_fields', 10, 1 );

/**
 * Order received invoice fields (thankyou page)
 *
 * @param string $order_id Order id.
 */
function ground_woocommerce_custom_checkout_field_order_received_order_meta( $order_id ) {

	$order_obj  = wc_get_order( $order_id );
	$is_invoice = get_post_meta( $order_obj->get_order_number(), '_billing_invoice', true );

	echo '<div class="woocommerce-column woocommerce-column--2 woocommerce-column--billing col-2">
		<h2 class="woocommerce-column__title" style="margin-top:18px;"> ' . __( 'Dati Fatturazione', 'ground' ) . '</h2>';

	if ( empty( $is_invoice ) ) {
		echo '<p class="woocommerce-customer-details--no-invoice margin-bottom-0">' . __( 'Fattura non richiesta', 'ground' ) . '</p>';
	} else {
		$invoice_customer_type = get_post_meta( $order_obj->get_order_number(), '_billing_customer_type', true );
		$invoice_company       = get_post_meta( $order_obj->get_order_number(), '_billing_company', true );
		$invoice_vat           = get_post_meta( $order_obj->get_order_number(), '_billing_vat', true );
		$invoice_fiscal_code   = get_post_meta( $order_obj->get_order_number(), '_billing_fiscal_code', true );
		$invoice_pec           = get_post_meta( $order_obj->get_order_number(), '_billing_pec', true );
		$invoice_sdi           = get_post_meta( $order_obj->get_order_number(), '_billing_sdi', true );

		if ( $invoice_customer_type ) {
			echo '<p class="woocommerce-customer-details--customer-type margin-bottom-0">' . __( 'Tipologia cliente', 'ground' ) . ': <strong>' . $invoice_customer_type . '</strong></p>';
		};
		if ( $invoice_company ) {
			echo '<p class="woocommerce-customer-details--company margin-bottom-0">' . __( 'Nome della società', 'ground' ) . ': <strong>' . $invoice_company . '</strong></p>';
		};
		if ( $invoice_vat ) {
			echo '<p class="woocommerce-customer-details--vat margin-bottom-0">' . __( 'P.IVA', 'ground' ) . ': <strong>' . $invoice_vat . '</strong></p>';
		};
		if ( $invoice_fiscal_code ) {
			echo '<p class="woocommerce-customer-details--fiscal-code margin-bottom-0">' . __( 'Codice fiscale', 'ground' ) . ': <strong>' . $invoice_fiscal_code . '</strong></p>';
		};
		if ( $invoice_pec ) {
			echo '<p class="woocommerce-customer-details--pec margin-bottom-0">' . __( 'Pec', 'ground' ) . ': <strong>' . $invoice_pec . '</strong></p>';
		};
		if ( $invoice_sdi ) {
			echo '<p class="woocommerce-customer-details--sdi margin-bottom-0">' . __( 'Codice destinatario (SDI)', 'ground' ) . ': <strong>' . $invoice_sdi . '</strong></p>';
		};
	}
	echo '</div>';
}

add_action( 'woocommerce_thankyou', 'ground_woocommerce_custom_checkout_field_order_received_order_meta', 10, 2 );


/**
 * Shipping title
 */
function ground_woocommerce_checkout_shipping_title() {
	echo '<h3 class="margin-top-2">' . __( "Dove vuoi spedire l'acquisto?", 'ground' ) . '</h3>';
}

add_action( 'woocommerce_before_checkout_shipping_form', 'ground_woocommerce_checkout_shipping_title' );

/**
 * Payments title
 */
function ground_woocommerce_checkout_payments_title() {
	echo '<h3>' . __( 'Metodo di pagamento', 'ground' ) . '</h3>';
}

// add_action( 'woocommerce_review_order_before_payment', 'ground_woocommerce_checkout_payments_title' );

/**
 * Replace checkout strings
 *
 * @param string $translation Translated text.
 * @param string $text Text to translate.
 * @param string $domain Text domain. Unique identifier for retrieving translated strings.
 */
function ground_woocommerce_billing_field_strings( $translation, $text, $domain ) {
	switch ( $translation ) {
		case 'Dettagli di fatturazione':
			$translation = __( 'Dati personali', 'ground' );
			break;
		case 'Informazioni aggiuntive':
			$translation = __( 'Hai altro da comunicare?', 'ground' );
			break;
	}
	return $translation;
}

add_filter( 'gettext', 'ground_woocommerce_billing_field_strings', 20, 3 );

/**
 * Hide coupon field in checkout
 *
 * @param string $yes_get_option_woocommerce_enable_coupons The yes get option woocommerce enable coupons.
 * @return string
 */
function ground_woocommerce_disable_coupon_field_on_checkout( $yes_get_option_woocommerce_enable_coupons ) {
	if ( is_checkout() ) {
		$yes_get_option_woocommerce_enable_coupons = false;
	}
	return $yes_get_option_woocommerce_enable_coupons;
}

add_filter( 'woocommerce_coupons_enabled', 'ground_woocommerce_disable_coupon_field_on_checkout' );

/**
 * Show product image on checkout
 *
 * @param callback $product_name
 * @param int      $cart_item
 * @param int      $cart_item_key
 */
function ground_product_image_on_checkout( $product_name, $cart_item, $cart_item_key ) {

	if ( ! is_checkout() ) {
		return $product_name;
	}

	$_product  = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	$thumbnail = $_product->get_image();
	$image     = '<div class="product-thumbnail">' . $thumbnail . '</div>';

	return $image . $product_name;
}

add_filter( 'woocommerce_cart_item_name', 'ground_product_image_on_checkout', 10, 3 );




/**
 * Add secure order label
 */
function ground_add_secure_order_label() { ?>
	<div class="lg:absolute top-0 lg:right-0">
		<div class="lg:text-right pt-4 text-base font-bold lg:pt-0">
			<?php ground_icon( 'lock' ); ?> <?php _e( 'Secure order', 'ground' ); ?>
		</div>
	</div>
	<?php
}

add_action( 'woocommerce_before_checkout_form', 'ground_add_secure_order_label', 10 );
