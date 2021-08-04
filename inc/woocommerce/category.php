<?php

/**
 * Category
 *
 * @package Ground
 */

/**
 * Display category image on category archive
 */
function ground_woocommerce_category_image()
{
	if (is_product_category()) {
		global $wp_query;
		$cat          = $wp_query->get_queried_object();
		$thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
		$image        = wp_get_attachment_url($thumbnail_id);
		if ($image) {
			echo '<img src="' . $image . '" alt="' . $cat->name . '" />';
		}
	}
}

add_action('woocommerce_before_main_content', 'ground_woocommerce_category_image', 30);




/**
 * Add Category Description
 */
function ground_add_category_description($category)
{
	$cat_id = $category->term_id;
	$prod_term = get_term($cat_id, 'product_cat');
	$description = $prod_term->description; ?>

	<?php if ($description) : ?>
		<p class="woocommerce-loop-category__description"><?php echo $description; ?></p>
<?php endif;
}

add_action('woocommerce_after_subcategory_title', 'ground_add_category_description', 12);
