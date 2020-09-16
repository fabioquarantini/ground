<?php

/*  == PRICE ===========================================================

        1 - Remove Variable Product Price Range: "From: $$$min_price" (https://businessbloomer.com/disable-variable-product-price-range-woocommerce/)

    =============================================================================  */

    
/*  ==========================================================================
	1 - Remove Variable Product Price Range: "From: $$$min_price" (https://businessbloomer.com/disable-variable-product-price-range-woocommerce/)
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