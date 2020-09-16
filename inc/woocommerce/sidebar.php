<?php

/*  == SIDEBAR ==================================================================

        1 - Disable WooCommerce sidebar
        2 - WooCommerce Register Sidebar

    ==========================================================================  */


/*  ==========================================================================
	1 - Disable WooCommerce sidebar
	==========================================================================  */

    function ground_disable_woocommerce_sidebar() {
        remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
    
    add_action('init', 'ground_disable_woocommerce_sidebar');
    

    
/*  ==========================================================================
	2 - WooCommerce Register Sidebar
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