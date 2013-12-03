<?php

/*  ==========================================================================

	1 - Mail antispambot [email]you@you.com[/email]
	2 - Google maps [googlemap width="200" height="200" src="[url]"] or [googlemap src="google_map_url"]
	3 - Button [link_button href="link" target="_self|_blank"]text[/link_button]
	4 - Tag <pre> [pre]content[/pre]

	==========================================================================  */


/*  ==========================================================================
	1 - Mail antispambot [email]you@you.com[/email]
	==========================================================================  */

function ground_emailbot( $atts, $content ) {

	return '<a href="'.antispambot("mailto:".$content).'" class="mail-">'.antispambot($content).'</a>';

}

add_shortcode( 'email', 'ground_emailbot' );


/*  ==========================================================================
	2 - Google maps [googlemaps width="200" height="200" src="[url]"] or [googlemaps src="google_map_url"]
	==========================================================================  */

function ground_maps($atts, $content = null) {

	$args = array(
		"width"		=> '640',
		"height"	=> '480',
		"src"		=> ''
	);

	extract(shortcode_atts( $args , $atts));

	return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe>';

}

add_shortcode("googlemaps", "ground_maps");


/*  ==========================================================================
	3 - Button [button href="link" target="_self|_blank"]text[/button]
	==========================================================================  */

function ground_button( $atts, $content=null ) {

	$args = array(
		'href'		=> '',
		'target'	=> '_self'
	);

	extract( shortcode_atts( $args , $atts ) );

	return '<a href="'.$href.'" target="'.$target.'" class="button">'.do_shortcode($content).'</a>';

}

add_shortcode('button', 'ground_button');


/*  ==========================================================================
	2 - Tag <pre> [pre]content[/pre]
	==========================================================================  */

function ground_pre( $atts, $content=null ) {

	return '<pre>'.do_shortcode($content).'</pre>';

}

add_shortcode('pre', 'ground_pre');

?>