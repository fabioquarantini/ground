<?php

/*  ==========================================================================

	1 - Register and activate css
	2 - Register and activate js
	3 - Remove scripts and css version
	4 - Clean up head
	5 - Remove RSS Wp version
	6 - Remove recent comments widget inline style
	7 - Remove gallery inline css
	8 - Clean external plugin output

	==========================================================================  */


/*  ==========================================================================
	1 - Register and activate css
	==========================================================================  */

function ground_enqueue_styles() {

	if (!is_admin()){

		wp_register_style( 'screen-style', MY_THEME_FOLDER . '/style.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'screen-style' );

	}

}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_styles', 9);


/*  ==========================================================================
	2 - Register and activate js
	==========================================================================  */

/* Theme style */

function ground_enqueue_scripts() {

	if (!is_admin()){

		wp_register_script( 'modernizr', MY_THEME_FOLDER . '/js/vendor/modernizr-2.7.1.min.js', array(), '2.7.1', false );
		wp_enqueue_script( 'modernizr' );

		//wp_deregister_script('jquery');
		//wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null, true );
		wp_enqueue_script( 'jquery' );

		wp_register_script( 'plugins', MY_THEME_FOLDER . '/js/plugins.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'plugins' );

		wp_register_script( 'main', MY_THEME_FOLDER . '/js/main.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'main' );

		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {

			wp_enqueue_script( 'comment-reply' );

		}

	}

}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_scripts', 10 );


/* Admin style */

function ground_admin_enqueue_scripts() {

	wp_register_script( 'adminscript', MY_THEME_FOLDER . '/js/admin.js', array('jquery'), '1.0' );
	wp_enqueue_script( 'adminscript' );

	wp_localize_script( 'adminscript', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}

add_action( 'admin_enqueue_scripts', 'ground_admin_enqueue_scripts', 10 );


/*  ==========================================================================
	3 - Remove scripts and css version
	==========================================================================  */

function ground_remove_wp_ver_css_js( $src ) {

	if ( strpos( $src, 'ver=' ) ) {

		$src = remove_query_arg( 'ver', $src );

	}

	return $src;

}

//add_filter( 'style_loader_src', 'ground_remove_wp_ver_css_js', 9999 );
//add_filter( 'script_loader_src', 'ground_remove_wp_ver_css_js', 9999 );


/*  ==========================================================================
	4 - Clean up head
	==========================================================================  */

function ground_head_cleanup() {

	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 );			// Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); 	// Links for Adjacent Posts Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'feed_links', 2 ); 							// Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'feed_links_extra', 3 ); 						// Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'index_rel_link' );                         	// Index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            	// Previous link
	remove_action( 'wp_head', 'rel_canonical');								// Rel canonical
	remove_action( 'wp_head', 'rsd_link');                               	// EditURI link Display the link to the Really Simple Discovery service endpoint, EditURI link (<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://10.0.0.199/wordpress/xmlrpc.php?rsd" />)
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             	// Start link
	remove_action( 'wp_head', 'wlwmanifest_link' );                       	// Display the link to 	the Windows Live Writer manifest file. (<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://10.0.0.199/wordpress/wp-includes/wlwmanifest.xml" />)
	remove_action( 'wp_head', 'wp_generator' );                           	// Remove wp version (<meta name="generator" content="WordPress 3.3.2" />)
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

}

add_action('init', 'ground_head_cleanup');


/*  ==========================================================================
	5 - Remove RSS Wp version
	==========================================================================  */

function ground_remove_rss_version() {

	return '';

}

add_filter('the_generator', 'ground_remove_rss_version');


/*  ==========================================================================
	6 - Remove recent comments widget inline style
	==========================================================================  */

function ground_remove_wp_widget_recent_comments_style() {

	if ( has_filter('wp_head', 'wp_widget_recent_comments_style') ) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style' );
	}

}

add_filter( 'wp_head', 'ground_remove_wp_widget_recent_comments_style', 1 );


function ground_remove_recent_comments_style() {

	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}

}

add_action('wp_head', 'ground_remove_recent_comments_style', 1);


/*  ==========================================================================
	7 - Remove gallery inline css
	==========================================================================  */

add_filter( 'use_default_gallery_style', '__return_false' );


/*  ==========================================================================
	8 - Clean external plugin output
	==========================================================================  */

/* Contact form 7 */

function ground_remove_cf7_styles() {

	if (!is_admin()){
		wp_deregister_style('contact-form-7');
	}

}

// add_action('wp_print_styles','ground_remove_cf7_styles',100);


function ground_remove_cf7_javascript() {

	if (!is_admin()){
		wp_deregister_script('contact-form-7');
	}

}

// add_action('wp_print_scripts','ground_remove_cf7_javascript',100);


/* Woo commerce */

function ground_remove_woo_commerce_generator_tag() {

	remove_action('wp_head',array($GLOBALS['woocommerce'], 'generator'));

}

// add_action('get_header','ground_remove_woo_commerce_generator_tag');

?>