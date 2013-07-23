<?php

/*  ==========================================================================

	1 - Register catalog custom post type
	2 - Register catalog category taxonomy
	3 - Register catalog tag taxonomy

	==========================================================================  */


/*  ==========================================================================
	1 - Register catalog custom post type
	==========================================================================  */

function ground_custom_catalog() {
	
	$labels = array(
		'name'					=> _x( 'Products', 'Post Type General Name', 'groundtheme' ),
		'singular_name'			=> _x( 'Product', 'Post Type Singular Name', 'groundtheme' ),
		'menu_name'				=> __( 'Products', 'groundtheme' ),
		'parent_item_colon'		=> __( 'Parent Product:', 'groundtheme' ),
		'all_items'				=> __( 'All Products', 'groundtheme' ),
		'view_item'				=> __( 'View Product', 'groundtheme' ),
		'add_new_item'			=> __( 'Add New Product', 'groundtheme' ),
		'add_new'				=> __( 'New Product', 'groundtheme' ),
		'edit_item'				=> __( 'Edit Product', 'groundtheme' ),
		'update_item'			=> __( 'Update Product', 'groundtheme' ),
		'search_items'			=> __( 'Search products', 'groundtheme' ),
		'not_found'				=> __( 'No products found', 'groundtheme' ),
		'not_found_in_trash'	=> __( 'No products found in Trash', 'groundtheme' ),
	);

	$rewrite = array(
		'slug'					=> 'product',
		'with_front'			=> true,
		'pages'					=> true,
		'feeds'					=> true,
	);

	$args = array(
		'label'					=> __( 'custom_catalog', 'groundtheme' ),
		'description'			=> __( 'Products list', 'groundtheme' ),
		'labels'				=> $labels,
		'supports'				=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'			=> array( 'category', 'post_tag' ),
		'hierarchical'			=> true,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> MY_THEME_FOLDER . '/img/custom-post-icon.png',
		'can_export'			=> true,	
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite,
		'capability_type'		=> 'post',
	);

	register_post_type( 'custom_catalog', $args );

}

add_action( 'init', 'ground_custom_catalog', 0 );


/*  ==========================================================================
	2 - Register catalog category taxonomy
	==========================================================================  */

function ground_custom_catalog_category_taxonomy()  {
	
	$labels = array(
		'name'							=> _x( 'Genres', 'Taxonomy General Name', 'groundtheme' ),
		'singular_name'					=> _x( 'Genre', 'Taxonomy Singular Name', 'groundtheme' ),
		'menu_name'						=> __( 'Genre', 'groundtheme' ),
		'all_items'						=> __( 'All genres', 'groundtheme' ),
		'parent_item'					=> __( 'Parent genre', 'groundtheme' ),
		'parent_item_colon'				=> __( 'Parent genre:', 'groundtheme' ),
		'new_item_name'					=> __( 'New genre name', 'groundtheme' ),
		'add_new_item'					=> __( 'Add new genre', 'groundtheme' ),
		'edit_item'						=> __( 'Edit genre', 'groundtheme' ),
		'update_item'					=> __( 'Update genre', 'groundtheme' ),
		'separate_items_with_commas'	=> __( 'Separate genres with commas', 'groundtheme' ),
		'search_items'					=> __( 'Search genres', 'groundtheme' ),
		'add_or_remove_items'			=> __( 'Add or remove genres', 'groundtheme' ),
		'choose_from_most_used'			=> __( 'Choose from the most used genres', 'groundtheme' ),
	);

	$rewrite = array(
		//'slug'							=> 'genre',
		'with_front'					=> true,
		'hierarchical'					=> true,
	);

	$args = array(
		'labels'						=> $labels,
		'hierarchical'					=> true,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'rewrite'						=> $rewrite,
	);

	register_taxonomy( 'custom_catalog_category', 'custom_catalog', $args );

}

add_action( 'init', 'ground_custom_catalog_category_taxonomy', 0 );


/*  ==========================================================================
	3 - Register catalog tag taxonomy
	==========================================================================  */

function ground_custom_catalog_tag_taxonomy()  {
	
	$labels = array(
		'name'							=> _x( 'Tags', 'Taxonomy General Name', 'groundtheme' ),
		'singular_name'					=> _x( 'Tag', 'Taxonomy Singular Name', 'groundtheme' ),
		'menu_name'						=> __( 'Custom Tags', 'groundtheme' ),
		'all_items'						=> __( 'All tags', 'groundtheme' ),
		'parent_item'					=> __( 'Parent tag', 'groundtheme' ),
		'parent_item_colon'				=> __( 'Parent tag:', 'groundtheme' ),
		'new_item_name'					=> __( 'New tag name', 'groundtheme' ),
		'add_new_item'					=> __( 'Add new tag', 'groundtheme' ),
		'edit_item'						=> __( 'Edit Tag', 'groundtheme' ),
		'update_item'					=> __( 'Update Tag', 'groundtheme' ),
		'separate_items_with_commas'	=> __( 'Separate tags with commas', 'groundtheme' ),
		'search_items'					=> __( 'Search tags', 'groundtheme' ),
		'add_or_remove_items'			=> __( 'Add or remove tags', 'groundtheme' ),
		'choose_from_most_used'			=> __( 'Choose from the most used tags', 'groundtheme' ),
	);

	$rewrite = array(
		'slug'							=> 'tag-slug',
		'with_front'					=> true,
		'hierarchical'					=> true,
	);

	$args = array(
		'labels'						=> $labels,
		'hierarchical'					=> true,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'rewrite'						=> $rewrite,
	);

	register_taxonomy( 'custom_catalog_tag', 'custom_catalog', $args );

}

add_action( 'init', 'ground_custom_catalog_tag_taxonomy', 0 );


?>