<?php

/*  ==========================================================================

	1 - Register slider post type
	2 - Register slider taxonomy
	3 - Slide preview in management

	==========================================================================  */


/*  ==========================================================================
	1 - Register slider post type
	==========================================================================  */

function ground_register_slider_post_type() {

	$labels = array(
		'name'					=> _x( 'Slides', 'Post Type General Name', 'groundtheme' ),
		'singular_name'			=> _x( 'Slide', 'Post Type Singular Name', 'groundtheme' ),
		'menu_name'				=> __( 'Slides', 'groundtheme' ),
		'parent_item_colon'		=> __( 'Parent slide:', 'groundtheme' ),
		'all_items'				=> __( 'All slides', 'groundtheme' ),
		'view_item'				=> __( 'View slide', 'groundtheme' ),
		'add_new_item'			=> __( 'Add new slide', 'groundtheme' ),
		'add_new'				=> __( 'New slide', 'groundtheme' ),
		'edit_item'				=> __( 'Edit slide', 'groundtheme' ),
		'update_item'			=> __( 'Update slide', 'groundtheme' ),
		'search_items'			=> __( 'Search slides', 'groundtheme' ),
		'not_found'				=> __( 'No slide found', 'groundtheme' ),
		'not_found_in_trash'	=> __( 'No slide found in Trash', 'groundtheme' )
	);

	$rewrite = array(
		'slug'					=> __( 'slider', 'groundtheme' ),
		'with_front'			=> false,
		'pages'					=> false,
		'feeds'					=> false
	);

	$args = array(
		'label'					=> __( 'slide', 'groundtheme' ),
		'description'			=> __( 'slide', 'groundtheme' ),
		'labels'				=> $labels,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		//'taxonomies'			=> array( 'category', 'post_tag' ),
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> false,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> 'dashicons-images-alt2',
		'can_export'			=> true,
		'has_archive'			=> false,
		'exclude_from_search'	=> true,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite,
		'capability_type'		=> 'post'
	);

	register_post_type( 'ground_slider', $args );

}

add_action( 'init', 'ground_register_slider_post_type', 0 );


/*  ==========================================================================
	2 - Register slider taxonomy
	==========================================================================  */

function ground_register_slider_taxonomy()  {

	$labels = array(
		'name'							=> _x( 'Categories', 'Taxonomy General Name', 'groundtheme' ),
		'singular_name'					=> _x( 'Category', 'Taxonomy Singular Name', 'groundtheme' ),
		'menu_name'						=> __( 'Category', 'groundtheme' ),
		'all_items'						=> __( 'All Categories', 'groundtheme' ),
		'parent_item'					=> __( 'Parent category', 'groundtheme' ),
		'parent_item_colon'				=> __( 'Parent category:', 'groundtheme' ),
		'new_item_name'					=> __( 'New category name', 'groundtheme' ),
		'add_new_item'					=> __( 'Add new category', 'groundtheme' ),
		'edit_item'						=> __( 'Edit category', 'groundtheme' ),
		'update_item'					=> __( 'Update category', 'groundtheme' ),
		'separate_items_with_commas'	=> __( 'Separate Categories with commas', 'groundtheme' ),
		'search_items'					=> __( 'Search Categories', 'groundtheme' ),
		'add_or_remove_items'			=> __( 'Add or remove Categories', 'groundtheme' ),
		'choose_from_most_used'			=> __( 'Choose from the most used Categories', 'groundtheme' )
	);

	$rewrite = array(
		'slug'							=> __( 'slider-category', 'groundtheme' ),
		'with_front'					=> true,
		'hierarchical'					=> true
	);

	$args = array(
		'labels'						=> $labels,
		'hierarchical'					=> true,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> false,
		'show_tagcloud'					=> false,
		'rewrite'						=> $rewrite
	);

	register_taxonomy( 'ground_slider_taxonomy', 'ground_slider', $args );

}

add_action( 'init', 'ground_register_slider_taxonomy', 0 );


/*  ==========================================================================
	3 - Slide preview in management
	==========================================================================  */

function ground_slider_columns( $columns ) {

	//unset($columns['date']);  // Hide date column
	$column_thumbnail = array( 'thumbnail' => __('Preview', 'groundtheme') );
	$column_caption = array( 'caption' => __('Caption', 'groundtheme') );
	$columns = array_slice( $columns, 0, 1, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	$columns = array_slice( $columns, 0, 3, true ) + $column_caption + array_slice( $columns, 3, NULL, true );
	return $columns;

}

add_filter( 'manage_ground_slider_posts_columns', 'ground_slider_columns', 10, 1 );


function ground_slider_columns_content( $column ) {

	global $post;
	switch ( $column ) {
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID );
			break;

		case 'caption':
			echo the_excerpt();
			break;
	}

}

add_action( 'manage_ground_slider_posts_custom_column', 'ground_slider_columns_content', 10, 1 );

?>