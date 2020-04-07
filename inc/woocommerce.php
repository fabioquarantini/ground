<?php

/*  ==========================================================================

	1 - Add WooCommerce support
	2 - Remove WooCommerce styles
	3 - Disable WooCommerce sidebar
	4 - Register Ground Sidebar
	5 - Ensure cart contents update when products are added to the cart via AJAX
	6 - WooCommerce display category image on category archive
	7 - WooCommerce breadcrumbs markup
	8 - WooCommerce remove default functions
	9 - WooCommerce body class
	10 - WooCommerce custom pagination
	11 - Remove Yoast "BreadcrumbList" schema data in WooCommerce pages
	12 - Change single gallery thumbnail size
	13 - Remove loop add to cart button
	14 - Add term attribute in product loop
	15 - Add brand in product single
	16 - Payment checkout title
	17 - Hide coupon field on the checkout page
	18 - Billing fields
	19 - Add custom field (REST editable)
	20 - Remove woocommerce_product_tabs in single-product
	21 - Remove Variable Product Price Range: "From: $$$min_price"
	22 - Remove woocommerce_catalog_ordering
	23 - Change number of products that are displayed per page (shop page)
	24 - Change Text catalog_orderby Button
	25 - Cash on delivery fee
	26 - Show Product Image on Checkout

==========================================================================  */


/*  ==========================================================================
	1 - Add WooCommerce support
	==========================================================================  */

function ground_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
	//add_theme_support( 'wc-product-gallery-zoom' );
	//add_theme_support( 'wc-product-gallery-lightbox' );
	//add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'ground_add_woocommerce_support' );


/*  ==========================================================================
	2 - Remove WooCommerce styles
	==========================================================================  */

function ground_dequeue_woocommerce_styles( $enqueue_styles ) {
	// Remove the gloss
	unset( $enqueue_styles['woocommerce-general'] );
	// Remove the layout
	unset( $enqueue_styles['woocommerce-layout'] );
	// Remove the smallscreen optimisation
	unset( $enqueue_styles['woocommerce-smallscreen'] );

	return $enqueue_styles;
}

add_filter( 'woocommerce_enqueue_styles', 'ground_dequeue_woocommerce_styles' );


/*  ==========================================================================
	3 - Disable WooCommerce sidebar
	==========================================================================  */

function ground_disable_woocommerce_sidebar() {
	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}

add_action('init', 'ground_disable_woocommerce_sidebar');


/*  ==========================================================================
	4 - WooCommerce Register Sidebar
	==========================================================================  */

function ground_woocommerce_widgets_init() {
	register_sidebar( array(
		'name' => __( 'WooCommerce', 'ground' ),
		'id' => 'sidebar-woocommerce',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widgettitle">',
		'after_title' => '</h6>',
	) );
}

add_action( 'widgets_init', 'ground_woocommerce_widgets_init' );


/*  ==========================================================================
	5 - WooCommerce ensure cart contents update when products are added to the cart via AJAX
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
		<i class="minicart__icon icon-cart"></i>
		<?php if ( $count > 0 ) { ?>
			<span class="minicart__count small"><?php echo esc_html( $count ); ?></span>
		<?php } ?>
	</a>

	<?php $fragments['.minicart__link'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'ground_woocommerce_add_to_cart_fragment' );


/*  ==========================================================================
	6 - WooCommerce display category image on category archive
	==========================================================================  */

function ground_woocommerce_category_image() {
	if ( is_product_category() ){
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$meta = get_term_meta($cat->term_id );
		$thumbnail_id = $meta['thumbnail_id'][0];
		$image = wp_get_attachment_image( $thumbnail_id , 'banner');
		if ( $image ) {
			echo $image;
		}
	}
}

add_action( 'woocommerce_archive_description', 'ground_woocommerce_category_image', 2 );


/*  ==========================================================================
	7 - WooCommerce breadcrumbs markup
	==========================================================================  */

function ground_woocommerce_breadcrumbs() {
	return array(
		'delimiter' => '',
		'wrap_before' => '<div class="gr-12"><nav class="breadcrumb"><ol class="breadcrumb__list">',
		'wrap_after' => '</ol></nav></div>',
		'before' => '<li class="breadcrumb__item">',
		'after' => '</li>',
		'home' => _x('Home', 'ground')
	);
}

add_filter( 'woocommerce_breadcrumb_defaults', 'ground_woocommerce_breadcrumbs' );


/*  ==========================================================================
	8 - WooCommerce remove default functions
	==========================================================================  */

// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

// Remove the sorting dropdown from WooCommerce
//remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );


/*  ==========================================================================
	9 - WooCommerce body class
	==========================================================================  */

function ground_woocommerce_active_body_class( $classes ) {
	$classes[] = 'is-woocommerce-active';
	return $classes;
}

add_filter( 'body_class', 'ground_woocommerce_active_body_class' );


/*  ==========================================================================
	10 - WooCommerce custom pagination
	==========================================================================  */

function ground_woocommerce_pagination() {
	get_template_part( 'partials/pagination' );
}

remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'ground_woocommerce_pagination', 10);


/*  ==========================================================================
	11 - Remove Yoast "BreadcrumbList" schema data in WooCommerce pages
	==========================================================================  */

function ground_woocommerce_disable_yoast_schema_data($data){
	if (is_woocommerce() && isset($data["@type"]) && $data["@type"] === 'BreadcrumbList') {
		$data = array();
	}
	return $data;
}

add_filter('wpseo_json_ld_output', 'ground_woocommerce_disable_yoast_schema_data', 10, 1);


/*  ==========================================================================
	12 - Change single gallery thumbnail size
	==========================================================================  */

add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
	return 'thumbnail';
});

add_filter( 'woocommerce_gallery_image_size', function( $size ) {
	return 'medium_large';
});

/*  ==========================================================================
	13 - Remove loop add to cart button
	==========================================================================  */

// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


/*  ==========================================================================
	14 - Add term attribute in product loop
	==========================================================================  */

function ground_woocommerce_add_product_loop_term() {
	global $product;
	$product_id = $product->get_id();
	$product_terms = wc_get_product_terms($product_id, 'product_cat', array('fields' => 'all')); // For attribute use "pa_nameofattribute

	if (count($product_terms)) {
		echo "<div class=\"product__terms\">";
			foreach ($product_terms as $term) {
				$term_name = "$term->name";
				if (next($product_terms) == true) $term_name .= ",";
				echo $term_name;
			}
		echo "</div>";
	}
}

add_action('woocommerce_after_shop_loop_item_title', 'ground_woocommerce_add_product_loop_term', 9);


/*  ==========================================================================
	15 - Add brand in product single
	==========================================================================  */

function ground_woocommerce_add_brand_single_product() {
	global $post;
	echo '<h2 class="woocommerce-product-details__brand">' . get_the_term_list($post->ID, 'pa_brand', '', ', ') . '</h2>';
}

// add_action('woocommerce_single_product_summary', 'ground_woocommerce_add_brand_single_product', 6);


/*  ==========================================================================
	16 - Payment checkout title
	==========================================================================  */

function ground_woocommerce_checkout_payment_title() {
	echo '<h3>' . __( 'Metodo di pagamento', 'ground' ) .'</h3>';
}

add_action( 'woocommerce_review_order_before_payment', 'ground_woocommerce_checkout_payment_title' );


/*  ==========================================================================
	17 - Hide coupon field on the checkout page
	==========================================================================  */

function ground_woocommerce_disable_coupon_field_on_checkout( $enabled ) {
	if ( is_checkout() ) {
		$enabled = false;
	}
	return $enabled;
}

add_filter( 'woocommerce_coupons_enabled', 'ground_woocommerce_disable_coupon_field_on_checkout' );

/*  ==========================================================================
	18 - Billing fields
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
	$is_invoice = get_post_meta( $order_obj->get_order_number(), '_billing_check', true );

	if( empty( $is_invoice ) )
		return;

	$invoice_company = get_post_meta( $order_obj->get_order_number(), '_billing_company', true );
	$invoice_vat = get_post_meta( $order_obj->get_order_number(), '_billing_vat', true );
	$invoice_pec = get_post_meta( $order_obj->get_order_number(), '_billing_pec', true );
	$invoice_receiver = get_post_meta( $order_obj->get_order_number(), '_billing_receiver', true );

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
	$is_invoice = get_post_meta( $order_obj->get_order_number(), '_billing_check', true );

	// we won't display anything if it is not a invoice
	if( empty( $is_invoice ) )
		return;

	// ok, if it is the gift order, get all the other fields
	$invoice_company = get_post_meta( $order_obj->get_order_number(), '_billing_company', true );
	$invoice_vat = get_post_meta( $order_obj->get_order_number(), '_billing_vat', true );
	$invoice_pec = get_post_meta( $order_obj->get_order_number(), '_billing_pec', true );
	$invoice_receiver = get_post_meta( $order_obj->get_order_number(), '_billing_receiver', true );

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


/*  ==========================================================================
	19 - Add custom field (REST editable)
	==========================================================================  */

// Show custom field
function woocommerce_product_example_of_custom_field_fields() {

	echo '<div class="product_custom_field options_group">';
		woocommerce_wp_text_input(
			array(
				'id'          => 'example_of_custom_field',
				'label'       => __( 'Example of custom field', 'woocommerce' ),
				'placeholder' => '',
				'desc_tip'    => 'false',
				//'description' => __( 'Description', 'woocommerce' )
			)
		);
	echo '</div>';

}

add_action('woocommerce_product_options_shipping', 'woocommerce_product_example_of_custom_field_fields');


// Save field
function woocommerce_product_example_of_custom_field_fields_save($post_id) {

	$woocommerce_example_of_custom_field = $_POST['example_of_custom_field'];
	if( !empty( $woocommerce_example_of_custom_field ) ) {
		update_post_meta( $post_id, 'example_of_custom_field', esc_attr( $woocommerce_example_of_custom_field ) );
	}

}

add_action('woocommerce_process_product_meta', 'woocommerce_product_example_of_custom_field_fields_save');


// REST field
add_action( 'rest_api_init', function() {

	register_rest_field( 'product',
		'example_of_custom_field',
		array(
			'get_callback' => function( $object, $field_name, $request ) {
				return get_post_meta($object['id'], 'example_of_custom_field', true);
			},
			'update_callback' => function( $value, $object, $field_name ) {
				update_post_meta($object->id, 'example_of_custom_field', esc_attr($value));
			},
			'schema' => array(
				'description'	=> __( 'Example of custom field', 'woocommerce' ),
				'type'			=> 'string',
				'context'		=> array( 'view', 'edit' )
			),
		)
	);

});


/*  ==========================================================================
	20 - Remove woocommerce_product_tabs in single-product
	==========================================================================  */

// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


/*  ==========================================================================
	21 - Remove Variable Product Price Range: "From: $$$min_price" (https://businessbloomer.com/disable-variable-product-price-range-woocommerce/)
	==========================================================================  */

function ground_woocommerce_variation_price_format( $price, $product ) {

	// Get min/max regular and sale variation prices
	$min_var_reg_price = $product->get_variation_regular_price( 'min', true );
	$min_var_sale_price = $product->get_variation_sale_price( 'min', true );
	$max_var_reg_price = $product->get_variation_regular_price( 'max', true );
	$max_var_sale_price = $product->get_variation_sale_price( 'max', true );

	// New $price, unless all variations have exact same prices
	if ( ! ( $min_var_reg_price == $max_var_reg_price && $min_var_sale_price == $max_var_sale_price ) ) {
		if ( $min_var_sale_price < $min_var_reg_price ) {
			$price = sprintf( __( '<div class="ground__price-range">Da <del>%1$s</del><ins>%2$s</ins></div>', 'woocommerce' ), wc_price( $min_var_reg_price ), wc_price( $min_var_sale_price ) );
		} else {
			if ( is_post_type_archive( 'product' ) || is_product_category() || is_product_tag()) {
				$price = sprintf( __( '<div class="ground__price-range">%1$s</div>', 'woocommerce' ), wc_price( $min_var_reg_price ) );
			} else {
				$price = sprintf( __( '<div class="ground__price-range">A partire da %1$s</div>', 'woocommerce' ), wc_price( $min_var_reg_price ) );
			}
		}
	}

	// Return $price
	return $price;
}

add_filter( 'woocommerce_variable_price_html', 'ground_woocommerce_variation_price_format', 10, 2 );


/*  ==========================================================================
	22 - Remove woocommerce_catalog_ordering
	==========================================================================  */

// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


/*  ==========================================================================
	23 - Change number of products that are displayed per page (shop page)
	==========================================================================  */

function ground_woocommerce_product_per_page( $cols ) {
	return 30;
}

// add_filter( 'loop_shop_per_page', 'ground_woocommerce_product_per_page', 20 );


/*  ==========================================================================
	24 - Change Text catalog_orderby Button
	==========================================================================  */

function ground_woocommerce_customize_product_sorting($sorting_options){
	$sorting_options = array(
		'menu_order' => __( 'Default sorting', 'woocommerce' ),
		'popularity' => __( 'Sort by popularity', 'woocommerce' ),
		'rating' => __( 'Sort by average rating', 'woocommerce' ),
		'date' => __( 'Sort by newness', 'woocommerce' ),
		'price' => __( 'Sort by price: low to high', 'woocommerce' ),
		'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
	);

	return $sorting_options;
}

//add_filter('woocommerce_catalog_orderby', 'ground_woocommerce_customize_product_sorting');

/*  ==========================================================================
	25 - Cash on delivery fee
	==========================================================================  */

// Add a custom fee based on cash on delivery
function ground_woocommerce_cash_on_delivery_fee ( $cart ) {
	if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
		return;
	}

	if ( 'cod' === WC()->session->get('chosen_payment_method') ) {
		$fee = 5;
		$cart->add_fee( __('Cash on delivery charges', 'ground'), $fee, false );
	}
}

// add_action( 'woocommerce_cart_calculate_fees', 'ground_woocommerce_cash_on_delivery_fee', 10, 1 );

// Update checkout on method payment change
function ground_woocommerce_cash_on_delivery_fee_js_update() {
	if ( is_checkout() && ! is_wc_endpoint_url() ) { ?>
		<script type="text/javascript">
		jQuery( function($){
			$('form.checkout').on('change', 'input[name="payment_method"]', function(){
				$(document.body).trigger('update_checkout');
			});
		});
		</script>
	<?php }
}

// add_action( 'wp_footer', 'ground_woocommerce_cash_on_delivery_fee_js_update' );




/*  ==========================================================================
	26 - Show Product Image on Checkout
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