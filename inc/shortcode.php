<?php

/*  ==========================================================================

	1 - Mail antispambot : [email]you@you.com[/email]
	2 - Google maps : [googlemap width="200" height="200" src="[url]"] or [googlemap src="google_map_url"]
	3 - Button : [button href="link" target="_blank" class="button--primary"]Button text[/button]
	4 - Tag <pre> : [pre]content[/pre]
	5 - Content only for logged in user : [loggedin]content[/loggedin]

	==========================================================================  */


/*  ==========================================================================
	1 - Mail antispambot : [email]you@you.com[/email]
	==========================================================================  */

function ground_emailbot( $atts, $content = null ) {
	if ( ! is_email ($content) ) {
		return;
	}
	return '<a href="mailto:' . antispambot($content) . '" class="mail" >' . antispambot($content) . '</a>';
}

add_shortcode( 'email', 'ground_emailbot' );


/*  ==========================================================================
	2 - Google maps : [googlemaps width="200" height="200" src="[url]"] or [googlemaps src="google_map_url"]
	==========================================================================  */

function ground_maps( $atts, $content = null ) {

	$args = array(
		"width"		=> '640',
		"height"	=> '480',
		"src"		=> ''
	);

	extract(shortcode_atts( $args , $atts));

	return '<iframe width="' . $width . '" height="' . $height . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $src . '&amp;output=embed"></iframe>';

}

add_shortcode("googlemaps", "ground_maps");


/*  ==========================================================================
	3 - Button : [button href="link" target="_blank" class="button--primary"]Button text[/button]
	==========================================================================  */

function ground_button( $atts, $content = null ) {

	$args = array(
		'href'		=> '',
		'target'	=> '',
		'class'	=> ''
	);

	extract( shortcode_atts( $args , $atts ) );

	if ( empty($target)) {
		$target = '';
	} else {
		$target = 'target="' . $target . '"';
	}

	return '<a href="' . $href . '" class="button ' . $class .'"'. $target .'>' . do_shortcode($content) . '</a>';

}

add_shortcode('button', 'ground_button');


/*  ==========================================================================
	4 - Tag <pre> : [pre]content[/pre]
	==========================================================================  */

function ground_pre( $atts, $content = null ) {

	return '<pre>' . do_shortcode($content) . '</pre>';

}

add_shortcode('pre', 'ground_pre');


/*  ==========================================================================
	5 - Content only for logged in user : [loggedin]content[/loggedin]
	==========================================================================  */

function ground_logged_in( $atts, $content = null ) {
	if ( is_user_logged_in() ) {
		return do_shortcode($content);
	}
	else return;
}

add_shortcode( 'loggedin', 'ground_logged_in' );
