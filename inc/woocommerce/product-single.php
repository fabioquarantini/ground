<?php

/*  == PRODUCT SINGLE ========================================================

        1 - Add brand in product single
        2 - Remove woocommerce_product_tabs in single-product

    ==========================================================================  */



/*  ==========================================================================
	1 - Add brand in product single
	==========================================================================  */

    function ground_woocommerce_add_brand_single_product() {
        global $post;
        echo '<h2 class="woocommerce-product-details__brand">' . get_the_term_list($post->ID, 'pa_brand', '', ', ') . '</h2>';
    }
    
    // add_action('woocommerce_single_product_summary', 'ground_woocommerce_add_brand_single_product', 6);
    


/*  ==========================================================================
	2 - Remove woocommerce_product_tabs in single-product
	==========================================================================  */

    // remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );