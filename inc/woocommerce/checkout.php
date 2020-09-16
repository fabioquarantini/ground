<?php

/*  == CHECKOUT ============================================================

	1 - Payment checkout title
	2 - Hide coupon field on the checkout page
	3 - Show Product Image on Checkout
	4 - Billing fields

=============================================================================  */



    /*  =====================================================================
	1 - Payment checkout title
	=========================================================================  */

	function ground_woocommerce_checkout_payment_title() {
		echo '<h3>' . __( 'Metodo di pagamento', 'ground' ) .'</h3>';
	}

	add_action( 'woocommerce_review_order_before_payment', 'ground_woocommerce_checkout_payment_title' );



/*  ==========================================================================
	2 - Hide coupon field on the checkout page
	==========================================================================  */

    function ground_woocommerce_disable_coupon_field_on_checkout( $enabled ) {
        if ( is_checkout() ) {
            $enabled = false;
        }
        return $enabled;
    }
    
    add_filter( 'woocommerce_coupons_enabled', 'ground_woocommerce_disable_coupon_field_on_checkout' );



    /*  ==========================================================================
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
		$image = '<div style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">' . $thumbnail .'</div>';

		/* Prepend image to name and return it */
		return $image . $name;
	}

	add_filter( 'woocommerce_cart_item_name', 'ground_product_image_on_checkout', 10, 3 );



/*  ==========================================================================
	4 - Billing fields
	==========================================================================  */

	// Add checkout fields
	function ground_woocommerce_custom_override_checkout_fields( $fields ) {

		//unset( $fields['billing']['billing_address_2'] );

		$fields['billing']['billing_check'] = array(
			'type'      => 'checkbox',
			'label'     => __('Hai bisogno della fattura?', 'ground'),
			'required'  => false,
			'clear'     => true
		);
		$fields['billing']['billing_check']['priority'] = 120;

		$fields['billing']['billing_method'] = array(
			'type'          => 'select',
			'required'      => true,
			'class'         => array('form__field--billing'),
			'label'         => 'Tipologia cliente',
			'label_class'   => 'form__checkout',
			'options'		=> array(
				'azienda'		=> __('Società', 'ground'),
				'individuale'	=> __('Ditta individuale/Professionista', 'ground'),
				'pubblico'		=> __('Pubblica amministrazione', 'ground'),
				'privato'		=> __('Cliente privato', 'ground')
			)
		);
		$fields['billing']['billing_method']['priority'] = 130;

		$fields['billing']['billing_company']['priority'] = 140;

		$fields['billing']['billing_vat'] = array(
			'type'			=> 'text',
			'class' 		=> array('form__field form__field-vat form__field--billing') ,
			'label'			=> __('P.IVA / Codice fiscale') ,
			'placeholder'	=> '' ,
			'required'		=> false,
			'clear'			=> true,
		);
		$fields['billing']['billing_vat']['priority'] = 150;

		$fields['billing']['billing_pec'] = array(
			'type' => 'text',
			'class' => array('form__field form__field-pec form__field--billing') ,
			'label' => __('Pec') ,
			'placeholder' => '' ,
			'required' => false,
			'clear'  => true,
		);
		$fields['billing']['billing_pec']['priority'] = 160;

		$fields['billing']['billing_receiver'] = array(
			'type' => 'text',
			'class' => array('form__field form__field-receiver form__field--billing') ,
			'label' => __('Codice destinatario SDI') ,
			'placeholder' =>'' ,
			'required' => false,
			'clear'  => true,
		);
		$fields['billing']['billing_receiver']['priority'] = 170;

		return $fields;
	}

	//add_filter('woocommerce_checkout_fields','ground_woocommerce_custom_override_checkout_fields');


	// Display field value on the order edit page (wp-admin)
	function ground_woocommerce_custom_checkout_field_display_admin_order_meta($order){

		$billing = get_post_meta( $order->get_id(), '_billing_check', true );

		if ($billing) {
			echo '<h3 style="margin-bottom:6px;margin-top:6px;">'.__('Fattura', 'ground').'</h3>';
			echo '<p style="margin-bottom:6px;margin-top:6px;"><strong>'.__('Tipo di azienda selezionata', 'ground').':</strong> ' . get_post_meta( $order->get_id(), '_billing_method', true ) . '</p>';
			echo '<p style="margin-bottom:6px;margin-top:6px;"><strong>'.__('Azienda', 'ground').':</strong> ' . get_post_meta( $order->get_id(), '_billing_company', true ) . '</p>';
			echo '<p style="margin-bottom:6px;margin-top:6px;"><strong>'.__('P.IVA / Codice fiscale', 'ground').':</strong> ' . get_post_meta( $order->get_id(), '_billing_vat', true ) . '</p>';
			echo '<p style="margin-bottom:6px;margin-top:6px;"><strong>'.__('Pec', 'ground').':</strong> ' . get_post_meta( $order->get_id(), '_billing_pec', true ) . '</p>';
			echo '<p style="margin-bottom:6px;margin-top:6px;"><strong>'.__('Codice Destinatario', 'ground').':</strong> ' . get_post_meta( $order->get_id(), '_billing_receiver', true ) . '</p>';
		}
	}

	//add_action( 'woocommerce_admin_order_data_after_billing_address', 'ground_woocommerce_custom_checkout_field_display_admin_order_meta', 10, 1 );


	function ground_woocommerce_custom_checkout_field_email_order_meta( $order_obj, $sent_to_admin, $plain_text ){

		// this order meta checks if order is marked as a invoice
		$is_invoice = get_post_meta( $order_obj->get_id(), '_billing_check', true );

		if( empty( $is_invoice ) )
			return;

		$invoice_company = get_post_meta( $order_obj->get_id(), '_billing_company', true );
		$invoice_vat = get_post_meta( $order_obj->get_id(), '_billing_vat', true );
		$invoice_pec = get_post_meta( $order_obj->get_id(), '_billing_pec', true );
		$invoice_receiver = get_post_meta( $order_obj->get_id(), '_billing_receiver', true );

		if ( $plain_text === false ) {
			echo '<h2>Dati fattura</h2>
			<ul>
			<li><strong>Nome della società:</strong> ' . $invoice_company . '</li>
			<li><strong>Partita IVA:</strong> ' . $invoice_vat . '</li>
			<li><strong>PEC:</strong> ' . $invoice_pec . '</li>
			<li><strong>Codice Destinatario:</strong> ' . $invoice_receiver . '</li>
			</ul> <br><br>';

		} else {
			echo "Dati fattura\n
			Nome della società: $invoice_company
			Partita IVA: $invoice_vat
			PEC: $invoice_pec
			Codice Destinatario: $invoice_receiver";
		}

	}

	//add_action( 'woocommerce_email_customer_details', 'ground_woocommerce_custom_checkout_field_email_order_meta', 30, 3 );


	// Display order custom meta data in Order received (thankyou) page
	function ground_woocommerce_custom_checkout_field_order_received_order_meta( $order_id ) {

		$order_obj = wc_get_order( $order_id );

		// this order meta checks if order is marked as a invoice
		$is_invoice = get_post_meta( $order_obj->get_id(), '_billing_check', true );

		// we won't display anything if it is not a invoice
		if( empty( $is_invoice ) )
			return;

		// ok, if it is the gift order, get all the other fields
		$invoice_company = get_post_meta( $order_obj->get_id(), '_billing_company', true );
		$invoice_vat = get_post_meta( $order_obj->get_id(), '_billing_vat', true );
		$invoice_pec = get_post_meta( $order_obj->get_id(), '_billing_pec', true );
		$invoice_receiver = get_post_meta( $order_obj->get_id(), '_billing_receiver', true );

		echo '<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
			<h2 class="woocommerce-column__title"> ' .__('Fattura', 'ground'). '</h2>
			<address>
				' . $invoice_company . '<br>
				' . $invoice_vat . '<br>
				' . $invoice_pec . '<br>
				' . $invoice_receiver . '<br>
			</address>
		</div>';
	}

	//add_action('woocommerce_thankyou', 'ground_woocommerce_custom_checkout_field_order_received_order_meta', 10, 2 );