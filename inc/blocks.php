<?php

// GUTEMBERG GROUND BLOCKS
add_action('acf/init', 'ground_acf_init');
function ground_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {

		acf_register_block(array(
			'name'				=> 'text',
			'title'				=> __('ground: TEXT'),
			'description'		=> __('TEXT block.'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
			'keywords'			=> array( 'text' ),
        ));

        acf_register_block(array(
			'name'				=> 'image',
			'title'				=> __('ground: IMAGE'),
			'description'		=> __('IMAGE block.'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
			'keywords'			=> array( 'image' ),
        ));

        acf_register_block(array(
			'name'				=> 'slider-gallery',
			'title'				=> __('ground: SLIDER GALLERY'),
			'description'		=> __('SLIDER GALLERY block.'),
			'render_callback'	=> 'ground_block_render',
			'category'			=> 'formatting',
            'icon'				=> 'admin-comments',
			'keywords'			=> array( 'slider-gallery' ),
        ));
        			
	}
}