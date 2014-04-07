<?php

/*  ==========================================================================

	1 - Register and enqueue css
	2 - Register and enqueue js
	3 - Hide WordPress Version Number from scripts and css
	4 - Clean up head output
	5 - Hide WordPress Version Number from RSS feed
	6 - Remove inline styles from text editor gallery

	==========================================================================  */


/*  ==========================================================================
	1 - Register and enqueue css
	==========================================================================  */

function ground_enqueue_styles() {

	// $handle, $src, $deps, $ver, $media
	wp_register_style( 'main-style', MY_THEME_FOLDER . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'main-style' );

}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_styles', 9 );


/*  ==========================================================================
	2 - Register and enqueue js
	==========================================================================  */

function ground_enqueue_scripts() {

	// $handle, $src, $deps, $ver, $in_footer
	wp_register_script( 'modernizr', MY_THEME_FOLDER . '/js/vendor/modernizr-2.7.1.min.js', array(), '2.7.1', false );
	wp_enqueue_script( 'modernizr' );

	wp_deregister_script( 'jquery' );
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", array(), null, true );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'plugins', MY_THEME_FOLDER . '/js/plugins.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'plugins' );

	wp_register_script( 'main', MY_THEME_FOLDER . '/js/main.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'main' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}

}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_scripts', 10 );


/*  ==========================================================================
	3 - Hide WordPress Version Number from scripts and css
	==========================================================================  */

function ground_remove_wp_ver_css_js( $src ) {

	if ( strpos( $src, 'ver=' ) ) {

		$src = remove_query_arg( 'ver', $src );

	}

	return $src;

}

// add_filter( 'style_loader_src', 'ground_remove_wp_ver_css_js', 9999 );
// add_filter( 'script_loader_src', 'ground_remove_wp_ver_css_js', 9999 );


/*  ==========================================================================
	4 - Clean up head output
	==========================================================================  */

function ground_head_output() {

	// This feature enables post and comment RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );

	// Links for Adjacent Posts Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'feed_links', 2 );

	// Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links_extra', 3 );

	// Index link
	remove_action( 'wp_head', 'index_rel_link' );

	// Previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

	// Rel canonical
	remove_action( 'wp_head', 'rel_canonical' );

	// EditURI link Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'rsd_link' );

	// Start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

	// Display the link to 	the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Remove wp version
	remove_action( 'wp_head', 'wp_generator' );

	// Return a shortlink for a post, page, attachment, or blog
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

}

// add_action( 'init', 'ground_head_output' );


/*  ==========================================================================
	5 - Hide WordPress Version Number from RSS feed
	==========================================================================  */

function ground_remove_rss_version() {

	return '';

}

// add_filter( 'the_generator', 'ground_remove_rss_version' );


/*  ==========================================================================
	6 - Remove inline styles from text editor gallery
	==========================================================================  */

add_filter( 'use_default_gallery_style', '__return_false' );


?>