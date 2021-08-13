<?php

/**
 * Products loop
 *
 * @package Ground
 */

/**
 *  Remove add to cart button in product loop
 */

if ( GROUND_PRODUCT_ADD_TO_CART == '1' ) {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}

/**
 * Add term attribute in product loop
 */
function ground_woocommerce_add_product_loop_term() {
	global $product;
	$product_id    = $product->get_id();
	$product_terms = wc_get_product_terms(
		$product_id,
		'product_cat',
		array( 'fields' => 'all' )
	); // For attribute use "pa_nameofattribute.

	if ( count( $product_terms ) ) {
		echo '<div class="product__terms">';
		foreach ( $product_terms as $term ) {
			$term_name = "$term->name";
			if ( next( $product_terms ) == true ) {
				$term_name .= ',';
			}
			echo $term_name;
		}
		echo '</div>';
	}
}

// add_action( 'woocommerce_after_shop_loop_item_title', 'ground_woocommerce_add_product_loop_term', 9 );

/**
 * Remove, Rename, Reorder or Add Custom Sorting Options
 *
 * @param [type] $options
 * @return void
 */
function ground_woocommerce_customize_product_sorting( $options ) {
	$options = array(
		'menu_order' => __( 'Default sorting', 'woocommerce' ),
		'popularity' => __( 'Sort by popularity', 'woocommerce' ),
		'rating'     => __( 'Sort by average rating', 'woocommerce' ),
		'date'       => __( 'Sort by newness', 'woocommerce' ),
		'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
		'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
	);

	// unset( $options[ 'popularity' ] );
	// unset( $options[ 'menu_order' ] );
	// unset( $options[ 'rating' ] );
	// unset( $options[ 'date' ] );
	// unset( $options[ 'price' ] );
	// unset( $options[ 'price-desc' ] );

	return $options;
}

// add_filter('woocommerce_catalog_orderby', 'ground_woocommerce_customize_product_sorting');

/**
 * Remove product sorting dropdown
 */
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );

/**
 * Remove result count
 */
// remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );


/**
 * WooCommerce, Add Short Description to Products on Shop Page
 */
function ground_add_short_description_to_product_loop() {
	global $product;
	if ( $product->get_short_description() ) : ?>
		<div class="woocommerce-loop-product__description">
			<?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
		</div>
		<?php
endif;
}
add_action( 'woocommerce_after_shop_loop_item_title', 'ground_add_short_description_to_product_loop', 2 );


/**
 * WooCommerce, Remove woocommerce_catalog_ordering
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


/**
 * WooCommerce, Refactoring filters_buttons + WC_Widget_Layered_Nav_Filters
 */
function ground_archive_filters_buttons() {
	?>

	<div class="sticky top-0 bg-white border-b border-gray-200 z-30 transform -translate-x-2/4 w-screen ml-1/2 lg:relative lg:ml-auto lg:translate-x-0 lg:w-auto lg:border-0">
		<div class="container px-6 lg:px-0">
			<div class="flex flex-wrap pt-3 lg:pt-0">
				<div class="w-1/2 lg:w-2/3 pb-3 lg:pb-0 pr-3">	
					<button class="button button--small button--bordered button--full-width block lg:hidden js-toggle" data-toggle-target=".sidebar" data-toggle-class-name="is-sidebar-open">
						<?php ground_icon( 'options', 'button__icon' ); ?> <?php _e( 'Filters', 'ground' ); ?>
					</button>
				</div>
				<div class="w-1/2 lg:w-1/3 pl-3">	
					<?php $result = woocommerce_catalog_ordering(); ?>
				</div>
				<div class="w-full col-span-full lg:order-first">
					<?php the_widget( 'WC_Widget_Layered_Nav_Filters' ); ?>
				</div>
			</div>
		</div>
	</div>

	<?php
}

add_action( 'woocommerce_before_shop_loop', 'ground_archive_filters_buttons', 10 );





/**
 * WooCommerce, Add sidebar woocommerce advanced
 */
function ground_add_sidebar_woocommerce_advanced() {
	?>

	<div class="button js-toggle" data-toggle-target="html" data-toggle-class-name="is-overlay-panel-open">Open sidebar</div>

	<!-- overlay-panel--from-left -->
	<div class="overlay-panel">
		<div class="overlay-panel__mask js-toggle" data-toggle-target="html" data-toggle-class-name="is-overlay-panel-open"></div>
		<div class="overlay-panel__body">
			<div class="overlay-panel__close js-toggle" data-toggle-target="html" data-toggle-class-name="is-overlay-panel-open"><?php ground_icon( 'close' ); ?></div>
			<div class="overlay-panel__content">
				<h1>Lorem Isum</h1>
				<p class="text-4xl">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eleifend eget odio aliquam varius. Curabitur ut porta ligula, ac placerat odio. Vestibulum facilisis ligula a purus imperdiet rutrum. Curabitur non diam tristique sem pharetra tincidunt eu a augue. Duis dictum nulla in ante consequat, sed maximus libero sodales. Cras dapibus nunc id sagittis rhoncus. Duis volutpat est justo, vel ultrices dui varius eu. Nullam gravida vehicula blandit. Sed varius felis id tortor tincidunt volutpat. Nam interdum at metus sed hendrerit. Praesent pretium vitae tellus eget varius. Integer consequat tristique nulla, sed ultricies tortor bibendum vel. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed sed tincidunt justo. Morbi vel purus ut purus pulvinar hendrerit euismod at est.
					Nunc in risus vel massa convallis sodales et quis diam. Nullam finibus dui ut augue sollicitudin malesuada. Maecenas aliquam, libero ut vestibulum tempor, lacus erat faucibus metus, ut egestas sapien lorem nec ante. Nunc cursus rutrum libero et cursus. Etiam felis ligula, iaculis nec dictum at, semper a ipsum. Donec dolor velit, finibus ut laoreet eu, laoreet sed sem. Donec commodo est sit amet gravida molestie. Nam tortor nulla, commodo a ornare eu, aliquam sit amet dolor. Donec non libero in lorem aliquam iaculis eu ac augue. Praesent dictum quam et nibh dictum rhoncus. Morbi cursus lacus nec euismod laoreet. Donec in dui a elit varius tincidunt vitae quis lacus.</p>
			</div>
		</div>
	</div>

	<?php
}

add_action( 'woocommerce_sidebar', 'ground_add_sidebar_woocommerce_advanced', 10 );
