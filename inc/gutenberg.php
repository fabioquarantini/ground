<?php
/**
 * Gutenberg configuration
 *
 * @package Ground
 */

/**
 * Register block categories
 *
 * @param array $default_categories Array of block categories.
 * @return array An associative array of registered block data.
 */
function ground_register_block_categories( $default_categories ) {

	$category_slugs = wp_list_pluck( $default_categories, 'slug' );

	return in_array( 'ground', $category_slugs, true ) ? $default_categories : array_merge(
		$default_categories,
		array(
			array(
				'slug'  => 'ground',
				'title' => __( 'Ground', 'ground-admin' ),
				'icon'  => null,
			),
		)
	);

}

add_filter( 'block_categories', 'ground_register_block_categories' );

/**
 * Register blocks with ACF
 *
 * @link https://developer.wordpress.org/resource/dashicons/
 */
function ground_register_acf_blocks() {

	if ( function_exists( 'acf_register_block' ) ) {

		acf_register_block(
			array(
				'name'            => 'text',
				'title'           => __( 'Text', 'ground-admin' ),
				'description'     => __( 'Insert text to make a visual statement.', 'ground-admin' ),
				'render_callback' => 'ground_acf_block_render',
				'category'        => 'ground',
				'icon'            => 'editor-justify',
				'keywords'        => array( 'text' ),
			)
		);

		acf_register_block(
			array(
				'name'            => 'image',
				'title'           => __( 'Image', 'ground-admin' ),
				'description'     => __( 'Insert an image to make a visual statement.', 'ground-admin' ),
				'render_callback' => 'ground_acf_block_render',
				'category'        => 'ground',
				'icon'            => 'format-image',
				'keywords'        => array( 'image' ),
			)
		);

		acf_register_block(
			array(
				'name'            => 'text-image',
				'title'           => __( 'Text image', 'ground-admin' ),
				'description'     => __( 'Insert text and image to make a visual statement.', 'ground-admin' ),
				'render_callback' => 'ground_acf_block_render',
				'category'        => 'ground',
				'icon'            => 'align-left',
				'keywords'        => array( 'text', 'image' ),
			)
		);

		acf_register_block(
			array(
				'name'            => 'slider-gallery',
				'title'           => __( 'Slider gallery', 'ground-admin' ),
				'description'     => __( 'Display multiple images in a rich gallery.', 'ground-admin' ),
				'render_callback' => 'ground_acf_block_render',
				'category'        => 'ground',
				'icon'            => 'format-gallery',
				'keywords'        => array( 'slider', 'gallery' ),
			)
		);

		acf_register_block(
			array(
				'name'            => 'slider-primary',
				'title'           => __( 'Slider primary', 'ground-admin' ),
				'description'     => __( 'Display multiple images in a rich gallery.', 'ground-admin' ),
				'render_callback' => 'ground_acf_block_render',
				'category'        => 'ground',
				'icon'            => 'format-gallery',
				'keywords'        => array( 'slider', 'primary' ),
			)
		);

		acf_register_block(
			array(
				'name'            => 'carousel',
				'title'           => __( 'Carousel', 'ground-admin' ),
				'description'     => __( 'Display multiple images in a rich gallery.', 'ground-admin' ),
				'render_callback' => 'ground_acf_block_render',
				'category'        => 'ground',
				'icon'            => 'format-gallery',
				'keywords'        => array( 'carousel' ),
			)
		);

	}
}

add_action( 'acf/init', 'ground_register_acf_blocks' );

/**
 * Render ACF Gutemberg Blocks
 *
 * @param array $block The validated and registered block settings.
 */
function ground_acf_block_render( $block ) {

	// convert name ("acf/testimonial") into path friendly slug ("testimonial").
	$slug = str_replace( 'acf/', '', $block['name'] );

	// include a template part from within the "template-parts/block" folder.
	if ( file_exists( get_theme_file_path( "/partials/blocks/{$slug}.php" ) ) ) {
		include get_theme_file_path( "/partials/blocks/{$slug}.php" );
	}
}
