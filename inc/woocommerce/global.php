<?php

/**
 * Global
 *
 * @package Ground
 */

/**
 * Remove WooCommerce styles
 */
function ground_dequeue_woocommerce_styles($enqueue_styles)
{
	unset($enqueue_styles['woocommerce-general']); // Remove the gloss.
	unset($enqueue_styles['woocommerce-layout']); // Remove the gloss.
	unset($enqueue_styles['woocommerce-smallscreen']); // Remove the smallscreen optimisation.
	return $enqueue_styles;
}

add_filter('woocommerce_enqueue_styles', 'ground_dequeue_woocommerce_styles');

/**
 * Add WooCommerce body class
 *
 * @param string|string[] $classes Space-separated string or array of class names to add to the class list.
 */
function ground_woocommerce_active_body_class($classes)
{
	$classes[] = 'is-woocommerce-active';
	return $classes;
}

add_filter('body_class', 'ground_woocommerce_active_body_class');


/**
 * Unhook the WooCommerce wrappers
 * Then hook in your own functions to display the wrappers your theme requires
 */

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'ground_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'ground_wrapper_end', 10);

function ground_wrapper_start()
{
	echo '<div class="container">';
}

function ground_wrapper_end()
{
	echo '</div>';
}
