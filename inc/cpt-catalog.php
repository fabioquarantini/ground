<?php
/**
 * Register catalog custom post type
 *
 * @package Ground
 */

/**
 * Register post type
 */
function ground_register_post_type_catalog() {

	$labels = array(
		'name'          => _x( 'Products', 'Post Type General Name', 'ground-admin' ),
		'singular_name' => _x( 'Product', 'Post Type Singular Name', 'ground-admin' ),
	);

	$rewrite = array(
		'slug'       => __( 'catalog', 'ground-admin' ),
		'with_front' => true,
	);

	$supports = array(
		'title',
		'editor',
		'excerpt',
		'thumbnail',
		'comments',
		'revisions',
		'page-attributes',
	);

	$args = array(
		'rewrite'             => $rewrite,
		'supports'            => $supports,
		'labels'              => $labels,
		'has_archive'         => false,
		'public'              => true,
		'show_in_rest'        => false,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-widgets-menus',
		'exclude_from_search' => false,
	);

	register_post_type( 'ground_catalog', $args );

}

add_action( 'init', 'ground_register_post_type_catalog', 2 );

/**
 * Register taxonomy
 */
function ground_register_taxonomy_catalog() {

	$rewrite = array(
		'slug'         => __( 'catalog-category', 'ground-admin' ),
		'hierarchical' => true,
		'with_front'   => true,
	);

	$args = array(
		'hierarchical'      => true,
		'public'            => true,
		'show_admin_column' => true,
		'rewrite'           => $rewrite,
	);

	register_taxonomy( 'ground_catalog_taxonomy', 'ground_catalog', $args );

}

add_action( 'init', 'ground_register_taxonomy_catalog', 1 );
