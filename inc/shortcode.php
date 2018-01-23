<?php

/*  ==========================================================================

	1 - Mail antispambot : [email]you@you.com[/email]
	2 - Google maps : [map ratio="16-9" width="200" height="200" src="[url]"] or [map src="[url]"]
	3 - Button : [button link="link" target="_blank" class="button button--primary"]Button text[/button]
	4 - Content only for logged in user : [loggedin]content[/loggedin]
	5 - Get variables from url : [get variable="name"]

	==========================================================================  */


/*  ==========================================================================
	1 - Mail antispambot : [email]you@you.com[/email]
	==========================================================================  */

function ground_shortcode_antispambot( $atts, $content = null ) {

	if ( !is_email ($content) ) {
		return;
	}

	return '<a href="mailto:' . antispambot($content) . '" class="link link--mail" >' . antispambot($content) . '</a>';

}

add_shortcode( 'email', 'ground_shortcode_antispambot' );


/*  ==========================================================================
	2 - Google maps : [map ratio="16-9" width="200" height="200" src="[url]"] or [map src="[url]"]
	==========================================================================  */

function ground_shortcode_map( $atts, $content = null ) {

	$args = array(
		"width"		=> '640',
		"height"	=> '480',
		"src"		=> '',
		"ratio"		=> ''
	);

	extract(shortcode_atts( $args , $atts));

	if ( empty($ratio) ) {
		return '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $src . '&amp;output=embed"></iframe>';
	} else {
		return '<div class="ratio--' . $ratio . '"><iframe width="' . $width . '" height="' . $height . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $src . '&amp;output=embed"></iframe></div>';
	}

}

add_shortcode("map", "ground_shortcode_map");


/*  ==========================================================================
	3 - Button : [button link="link" target="_blank" class="button button--primary"]Button text[/button]
	==========================================================================  */

function ground_shortcode_button( $atts, $content = null ) {

	$args = array(
		'link'		=> '',
		'target'	=> '',
		'class'	=> ''
	);

	extract( shortcode_atts( $args , $atts ) );

	if ( empty($target)) {
		$target = '';
	} else {
		$target = ' target="' . $target . '"';
	}

	if ( empty($class)) {
		$class = '';
	} else {
		$class = ' class="' . $class . '"';
	}

	return '<a href="' . $link . '"' . $class . $target .'>' . do_shortcode($content) . '</a>';

}

add_shortcode('button', 'ground_shortcode_button');


/*  ==========================================================================
	4 - Content only for logged in user : [loggedin]content[/loggedin]
	==========================================================================  */

function ground_shortcode_logged_in( $atts, $content = null ) {

	if ( is_user_logged_in() ) {
		return do_shortcode($content);
	} else {
		return;
	}

}

add_shortcode( 'loggedin', 'ground_shortcode_logged_in' );


/*  ==========================================================================
	5 - Get variables from url : [get variable="name"]
	==========================================================================  */

function ground_shortcode_get( $atts, $content = null ) {

	$args = array(
		"variable"	=> ''
	);

	extract(shortcode_atts( $args , $atts));

	if ( isset($_GET[$variable]) ) {
		return $_GET[$variable];
	} else {
		return;
	}

}

add_shortcode( 'get', 'ground_shortcode_get' );
