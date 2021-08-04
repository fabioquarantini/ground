<?php

/**
 * Price
 *
 * @package Ground
 */

/**
 * Remove Variable Product Price Range: "From: $$$min_price" (https://businessbloomer.com/disable-variable-product-price-range-woocommerce/)
 *
 * @param string $wc_format_price_range The wc format price range.
 * @param unknown $product The instance.
 * @return $wc_format_price_range
 */
function ground_woocommerce_variation_price_format($wc_format_price_range, $product)
{

	$min_var_reg_price  = $product->get_variation_regular_price('min', true);
	$min_var_sale_price = $product->get_variation_sale_price('min', true);
	$max_var_reg_price  = $product->get_variation_regular_price('max', true);
	$max_var_sale_price = $product->get_variation_sale_price('max', true);

	// New $wc_format_price_range, unless all variations have exact same prices.
	if (!($min_var_reg_price === $max_var_reg_price && $min_var_sale_price === $max_var_sale_price)) {
		if ($min_var_sale_price < $min_var_reg_price) {
			$wc_format_price_range = sprintf(__('<div class="ground__price-range">' . __('from', 'ground') . '<del>%1$s</del><ins>%2$s</ins></div>', 'woocommerce'), wc_price($min_var_reg_price), wc_price($min_var_sale_price));
		} else {
			if (is_post_type_archive('product') || is_product_category() || is_product_tag()) {
				$wc_format_price_range = sprintf(__('<div class="ground__price-range">' . __('from', 'ground') . '%1$s</div>', 'woocommerce'), wc_price($min_var_reg_price));
			} else {
				$wc_format_price_range = sprintf(__('<div class="ground__price-range">' . __('Price starting from', 'ground') . ' %1$s</div>', 'woocommerce'), wc_price($min_var_reg_price));
			}
		}
	}

	return $wc_format_price_range;
}

add_filter('woocommerce_variable_price_html', 'ground_woocommerce_variation_price_format', 10, 2);
