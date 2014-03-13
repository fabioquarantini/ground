<?php

/*  ==========================================================================

	1 - Remove width and height for responsive
	2 - Remove p around img
	3 - Register custom stylesheet file to the TinyMCE
	4 - Disable the wpautop filter
	5 - Add or remove buttons/features from TinyMCE toolbar

	==========================================================================  */


/*  ==========================================================================
	1 - Remove width and height for responsive
	==========================================================================  */

function ground_image_responsive( $html ) {

	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;

}

// add_filter( 'post_thumbnail_html', 'ground_image_responsive', 10 );
// add_filter( 'image_send_to_editor', 'ground_image_responsive', 10 );


/*  ==========================================================================
	2 - Remove p around img
	==========================================================================  */

function ground_remove_p_around_img($content) {

	return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );

}

// add_filter( 'the_content', 'ground_remove_p_around_img' );


/*  ==========================================================================
	3 - Register custom stylesheet file to the TinyMCE
	==========================================================================  */

// Allows to link a custom stylesheet file to the TinyMCE visual editor.
function ground_editor_styles() {

	add_editor_style( 'editor-style.css' );

}

// add_action( 'init', 'ground_editor_styles' );


/*  ==========================================================================
	4 - Disable the wpautop filter
	==========================================================================  */

// Changes double line-breaks in the text into HTML paragraphs (<p>...</p>).
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );


/*  ==========================================================================
	5 - Add or remove buttons/features from TinyMCE toolbar
	==========================================================================  */

function ground_tiny_mce_buttons( $buttons ) {

	$buttons[] = 'hr';
	$buttons[] = 'del';
	$buttons[] = 'sub';
	$buttons[] = 'sup';
	$buttons[] = 'fontselect';
	$buttons[] = 'fontsizeselect';
	$buttons[] = 'cleanup';
	$buttons[] = 'styleselect';

	return $buttons;

}

// add_filter( 'mce_buttons_3', 'ground_tiny_mce_buttons' );


?>