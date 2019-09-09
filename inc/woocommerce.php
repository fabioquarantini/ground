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
