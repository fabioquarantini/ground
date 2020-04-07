<?php

/*  ==========================================================================

	1 - Register block categories
	2 - Register ACF blocks

	==========================================================================  */


/*  ==========================================================================
	1 - Register block categories
	==========================================================================  */

function ground_register_block_categories($categories) {

	$category_slugs = wp_list_pluck($categories, 'slug');

	return in_array('ground', $category_slugs, true) ? $categories : array_merge(
		$categories,
		array(
			array(
				'slug'	=> 'ground',
				'title'	=> __('Ground', 'ground-admin'),
				'icon'	=> null,
			),
		)
	);

}

add_filter('block_categories', 'ground_register_block_categories');


/*  ==========================================================================
	2 - Register ACF blocks
	==========================================================================  */

// Icons list: https://developer.wordpress.org/resource/dashicons/

function ground_register_acf_blocks() {

	if( function_exists('acf_register_block') ) {

		acf_register_block(array(
			'name'				=> 'text',
			'title'				=> __('Text', 'ground-admin'),
			'description'		=> __('Insert text to make a visual statement.', 'ground-admin'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'ground',
			'icon'				=> 'editor-justify',
			'keywords'			=> array('text'),
		));

		acf_register_block(array(
			'name'				=> 'image',
			'title'				=> __('Image', 'ground-admin'),
			'description'		=> __('Insert an image to make a visual statement.', 'ground-admin'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'ground',
			'icon'				=> 'format-image',
			'keywords'			=> array('image'),
		));

		acf_register_block(array(
			'name'				=> 'text-image',
			'title'				=> __('Text image', 'ground-admin'),
			'description'		=> __('Insert text and image to make a visual statement.', 'ground-admin'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'ground',
			'icon'				=> 'align-left',
			'keywords'			=> array('text-image'),
		));

		acf_register_block(array(
			'name'				=> 'slider-gallery',
			'title'				=> __('Slider gallery', 'ground-admin'),
			'description'		=> __('Display multiple images in a rich gallery.', 'ground-admin'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'ground',
			'icon'				=> 'format-gallery',
			'keywords'			=> array('slider-gallery'),
		));

		acf_register_block(array(
			'name'				=> 'slider-primary',
			'title'				=> __('Slider primary', 'ground-admin'),
			'description'		=> __('Display multiple images in a rich gallery.', 'ground-admin'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'ground',
			'icon'				=> 'format-gallery',
			'keywords'			=> array('slider-primary'),
		));

		acf_register_block(array(
			'name'				=> 'carousel',
			'title'				=> __('Carousel', 'ground-admin'),
			'description'		=> __('Display multiple images in a rich gallery.', 'ground-admin'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'ground',
			'icon'				=> 'format-gallery',
			'keywords'			=> array('carousel'),
		));

	}
}

add_action('acf/init', 'ground_register_acf_blocks');