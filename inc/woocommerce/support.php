<?php

/*  == SUPPORT ==================================================================

        1 - Add WooCommerce support
        2 - Remove WooCommerce styles
        3 - WooCommerce remove default functions
        4 - WooCommerce body class
        5 - Change single gallery thumbnail size

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
	3 - WooCommerce remove default functions
	==========================================================================  */

    // Remove the result count from WooCommerce
    remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );

    // Remove the sorting dropdown from WooCommerce
    //remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );



/*  ==========================================================================
	4 - WooCommerce body class
	==========================================================================  */

    function ground_woocommerce_active_body_class( $classes ) {
        $classes[] = 'is-woocommerce-active';
        return $classes;
    }
    
    add_filter( 'body_class', 'ground_woocommerce_active_body_class' );
    


/*  ==========================================================================
	5 - Change single gallery thumbnail size
	==========================================================================  */

    add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
        return 'thumbnail';
    });

    add_filter( 'woocommerce_gallery_image_size', function( $size ) {
        return 'medium_large';
    });