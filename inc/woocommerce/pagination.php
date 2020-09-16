<?php

/*  == PAGINATION ===========================================================

        1 - WooCommerce custom pagination
        2 - Change number of products that are displayed per page (shop page)

    =============================================================================  */


/*  ==========================================================================
	1 - WooCommerce custom pagination
	==========================================================================  */

    function ground_woocommerce_pagination() {
        get_template_part( 'partials/pagination' );
    }
    
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
    add_action( 'woocommerce_after_shop_loop', 'ground_woocommerce_pagination', 10);



/*  ==========================================================================
	2 - Change number of products that are displayed per page (shop page)
	==========================================================================  */

    function ground_woocommerce_product_per_page( $cols ) {
        return 30;
    }

    // add_filter( 'loop_shop_per_page', 'ground_woocommerce_product_per_page', 20 );