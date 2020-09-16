<?php

/*  == CATEGORY ============================================================

	1 - WooCommerce display category image on category archive

=============================================================================  */


/*  ==========================================================================
	1 - WooCommerce display category image on category archive
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