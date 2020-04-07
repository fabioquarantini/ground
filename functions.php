<?php

/*  ==========================================================================
	Constants
	==========================================================================  */

define('SITE_URL', site_url() ); // http://www.site.com
define('TEMPLATE_URL', get_template_directory_uri() ); // http://www.site.com/wp-content/themes/themename
define('TEMPLATE_PATH', get_template_directory() ); // /home/user/public_html/wp-content/themes/themename


/*  ==========================================================================
	Functions
	==========================================================================  */

require_once('inc/extend.php');
require_once('inc/head-output.php');
require_once('inc/seo.php');
require_once('inc/walker.php');
require_once('inc/cpt-catalog.php');
require_once('inc/shortcode.php');
require_once('inc/gutenberg.php');

if (class_exists( 'WooCommerce' )) {
	require_once('inc/woocommerce.php');
}
