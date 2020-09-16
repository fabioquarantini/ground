<?php

/*  == BREADCRUMBS =========================================================

	1 - WooCommerce breadcrumbs markup
	2 - Remove Yoast "BreadcrumbList" schema data in WooCommerce pages	

=============================================================================  */



/*  ==========================================================================
	1 - WooCommerce breadcrumbs markup
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
	2 - Remove Yoast "BreadcrumbList" schema data in WooCommerce pages
	==========================================================================  */

    function ground_woocommerce_disable_yoast_schema_data($data){
        if (is_woocommerce() && isset($data["@type"]) && $data["@type"] === 'BreadcrumbList') {
            $data = array();
        }
        return $data;
    }
    
    add_filter('wpseo_json_ld_output', 'ground_woocommerce_disable_yoast_schema_data', 10, 1);