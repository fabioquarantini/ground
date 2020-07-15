<?php
/**
 * Functions and definitions
 *
 * @package Ground
 */

/**
 * Require files
 */
require_once 'inc/constants.php';
require_once 'inc/cpt-catalog.php';
require_once 'inc/extend.php';
require_once 'inc/gutenberg.php';
require_once 'inc/head-output.php';
require_once 'inc/navigations.php';
require_once 'inc/shortcode.php';
if ( class_exists( 'WooCommerce' ) ) {
	require_once 'inc/woocommerce.php';
}
