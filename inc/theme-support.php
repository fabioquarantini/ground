<?php

/*  ==========================================================================

	1 - Add theme support
	2 - Register Wp menu
	3 - Register sidebar for widgets
	4 - Thumbnails size
	5 - Localization
	6 - Activate shortcodes in widgets sidebar
	7 - Change JPEG Compression

	==========================================================================  */


/*  ==========================================================================
	1 - Add theme support
	==========================================================================  */

if ( ! isset( $content_width ) ) {												// Set content width value based on the theme's design
	
	if(get_option( 'maintenance_option' )) {
		$content_width = get_option( 'maintenance_option' );
	} else {
		$content_width = 600;
	}

}


function ground_theme_support() {
	
	if ( function_exists( 'add_theme_support' ) ) {
		
		global $wp_version;

		add_theme_support('post-thumbnails');									// Activate featured image. Only activate in post "add_theme_support( 'post-thumbnails', array( 'post', 'page', 'movie' ) );" 
		set_post_thumbnail_size( 150, 150, true);								// Set the default featured image dimensions
		
		add_theme_support( 'automatic-feed-links' );							// This feature enables post and comment RSS feed links to head

		$markup = array(
			'search-form',
			'comment-form',
			'comment-list',
		);
		add_theme_support( 'html5', $markup );									// Add theme support for Semantic Markup

		add_theme_support( 'menus' );											// Wp menu
		
		$formats = array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
		);
		add_theme_support( 'post-formats', $formats );   						// A Post Format is a piece of meta information that can be used by a theme to customize its presentation of a post

		$background_args = array(
			'default-color'				=> '',
			'default-image'				=> '',
			'wp-head-callback'			=> '_custom_background_cb',
			'admin-head-callback'		=> '',
			'admin-preview-callback'	=> '',
		);
		add_theme_support( 'custom-background', $background_args );				// Custom background color and image

		$header_args = array(
			'default-image'				=> '',
			'width'						=> 0,
			'height'					=> 0,
			'flex-width'				=> true,
			'flex-height'				=> true,
			'random-default'			=> false,
			'header-text'				=> false,
			'default-text-color'		=> '',
			'uploads'					=> true,
			'wp-head-callback'			=> '',
			'admin-head-callback'		=> '',
			'admin-preview-callback'	=> '',
		);
		add_theme_support( 'custom-header', $header_args );						// Custom header image

	}
}

add_action('after_setup_theme','ground_theme_support');


/*  ==========================================================================
	2 - Register Wp menu
	==========================================================================  */

/* Register nav */

function register_my_menus() {
	
	$locations = array(
		'main-nav'		=> __( 'Main nav', 'groundtheme' ),						// Main nav
		'secondary-nav'	=> __( 'Secondary nav', 'groundtheme' )					// Secondary nav
	);
	
	register_nav_menus( $locations );	
	
}

add_action('init', 'register_my_menus');


/* Main nav */ 

function ground_main_nav() {
	
	$args = array(
		'theme_location'	=> 'main-nav', 										// The location in the theme to be used--must be registered with register_nav_menu()
		'menu'				=> __('Main nav', 'groundtheme'),					// The menu that is desired; accepts (matching in order) id, slug, name 
		'container'			=> 'nav', 
		'container_class'	=> 'menu-container',
		'container_id'		=> 'main-navigation',
		'menu_class'		=> 'navigation', 
		'menu_id'			=> '',
		'echo'				=> true,
		'fallback_cb'		=> '',												// Default wp_page_menu
		'before'			=> '',
		'after'				=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',			// How many levels of the hierarchy are to be included where 0 means all
		'depth'				=> 0,
		'walker'			=> ''
	);
	
	wp_nav_menu( $args );
	
}


/* Secondary nav */

function ground_secondary_nav() {
	
	$args = array(
		'theme_location'	=> 'secondary-nav',
		'menu'				=> __('Secondary nav', 'groundtheme'),
		'container'			=> false, 
		'container_class'	=> 'menu-container',
		'container_id'		=> '',
		'menu_class'		=> 'navigation', 
		'menu_id'			=> '',
		'echo'				=> true,
		'fallback_cb'		=> '',
		'before'			=> '',
		'after'				=> '',
		'link_before'		=> '',
		'link_after'		=> '',
		'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'				=> 0,
		'walker'			=> ''
	);
	
	wp_nav_menu($args);
	
}


/*  ==========================================================================
	3 - Register sidebar for widgets
	==========================================================================  */

function ground_register_sidebars() {
	
	$args = array(
		'name'				=> __('Sidebar title 1', 'groundtheme'),
		'id'				=> 'sidebar-1',
		'description'		=> __('Sidebar description 1', 'groundtheme'),
		'before_widget'		=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h4 class="widgettitle">',
		'after_title'		=> '</h4>',
	);
	
	register_sidebar( $args );
	
	
	$args2 = array(
		'name'				=> __('Sidebar title 2', 'groundtheme'),
		'id'				=> 'sidebar-2',
		'description'		=> __('Sidebar description 2', 'groundtheme'),
		'class'				=> '',
		'before_widget'		=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'		=> '</div>',
		'before_title'		=> '<h4 class="widget-title">',
		'after_title'		=> '</h4>',
	);
	
	register_sidebar( $args2 );
	
}

add_action( 'widgets_init', 'ground_register_sidebars' );


/*  ==========================================================================
	4 - Thumbnails size
	==========================================================================  */

if ( function_exists( 'add_image_size' ) ) { 

	add_image_size( 'thumb-slideshows', 960, 320, true );	// (name, width, height, crop)
	add_image_size( 'thumb-medium', 600, 150, true );		// (name, width, height, crop)
	add_image_size( 'thumb-small-nocrop', 300, 100 );		// Without crop
	add_image_size( 'fullsize', '', '', true );				// Full size
	
	
	/* Add thumbnails size in add media select */
	
	function thumbnail_select( $sizes ) {
			
		$custom_sizes = array(
			'thumb-medium'			=> '600 x 150 thumb',
			'thumb-small-nocrop'	=> '300 x 100 thumb' 
		);
		
		return array_merge( $sizes, $custom_sizes );
		
	}
	
	add_filter( 'image_size_names_choose', 'thumbnail_select' );
	
}


/*  ==========================================================================
	5 - Localization
	==========================================================================  */

function localization_setup(){

	load_theme_textdomain( 'groundtheme', get_template_directory() . '/languages' );
	
}

add_action('after_setup_theme', 'localization_setup');


/*  ==========================================================================
	6 - Activate shortcodes in widgets sidebar
	==========================================================================  */

add_filter('widget_text', 'do_shortcode');


/*  ==========================================================================
	7 - Change JPEG Compression
	==========================================================================  */

add_filter( 'jpeg_quality', create_function( '', 'return 90;' ) );		// default 100


?>