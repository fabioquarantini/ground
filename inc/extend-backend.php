<?php

/*  ==========================================================================

	1 - Content width
	2 - Post thumbnails size
	3 - Localization
	4 - Register navigation menu
	5 - Register widgets sidebar
	6 - Post formats
	7 - Custom header
	8 - Custom background
	9 - Image quality compression
	10 - Display post thumbnail in RSS Feeds
	11 - Add excerpt support for pages
	12 - Html5 markup
	13 - Excerpt custom lenght
	14 - Trim title length
	15 - Extend walker for selective page hierarchy in wp_list_pages()
	16 - Remove special characters from uploaded files
	17 - Title tag support
	18 - Disable emojis
	19 - Login form customization (wp-login.php)

	==========================================================================  */


/*  ==========================================================================
	1 - Content width
	==========================================================================  */

if ( ! isset( $content_width ) ) {

	// Set the maximum allowed width for any content, like oEmbeds and images added to posts.
	$content_width = 600;

}


/*  ==========================================================================
	2 - Post thumbnails size
	==========================================================================  */

function ground_post_thumbnail_size() {

	// This feature enables Post Thumbnails (Featured image) support
	add_theme_support( 'post-thumbnails' );

	// Set the default Post Thumbnail dimensions
	set_post_thumbnail_size( 450, 150, true );

	// Registers a new image size ($name, $width, $height, $crop)
	add_image_size( 'thumb-small', 200, 200, true );
	add_image_size( 'thumb-medium', 600, 150, true );
	add_image_size( 'thumb-slider-primary', 1920, 550, array( 'top', 'center' ) );

}

add_action( 'after_setup_theme','ground_post_thumbnail_size' );


/*  ==========================================================================
	3 - Localization
	==========================================================================  */

// Loads the theme's translated strings.
function ground_load_theme_textdomain() {

	load_theme_textdomain( 'ground-admin', get_template_directory() . '/languages' );
	load_theme_textdomain( 'ground', get_template_directory() . '/languages' );

}

add_action( 'after_setup_theme', 'ground_load_theme_textdomain' );


/*  ==========================================================================
	4 - Register navigation menu
	==========================================================================  */

function ground_register_navigation_menus() {

	// This feature enables Menus support
	add_theme_support( 'menus' );

	// Registers multiple custom navigation menus in the custom menu editor
	$locations = array(
		'navigation-primary'		=> __( 'Primary navigation', 'ground-admin' ),
		'navigation-secondary'		=> __( 'Secondary navigation', 'ground-admin' ),
		'navigation-tertiary'		=> __( 'Tertiary navigation', 'ground-admin' ),
	);
	register_nav_menus( $locations );

}

add_action( 'init', 'ground_register_navigation_menus' );


/*  ==========================================================================
	5 - Register widgets sidebar
	==========================================================================  */

function ground_register_widgets_sidebar() {

	// Register widgets sidebar (primary)
	$args_primary = array(
		'id'			=> 'widgets-primary',
		'name'			=> __( 'Widgets primary', 'ground-admin' ),
		'description'	=> __( 'Widgets primary', 'ground-admin' ),
		'class'			=> '',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget__title">',
		'after_title'	=> '</h3>',
	);
	register_sidebar( $args_primary );

	// Register widgets sidebar (secondary)
	$args_secondary = array(
		'id'			=> 'widgets-secondary',
		'name'			=> __( 'Widgets secondary', 'ground-admin' ),
		'description'	=> __( 'Widgets secondary', 'ground-admin' ),
		'class'			=> '',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget__title">',
		'after_title'	=> '</h3>',
	);
	register_sidebar( $args_secondary );

}

add_action( 'widgets_init', 'ground_register_widgets_sidebar' );


/*  ==========================================================================
	6 - Post formats
	==========================================================================  */

function ground_post_formats() {

	// This feature enables Post Formats support
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
	add_theme_support( 'post-formats', $formats );

}

//add_action('after_setup_theme','ground_post_formats');


/*  ==========================================================================
	7 - Custom header
	==========================================================================  */

// Custom header is an image that is chosen as the representative image in the theme top header section.
function ground_custom_header() {

	// This feature enables Custom_Headers support
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
	add_theme_support( 'custom-header', $header_args );

}

add_action('after_setup_theme','ground_custom_header');


/*  ==========================================================================
	8 - Custom background
	==========================================================================  */

// Custom Backgrounds is a theme feature that provides for customization of the background color and image.
function ground_custom_background() {

	// This feature enables Custom_Backgrounds support
	$background_args = array(
		'default-color'				=> '',
		'default-image'				=> '',
		'wp-head-callback'			=> '_custom_background_cb',
		'admin-head-callback'		=> '',
		'admin-preview-callback'	=> '',
	);
	add_theme_support( 'custom-background', $background_args );

}

// add_action('after_setup_theme','ground_custom_background');


/*  ==========================================================================
	9 - Image quality compression
	==========================================================================  */

// Set jpeg quality (default 82)
//add_filter( 'jpeg_quality', create_function( '', 'return 82;' ) );


/*  ==========================================================================
	10 - Display post thumbnail in RSS Feeds
	==========================================================================  */

function ground_post_thumbnail_to_rss( $content ) {

	global $post;

	if( has_post_thumbnail( $post->ID ) ) {

		$content = '<div class="post-thumbnail-rss">' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '</div>' . $content;
		return $content;

	}

}

// add_filter( 'the_content_feed', 'ground_post_thumbnail_to_rss' );
// add_filter( 'the_excerpt_rss', 'ground_post_thumbnail_to_rss' );


/*  ==========================================================================
	11 - Add excerpt support for pages
	==========================================================================  */

function ground_page_excerpt() {

	add_post_type_support( 'page', 'excerpt' );

}

add_action( 'init', 'ground_page_excerpt' );


/*  ==========================================================================
	12 - Html5 markup
	==========================================================================  */

function ground_markup() {

	// This feature allows the use of HTML5 markup for the comment forms, search forms, comment lists and gallery.

	$markup = array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	);
	add_theme_support( 'html5', $markup );

}

add_action( 'after_setup_theme','ground_markup' );


/*  ==========================================================================
	13 - Excerpt custom lenght : ground_excerpt( 100, __('Read more', 'ground'), '...', 'classname' );
	==========================================================================  */

// Summary or description of a post with custom lenght

$word = __('Read more', 'ground');

function ground_excerpt( $character_length = 100, $word, $continue = '...', $class="button" ) {

	global $post;

	$excerpt = get_the_excerpt();
	$character_length++;

	if ( mb_strlen( $excerpt ) > $character_length ) {

		$subex = mb_substr( $excerpt, 0, $character_length - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );

		if ( $excut < 0 ) {

			echo mb_substr( $subex, 0, $excut );

		} else {

			echo $subex;

		}

		echo $continue;

		if ( !empty($word) ) {
			echo ' <a href="' . get_permalink( $post->ID ) . '" class="' . $class . '" title="' . $word . ' ' . get_the_title( $post->ID ) . '">' . $word . '</a>';
		}

	} else {

		echo $excerpt;

	}

}


/*  ==========================================================================
	14 - Trim title length : ground_title( 5, '...' );
	==========================================================================  */

// Show the first N chars from the title
function ground_title( $length = 5, $after = '...' ) {

	$title = get_the_title();

	if ( strlen( $title ) > $length ) {

		$charset = get_bloginfo('charset');
		$title = mb_substr( $title, 0, $length, $charset );
		echo $title . $after;

	} else {

		echo $title;

	}

}


/*  ==========================================================================
	15 - Extend walker for selective page hierarchy in wp_list_pages()
	==========================================================================  */

// Extend Walker_Page http://wordpress.mfields.org/2010/selective-page-hierarchy-for-wp_list_pages/
class Ground_Selective_Page_Hierarchy extends Walker_Page {

	function walk( $elements, $max_depth ) {

		global $post;
		$args = array_slice( func_get_args(), 2 );
		$output = '';

		// invalid parameter
		if ( $max_depth < -1 ) {
			return $output;
		}

		// Nothing to walk
		if ( empty( $elements ) ) {
			return $output;
		}

		// Set up variables
		$top_level_elements = array();
		$children_elements  = array();
		$parent_field = $this->db_fields['parent'];
		$child_of = ( isset( $args[0]['child_of'] ) ) ? (int) $args[0]['child_of'] : 0;

		// Loop elements
		foreach ( (array) $elements as $e ) {

			$parent_id = $e->$parent_field;

			if ( isset( $parent_id ) ) {

				// Top level pages
				if( $child_of === $parent_id ) {
					$top_level_elements[] = $e;
				}
				// Only display children of the current hierarchy
				else if (
					( isset( $post->ID ) && $parent_id == $post->ID ) ||
					( isset( $post->post_parent ) && $parent_id == $post->post_parent ) ||
					( isset( $post->ancestors ) && in_array( $parent_id, (array) $post->ancestors ) )
					) {
					$children_elements[ $e->$parent_field ][] = $e;
				}

			}

		}

		// Define output
		foreach ( $top_level_elements as $e ) {
			$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
		}

		return $output;
	}
}


/*  ==========================================================================
	16 - Remove special characters from uploaded files
	==========================================================================  */

function ground_sanitize_uploads ( $filename ) {

	return remove_accents( $filename );

}

add_filter( 'sanitize_file_name', 'ground_sanitize_uploads', 10 );


/*  ==========================================================================
	17 - Title tag support
	==========================================================================  */

function ground_title_tag_support() {

	add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'ground_title_tag_support' );


/*  ==========================================================================
	18 - Disable emojis
	==========================================================================  */

function ground_disable_emojis() {

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );

}

function disable_emojis_tinymce( $plugins ) {

	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}

}

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

	if ( 'dns-prefetch' == $relation_type ) {
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;

}

add_action( 'init', 'ground_disable_emojis' );


/*  ==========================================================================
	19 - Login form customization (wp-login.php)
	==========================================================================  */

// Add css will be loaded in login form for replace the image
function ground_login_form_css() {

	echo'<style>
			.login h1 a {
				background: transparent url("' . MY_THEME_FOLDER . '/img/login.png") center center no-repeat;
				width: 326px;
				height: 67px;
			}
		</style>';

}

add_action( 'login_head', 'ground_login_form_css' );


// Change the url of the logo with home url
function ground_login_form_url() {

	return home_url();

}

add_filter( 'login_headerurl', 'ground_login_form_url' );


// Change the url of the title with blogname
function ground_login_form_title() {

	return get_option( 'blogname' );

}

add_filter( 'login_headertitle', 'ground_login_form_title' );
