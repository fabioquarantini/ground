<?php

/*  ==========================================================================

	1 - Flat single custom post type slug

	==========================================================================  */


/*  ==========================================================================
	1 - Flat single custom post type slug (Based on https://kellenmace.com/remove-custom-post-type-slug-from-permalinks/)
	==========================================================================  */

function ground_single_custom_flat_slug( $post_link, $post ) {

	$args = array(
		'public'   => true,
		'_builtin' => false
	);
	$post_types = get_post_types( $args, 'objects' );

	if ( $post->post_status == 'publish' ) {

		foreach ( $post_types as $post_type ) {

			if (isset($post_type->rewrite['flat_base_slug'])) {

				if ( $post->post_type == $post_type->name && $post_type->rewrite['flat_base_slug'] === true) {

					$post_link = str_replace( '/'. $post_type->rewrite['slug'] .'/', '/', $post_link );

				}
			}

		}

	}

	return $post_link;

}

add_filter( 'post_type_link', 'ground_single_custom_flat_slug', 10, 3 );


function ground_single_custom_flat_slug_query( $query ) {

	if ( ! $query->is_main_query() ) {
		return;
	}

	if ( count( $query->query ) != 2 || ! isset( $query->query['page'] ) ) {
		return;
	}

	if ( ! empty( $query->query['name'] ) ) {

		$args = array(
			'public'   => true,
			'_builtin' => false
		);
		$post_types = get_post_types( $args, 'objects' );
		$query_post_type_data = array( 'post', 'page');

		foreach ( $post_types as $post_type ) {
			array_push($query_post_type_data, $post_type->name);
		}

		$query->set( 'post_type', $query_post_type_data );

	}

}

add_action( 'pre_get_posts', 'ground_single_custom_flat_slug_query' );
