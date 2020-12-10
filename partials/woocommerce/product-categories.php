<?php if ( class_exists( 'WooCommerce' ) ) {

	$categories_args = array(
		'taxonomy' => 'product_cat' // the taxonomy we want to get terms of
	);

	$product_categories = get_terms( $categories_args ); // get all terms of the product category taxonomy

	if ($product_categories) { // only start if there are some terms

		echo '<div class="product-cat">';

		// now we are looping over each term
		foreach ($product_categories as $product_category) {

			$term_id	= $product_category->term_id; // Term ID
			$term_name	= $product_category->name; // Term name
			$term_desc	= $product_category->description; // Term description
			$term_link	= get_term_link($product_category->slug, $product_category->taxonomy); // Term link

				echo '<div class="product-cat--'.$term_id.'">'; // for each term we will create one list element
				echo '<h4 class="product-cat__title"><a href="'.$term_link.'">'.$term_name.'</a></h4>'; // display term name with link
				echo '<p class="product-cat__description">'.$term_desc .'</p>'; // display term description

				// ... now we will get the products which have that term assigned...

				$products_args = array(
				'post_type'	=> 'product', // we want to get products
				'tax_query'	=> array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'term_id',
						'terms' => $term_id, // here we enter the ID of the current term *this is where the magic happens*
					),
				),
			);

			$products = new WP_Query( $products_args );

			if ( $products->have_posts() ) { // only start if we hace some products

				// START some normal woocommerce loop, as you already posted in your question

				woocommerce_product_loop_start();

				while ( $products->have_posts() ) : $products->the_post(); ?>

					<div class="gr-3 margin-bottom-1">
						<?php wc_get_template_part( 'content', 'product' ); ?>
					</div>

				<?php endwhile; // end of the loop.

				woocommerce_product_loop_end();

				// END the normal woocommerce loop

				// Restore original post data, maybe not needed here (in a plugin it might be necessary)
				wp_reset_postdata();

			} else { // if we have no products, show the default woocommerce no-product loop

				// no posts found
				wc_get_template( 'loop/no-products-found.php' );

			}//END if $products

			echo '</div>';//END here is the end of our product-cat-term_id list item

		}//END foreach $product_categories

		echo '</div>';//END of catalog list

	}//END if $product_categories

	}

?>