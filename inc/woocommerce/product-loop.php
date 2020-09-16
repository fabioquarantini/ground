<?php

/*  == PRODUCT LOOP ===========================================================

        1 - Remove loop add to cart button
        2 - Add term attribute in product loop
        3 - Change Text catalog_orderby Button
        4 - Remove woocommerce_catalog_ordering

    =============================================================================  */


/*  ==========================================================================
	1 - Remove loop add to cart button
	==========================================================================  */

    // remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);



/*  ==========================================================================
	2 - Add term attribute in product loop
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
	3 - Change Text catalog_orderby Button
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
	4 - Remove woocommerce_catalog_ordering
	==========================================================================  */

    // remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );