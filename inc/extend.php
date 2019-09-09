<?php

/*  ==========================================================================

	1 - Thumbnails size
	2 - Register menu
	3 - Content width
	4 - Localization
	5 - Add excerpt support for pages
	6 - Excerpt custom lenght
	7 - Trim title length
	8 - Remove special characters from uploaded files
	9 - Html5 markup
	10 - Remove <p> around images
	11 - Remove the maximum image width in a ‘srcset’ attribute.
	12 - Remove width and height attributes from inserted images
	13 - Gets the featured image of a specifific post
	14 - Print image of a specifific post or acf
	15 - Add gallery modal
	16 - Highlight archive and wp_nav_menu parents
	17 - BEM body class
	18 - ACF local JSON
	19 - Oembed responsive
	20 - Rename attachment slug
	21 - Echoes the highway view name tag
	22 - Custom Breadcrumb using Yoast SEO Plugin
	23 - Ajax search result
	24 - WMPL - Switch Language
	==========================================================================  */


/*  ==========================================================================
	1 - Thumbnails size
	==========================================================================  */

function ground_thumbnail_size() {

	// Enables featured image
	add_theme_support( 'post-thumbnails' );

	// WordPress default thumbnails
	add_image_size( 'thumbnail', 200, 200, true );
	add_image_size( 'small', 480, 480, true );
	add_image_size( 'medium', 768, 768, true );
	add_image_size( 'medium_large', 1280, 720, true );
	add_image_size( 'large', 1920, 1080, array( 'top', 'center' ) );

}

add_action( 'after_setup_theme','ground_thumbnail_size' );


/*  ==========================================================================
	2 - Register menu
	==========================================================================  */

function ground_register_menu() {

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

add_action( 'init', 'ground_register_menu' );


/*  ==========================================================================
	3 - Content width
	==========================================================================  */

if ( !isset( $content_width ) ) {

	// Set the maximum allowed width for any content, like oEmbeds and images added to posts.
	$content_width = 1920;

}


/*  ==========================================================================
	4 - Localization
	==========================================================================  */

// Loads the theme's translated strings.
function ground_load_theme_textdomain() {

	load_theme_textdomain( 'ground-admin', get_template_directory() . '/languages' );
	load_theme_textdomain( 'ground', get_template_directory() . '/languages' );

}

add_action( 'after_setup_theme', 'ground_load_theme_textdomain' );


/*  ==========================================================================
	5 - Add excerpt support for pages
	==========================================================================  */

function ground_page_excerpt() {

	add_post_type_support( 'page', 'excerpt' );

}

add_action( 'init', 'ground_page_excerpt' );


/*  ==========================================================================
	6 - Excerpt custom lenght : ground_excerpt( 100, '...', 'id' );
	==========================================================================  */

// Summary or description of a post with custom lenght

function ground_excerpt( $length = 100, $more = '...', $post_id = null ) {

	$charset = get_bloginfo('charset');

	if ( $post_id !== null ) {

		$post = get_post($post_id);
		if ( $post->post_excerpt !== '' ) {
			$post_content = $post->post_excerpt;
		} else {
			$post_content = $post->post_content;
		}
		$content = strip_tags( $post_content );
		$excerpt = mb_substr( $content, 0, $length, $charset );

	} else {

		$content = get_the_excerpt();
		$excerpt = mb_substr( $content, 0, $length, $charset );

	}

	if ( strlen($content) > $length) {

		$excerpt = $excerpt . $more;

	}

	echo $excerpt;

}


/*  ==========================================================================
	7 - Trim title length : ground_trim_title( 5, '...' );
	==========================================================================  */

// Show the first N title chars
function ground_trim_title( $length = 5, $after = '...' ) {

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
	8 - Remove special characters from uploaded files
	==========================================================================  */

function ground_sanitize_uploads ( $filename ) {

	return remove_accents( $filename );

}

add_filter( 'sanitize_file_name', 'ground_sanitize_uploads', 10 );


/*  ==========================================================================
	9 - Html5 markup
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
	10 - Remove <p> around images
	==========================================================================  */

function ground_remove_p_around_img($content) {

	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );

}

// add_filter( 'the_content', 'ground_remove_p_around_img' );


/*  ==========================================================================
	11 - Remove the maximum image width in a ‘srcset’ attribute.
	==========================================================================  */

function ground_remove_max_srcset_image_width( $max_width ) {

	return false;

}

add_filter( 'max_srcset_image_width', 'ground_remove_max_srcset_image_width' );


/*  ==========================================================================
	12 - Remove width and height attributes from inserted images
	==========================================================================  */

function ground_remove_img_size( $html ) {

	$html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	return $html;

}

add_filter( 'post_thumbnail_html', 'ground_remove_img_size', 10 );
add_filter( 'image_send_to_editor', 'ground_remove_img_size', 10 );


/*  ==========================================================================
	13 - Gets the featured image of a specifific post
	==========================================================================  */


function ground_get_image($size = 'thumbnail' ,$id = null , $url = true){
	$image = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
	$image = ($url) ? $image[0] : $image ;
	return $image;
}

/*  ==========================================================================
	14 - Print image of a specifific post or acf
	==========================================================================  */

function  ground_print_image($acf=false , $id=null) {
	if ( !$acf ) {
		$size1 = ground_get_image('large', $id);
		$size2 = ground_get_image('medium_large', $id);
		$size3 = ground_get_image('medium', $id);
		$size4 = ground_get_image('small', $id);
	} else {
		$size1 = $acf["sizes"]["large"];
		$size2 = $acf["sizes"]["medium_large"];
		$size3 = $acf["sizes"]["medium"];
		$size4 = $acf["sizes"]["small"];
	}

	$ret = '<img srcset="'. $size1 .' 1280w, '
						  . $size2 .' 768w, '
						  . $size3 . ' 480w"
				    src="'. $size4 .'" class="media__img">';

	return $ret;
}


/*  ==========================================================================
	15 - Add gallery modal
	==========================================================================  */

function ground_gallery_modal( $link ) {

	return str_replace( '<a href', '<a data-fancybox="gallery" data-router-disabled href', $link );

}

add_filter('wp_get_attachment_link', 'ground_gallery_modal');


/*  ==========================================================================
	16 - Highlight archive and wp_nav_menu parents
	==========================================================================  */

function ground_custom_parent_menu_item_classes( $classes = array(), $menu_item = false) {

	global $post;

	$id = ( isset( $post->ID ) ? get_the_ID() : NULL );

	if (isset( $id )){
		$classes[] = ($menu_item->url == get_post_type_archive_link($post->post_type)) ? 'navigation__item--ancestor' : '';
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'ground_custom_parent_menu_item_classes', 10, 2 );


/*  ==========================================================================
	17 - BEM body class
	==========================================================================  */

function ground_body_class_bem( $classes ) {

	foreach ($classes as &$value) {
		if (strpos($value, 'is-') !== false || strpos($value, 'woo') !== false) {
			$value = $value;
		} else {
			$value = 'body--' . $value;
		}
	}

	array_unshift($classes, 'body');

	return $classes;

}

add_filter('body_class', 'ground_body_class_bem');


/*  ==========================================================================
	18 - ACF local JSON
	==========================================================================  */

function ground_acf_json_save_point( $path ) {

	$path = TEMPLATE_PATH . '/data/acf';
	return $path;

}

add_filter('acf/settings/save_json', 'ground_acf_json_save_point');


function ground_acf_json_load_point( $paths ) {

	unset($paths[0]);
	$paths[] = TEMPLATE_PATH . '/data/acf';
	return $paths;

}

add_filter('acf/settings/load_json', 'ground_acf_json_load_point');


/*  ==========================================================================
	19 - Oembed responsive
	==========================================================================  */

function ground_oembed_responsive( $html, $url, $attr, $post_id ) {

	if ( strpos( $url, 'vimeo.com' ) !== false || strpos( $url, 'youtube.com' ) !== false || strpos( $url, 'youtu.be' ) !== false  ) {
		$class = 'ratio-16-9';
		return '<div class="' . $class . '">' . $html . '</div>';
	}

}

add_filter('embed_oembed_html', 'ground_oembed_responsive', 99, 4);


/*  ==========================================================================
	20 - Rename attachment slug
	==========================================================================  */

function ground_rename_attachment_slug( $post_ID ) {

	wp_update_post(array(
		'ID' => $post_ID,
		'post_name' => uniqid( '-' )
	));
}

add_action( 'add_attachment', 'ground_rename_attachment_slug' );



/*  ==========================================================================
	21 - Echoes the highway view name tag
	==========================================================================  */

function ground_view_name() {

	global $wp_query;

	if ( is_front_page() ) {
		$view_name = 'home';
	} elseif ( is_page_template('templates/template-ground_catalog.php') ) {
		$view_name = 'catalog';
	} elseif ( is_home() ) {
		$view_name = 'blog';
	} elseif ( is_search() ) {
		$view_name = 'search';
	} elseif ( is_archive() ) {
		$view_name = 'archive';
	} else {
		$view_name = 'page';
	}

	echo 'data-router-view="' . $view_name . '"';

}


/*  ==========================================================================
	22 - Custom Breadcrumb using Yoast SEO Plugin https://fellowtuts.com/wordpress/custom-breadcrumb-navigation-yoast-seo/
	==========================================================================  */

function ground_yoast_breadcrumb(){
	$crumb = array();
	$dom = new DOMDocument();

	if ( yoast_breadcrumb('', '', false) ) {
		$dom->loadHTML('<?xml encoding="' . get_bloginfo('charset') . '" ?>' . yoast_breadcrumb('', '', false));
	}

	$items = $dom->getElementsByTagName('a');

	foreach ($items as $tag)
		$crumb[] = array('text' => $tag->nodeValue, 'href' => $tag->getAttribute('href'));

	// Get the current page text and href
	$items = new DOMXpath($dom);
	$dom = $items->query('//*[contains(@class, "breadcrumb_last")]');

	if ( $dom->item(0) && $dom->item(0)->nodeValue ) {
		$crumb[] = array('text' => $dom->item(0)->nodeValue, 'href' => '');
	}

	$html = '';
	if($crumb) {
		$items = count($crumb) - 1;
		$html = '<nav class="breadcrumb">';
		$html .= '<ol class="breadcrumb__list">';
			foreach($crumb as $k => $v){
				$html .= '<li class="breadcrumb__item">';
				if($k == $items) { // If it's the last item then output the text only
					$html .= $v['text'];
				} else { // Preceding items with URLs
					$html .= sprintf('<a class="breadcrumb__link" href="%s">%s</a>', $v['href'], $v['text']);
				}
				$html .= '</li>';
			}
		$html .= '</ol>';
		$html .= '</nav>';
	}
	echo $html;
}


/*  ==========================================================================
	23 - Ajax search result
	==========================================================================  */

add_action('wp_ajax_data_fetch' , 'ground_ajax_search_data_fetch');
add_action('wp_ajax_nopriv_data_fetch','ground_ajax_search_data_fetch');

function ground_ajax_search_data_fetch(){
	ob_start();
	get_template_part('partials/abstract-ajax-search');
	return ob_get_clean();
}


/*  ==========================================================================
	24 - WMPL - Switch Language
	==========================================================================  */
function ground_language_switch(){
	ob_start();
	get_template_part('partials/switch-language');
	return ob_get_clean();
}

