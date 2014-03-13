<?php

/*  ==========================================================================

	1 - Content width
	2 - Post thumbnails size
	3 - Localization
	4 - Register nav menus
	5 - Register sidebars
	6 - Post formats
	7 - Custom header
	8 - Custom background
	9 - Image quality compression
	10 - Display post thumbnail in RSS Feeds
	11 - Add excerpt support for pages
	12 - Html5 markup for comment and search
	13 - Excerpt custom lenght
	14 - Trim title length
	15 - Extend walker for selective page hierarchy in wp_list_pages()

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
	set_post_thumbnail_size( 150, 150, true );

	// Registers a new image size ($name, $width, $height, $crop)
	add_image_size( 'thumb-small', 200, 200, true );
	add_image_size( 'thumb-medium', 600, 150, true );
	add_image_size( 'thumb-slider-primary', 960, 320, true );

}

add_action( 'after_setup_theme','ground_post_thumbnail_size' );


/*  ==========================================================================
	3 - Localization
	==========================================================================  */

// Loads the theme's translated strings.
function ground_load_theme_textdomain() {

	load_theme_textdomain( 'groundtheme', get_template_directory() . '/languages' );

}

add_action( 'after_setup_theme', 'ground_load_theme_textdomain' );


/*  ==========================================================================
	4 - Register nav menus
	==========================================================================  */

function ground_register_nav_menus() {

	// This feature enables Menus support
	add_theme_support( 'menus' );

	// Registers multiple custom navigation menus in the custom menu editor
	$locations = array(
		'menu-primary'		=> __( 'Primary menu', 'groundtheme' ),
		'menu-secondary'	=> __( 'Secondary menu', 'groundtheme' ),
		'menu-tertiary'		=> __( 'Tertiary menu', 'groundtheme' ),
	);
	register_nav_menus( $locations );

}

add_action( 'init', 'ground_register_nav_menus' );


/*  ==========================================================================
	5 - Register sidebars
	==========================================================================  */

function ground_register_sidebars() {

	// Register sidebar (primary)
	$args_primary = array(
		'id'			=> 'primary-sidebar',
		'name'			=> __( 'Primary sidebar', 'groundtheme' ),
		'description'	=> __( 'Primary sidebar', 'groundtheme' ),
		'class'			=> '',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	);
	register_sidebar( $args_primary );

	// Register sidebar (secondary)
	$args_secondary = array(
		'id'			=> 'secondary-sidebar',
		'name'			=> __( 'Secondary sidebar', 'groundtheme' ),
		'description'	=> __( 'Secondary sidebar', 'groundtheme' ),
		'class'			=> '',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
	);
	register_sidebar( $args_secondary );

}

add_action( 'widgets_init', 'ground_register_sidebars' );


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

// Set jpeg quality (default 90)
//add_filter( 'jpeg_quality', create_function( '', 'return 90;' ) );


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
	12 - Html5 markup for comment and search
	==========================================================================  */

function ground_markup() {

	// This feature allows the use of HTML5 markup for the comment forms, search forms and comment lists.
	$markup = array(
		'search-form',
		'comment-form',
		'comment-list',
	);
	add_theme_support( 'html5', $markup );

}

add_action( 'after_setup_theme','ground_markup' );


/*  ==========================================================================
	13 - Excerpt custom lenght : ground_excerpt( 100, __('Read more', 'groundtheme'), '...', );
	==========================================================================  */

// Summary or description of a post with custom lenght

$word = __('Read more', 'groundtheme');

function ground_excerpt( $character_length = 100, $word, $continue = '...' ) {

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

		echo $continue . '<a href="' . get_permalink( $post->ID ) . '" title="' . $word . ' ' . get_the_title( $post->ID ) . '">' . $word . '</a>';

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

		$title = substr( $title, 0, $length );
		echo $title . $after;

	} else {

		echo $title;

	}

}


/*  ==========================================================================
	15 - Extend walker for selective page hierarchy in wp_list_pages()
	==========================================================================  */

/* Extend Walker_Page */
/* http://wordpress.mfields.org/2010/selective-page-hierarchy-for-wp_list_pages/ */

class Ground_Selective_Page_Hierarchy extends Walker_Page {

	function walk( $elements, $max_depth ) {

		global $post;
		$args = array_slice( func_get_args(), 2 );
		$output = '';

		/* invalid parameter */
		if ( $max_depth < -1 ) {
			return $output;
		}

		/* Nothing to walk */
		if ( empty( $elements ) ) {
			return $output;
		}

		/* Set up variables. */
		$top_level_elements = array();
		$children_elements  = array();
		$parent_field = $this->db_fields['parent'];
		$child_of = ( isset( $args[0]['child_of'] ) ) ? (int) $args[0]['child_of'] : 0;

		/* Loop elements */
		foreach ( (array) $elements as $e ) {

			$parent_id = $e->$parent_field;

			if ( isset( $parent_id ) ) {

				/* Top level pages. */
				if( $child_of === $parent_id ) {
					$top_level_elements[] = $e;
				}
				/* Only display children of the current hierarchy. */
				else if (
					( isset( $post->ID ) && $parent_id == $post->ID ) ||
					( isset( $post->post_parent ) && $parent_id == $post->post_parent ) ||
					( isset( $post->ancestors ) && in_array( $parent_id, (array) $post->ancestors ) )
					) {
					$children_elements[ $e->$parent_field ][] = $e;
				}

			}

		}

		/* Define output. */
		foreach ( $top_level_elements as $e ) {
			$this->display_element( $e, $children_elements, $max_depth, 0, $args, $output );
		}

		return $output;
	}
}


?>