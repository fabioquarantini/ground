<?php

/*  ==========================================================================

	1 - Register catalog post type
	2 - Register catalog taxonomy
	3 - Register catalog taxonomy tag
	4 - Highlight nav item for custom post type archive and single

	==========================================================================  */


/*  ==========================================================================
	1 - Register catalog custom post type
	==========================================================================  */

function ground_register_catalog_post_type() {

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
		'not_found_in_trash'	=> __( 'No products found in Trash', 'groundtheme' )
	);

	$rewrite = array(
		'slug'					=> __( 'catalog', 'groundtheme' ),
		'with_front'			=> true,
		'pages'					=> true,
		'feeds'					=> true
	);

	$args = array(
		'label'					=> __( 'catalog', 'groundtheme' ),
		'description'			=> __( 'catalog', 'groundtheme' ),
		'labels'				=> $labels,
		'supports'				=> array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		//'taxonomies'			=> array( 'category', 'post_tag' ),
		'hierarchical'			=> true,
		'public'				=> true,
		'show_ui'				=> true,
		'show_in_menu'			=> true,
		'show_in_nav_menus'		=> true,
		'show_in_admin_bar'		=> true,
		'menu_position'			=> 5,
		'menu_icon'				=> 'dashicons-welcome-add-page',
		'can_export'			=> true,
		'has_archive'			=> true,
		'exclude_from_search'	=> false,
		'publicly_queryable'	=> true,
		'rewrite'				=> $rewrite,
		'capability_type'		=> 'post'
	);

	register_post_type( 'ground_catalog', $args );

}

add_action( 'init', 'ground_register_catalog_post_type', 0 );


/*  ==========================================================================
	2 - Register catalog category taxonomy
	==========================================================================  */

function ground_register_catalog_taxonomy()  {

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
		'choose_from_most_used'			=> __( 'Choose from the most used Categories', 'groundtheme' ),
	);

	$rewrite = array(
		'slug'							=> __( 'catalog-category', 'groundtheme' ),
		'with_front'					=> true,
		'hierarchical'					=> true
	);

	$args = array(
		'labels'						=> $labels,
		'hierarchical'					=> true,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> false,
		'rewrite'						=> $rewrite
	);

	register_taxonomy( 'ground_catalog_taxonomy', 'ground_catalog', $args );

}

add_action( 'init', 'ground_register_catalog_taxonomy', 0 );


/*  ==========================================================================
	3 - Register catalog tag taxonomy
	==========================================================================  */

function ground_register_taxonomy_tag()  {

	$labels = array(
		'name'							=> _x( 'Tags', 'Taxonomy General Name', 'groundtheme' ),
		'singular_name'					=> _x( 'Tag', 'Taxonomy Singular Name', 'groundtheme' ),
		'menu_name'						=> __( 'Tags', 'groundtheme' ),
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
		'choose_from_most_used'			=> __( 'Choose from the most used tags', 'groundtheme' )
	);

	$rewrite = array(
		'slug'							=> 'catalog-tag',
		'with_front'					=> true,
		'hierarchical'					=> true
	);

	$args = array(
		'labels'						=> $labels,
		'hierarchical'					=> true,
		'public'						=> true,
		'show_ui'						=> true,
		'show_admin_column'				=> true,
		'show_in_nav_menus'				=> true,
		'show_tagcloud'					=> true,
		'rewrite'						=> $rewrite
	);

	register_taxonomy( 'ground_catalog_taxonomy_tag', 'ground_catalog', $args );

}

// add_action( 'init', 'ground_register_taxonomy_tag', 0 );


/*  ==========================================================================
	4 - Highlight nav item for custom post type archive and single
	==========================================================================  */

// For this to work add class "{custom-post-type}-menu-item" to your menu item in management.
// The code below finds the menu item with the class "[CPT]-menu-item" and adds another “current_page_parent” class to it.
// Furthermore, it removes the “current_page_parent” from the blog menu item, if this is present.
// Via http://vayu.dk/highlighting-wp_nav_menu-ancestor-children-custom-post-types/

function ground_current_type_nav_class( $classes, $item ) {

	// Get post_type for this post
	//$post_type = get_query_var('post_type');
	$post_type = get_post_type();

	// Removes current_page_parent class from blog menu item
	if ( get_post_type() == $post_type ) {
		$classes = array_filter($classes, "get_current_value" );
	}

	// This adds a current_page_parent class to the parent menu item
	if( in_array( $post_type.'-menu-item', $classes ) ) {
		array_push($classes, 'current_page_parent');
	}

	return $classes;
}

function get_current_value( $element ) {

	return ( $element != "current_page_parent" );

}

add_filter('nav_menu_css_class', 'ground_current_type_nav_class', 10, 2);


?>