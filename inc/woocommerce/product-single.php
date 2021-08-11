<?php
/**
 * Product single
 *
 * @package Ground
 */

function ground_woocommerce_add_gallery_support() {
	// add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	// add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'ground_woocommerce_add_gallery_support' );


/**
 * Change gallery image size
 */
add_filter(
	'woocommerce_gallery_image_size',
	function( $size ) {
		return 'medium_large';
	}
);

/**
 *  Change gallery thumbnail size
 */
add_filter(
	'woocommerce_gallery_thumbnail_size',
	function( $size ) {
		return 'thumbnail';
	}
);

/**
 * Add brand in product single
 */
function ground_woocommerce_add_brand_single_product() {
	global $post;
	echo '<h2 class="woocommerce-product-details__brand">' . get_the_term_list( $post->ID, 'pa_brand', '', ', ' ) . '</h2>';
}

// add_action('woocommerce_single_product_summary', 'ground_woocommerce_add_brand_single_product', 6);

/**
 * Remove single product tabs
 */
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );




/**
 * Reordering woocommerce_template_single_meta
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 5 );



/**
 * Reordering woocommerce_template_single_excerpt
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 6 );





/**
 * Plus Minus Quantity Buttons @ WooCommerce - 1 Add Plus
 */
function ground_display_quantity_plus() { ?>
	<button type="button" class="plus"><?php ground_icon( 'math-plus' ); ?></button>
	<?php
}
add_action( 'woocommerce_after_quantity_input_field', 'ground_display_quantity_plus' );

/**
 * Plus Minus Quantity Buttons @ WooCommerce - 2 Add Minus
 */
function ground_display_quantity_minus() {
	?>
	<button type="button" class="minus"><?php ground_icon( 'math-minus' ); ?></button>
	<?php
}
add_action( 'woocommerce_before_quantity_input_field', 'ground_display_quantity_minus' );

/**
 * Plus Minus Quantity Buttons @ WooCommerce - 3 Trigger update quantity script
 */
function ground_add_cart_quantity_plus_minus() {

	if ( ! is_product() && ! is_cart() ) {
		return;
	}

	wc_enqueue_js(
		"$('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
         	var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         	var val = parseFloat(qty.val());
         	var max = parseFloat(qty.attr( 'max' ));
         	var min = parseFloat(qty.attr( 'min' ));
         	var step = parseFloat(qty.attr( 'step' ));
 
         	if ( $( this ).is( '.plus' ) ) {
            	if ( max && ( max <= val ) ) {
               		qty.val( max );
            	} else {
               		qty.val( val + step );
            	}
         	} else {
            	if ( min && ( min >= val ) ) {
               		qty.val( min );
            	} else if ( val > 1 ) {
               		qty.val( val - step );
            	}
         	}
      	});"
	);
}
add_action( 'wp_footer', 'ground_add_cart_quantity_plus_minus' );
