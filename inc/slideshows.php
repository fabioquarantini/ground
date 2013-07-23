<?php

/*  ==========================================================================

	1 - Register slideshows custom post type
	2 - Register slideshows taxonomy
	3 - Slideshows admin custom columns

	==========================================================================  */


/*  ==========================================================================
	1 - Register slideshows custom post type
	==========================================================================  */

function ground_slideshows_post_type() {
	
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
		'search_items'			=> __( 'Search slide', 'groundtheme' ),
		'not_found'				=> __( 'No slide found', 'groundtheme' ),
		'not_found_in_trash'	=> __( 'No slide found in Trash', 'groundtheme' ),
	);

	$rewrite = array(
		'slug'					=> 'slideshow',
		'with_front'			=> true,
		'pages'					=> false,
		'feeds'					=> false,
	);

	$args = array(
		'label'					=> __( 'slideshows', 'groundtheme' ),
		'description'			=> __( 'Slideshows', 'groundtheme' ),
		'labels'				=> $labels,
		'supports'				=> array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'			=> false,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> false,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> MY_THEME_FOLDER . '/img/slides-icon.png',
		'can_export'			=> true,
		'has_archive'			=> false,
		'exclude_from_search'	=> true,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite,
		'capability_type'		=> 'page',
	);

	register_post_type( 'slideshows', $args );
	
}

add_action( 'init', 'ground_slideshows_post_type', 0 );


/*  ==========================================================================
	2 - Register slideshows taxonomy
	==========================================================================  */

function ground_slideshows_taxonomy()  {
	
	$labels = array(
		'name'							=> _x( 'Slide groups', 'Taxonomy General Name', 'groundtheme' ),
		'singular_name'					=> _x( 'Slide group', 'Taxonomy Singular Name', 'groundtheme' ),
		'menu_name'						=> __( 'Slide group', 'groundtheme' ),
		'all_items'						=> __( 'All slide groups', 'groundtheme' ),
		'parent_item'					=> __( 'Parent slide groups', 'groundtheme' ),
		'parent_item_colon'				=> __( 'Parent slide groups:', 'groundtheme' ),
		'new_item_name'					=> __( 'New slide groups', 'groundtheme' ),
		'add_new_item'					=> __( 'Add new slide groups', 'groundtheme' ),
		'edit_item'						=> __( 'Edit slide groups', 'groundtheme' ),
		'update_item'					=> __( 'Update slide groups', 'groundtheme' ),
		'separate_items_with_commas'	=> __( 'Separate slide groups with commas', 'groundtheme' ),
		'search_items'					=> __( 'Search slide groups', 'groundtheme' ),
		'add_or_remove_items'			=> __( 'Add or remove slide groups', 'groundtheme' ),
		'choose_from_most_used'			=> __( 'Choose from the most used slide groups', 'groundtheme' ),
	);

	$rewrite = array(
		'slug'							=> 'slide-groups',
		'with_front'					=> true,
		'hierarchical'					=> true,
	);

	$args = array(
		'labels'						=> $labels,
		'hierarchical'					=> true,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> false,
		'show_tagcloud'					=> false,
		'rewrite'						=> $rewrite,
	);

	register_taxonomy( 'slide-group', 'slideshows', $args );
	
}

add_action( 'init', 'ground_slideshows_taxonomy', 0 );


/*  ==========================================================================
	3 - Slideshows admin custom columns
	==========================================================================  */

function ground_slideshows_columns( $columns ) {
	
	//unset($columns['date']);  // Hide date column
	$column_thumbnail = array( 'thumbnail' => __('Preview', 'groundtheme') );
	$column_caption = array( 'caption' => __('Caption', 'groundtheme') );
	$columns = array_slice( $columns, 0, 1, true ) + $column_thumbnail + array_slice( $columns, 1, NULL, true );
	$columns = array_slice( $columns, 0, 3, true ) + $column_caption + array_slice( $columns, 3, NULL, true );
	return $columns;
	
}

add_filter( 'manage_slideshows_posts_columns', 'ground_slideshows_columns', 10, 1 );


function columns_content( $column ) {
	
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

add_action( 'manage_slideshows_posts_custom_column', 'columns_content', 10, 1 );


?>