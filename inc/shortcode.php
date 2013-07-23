<?php

/*  ==========================================================================

	1 - Mail antispambot [email]you@you.com[/email]
	2 - Tag <pre> [pre]content[/pre]
	3 - Button [link_button href="link" target="_self|_blank"]text[/link_button]
	4 - Tab [tabs] [tab title="your title 1"]...[/tab] [tab title="your title 2"]...[/tab] [/tabs]
	5 - Google maps [googlemap width="200" height="200" src="[url]"] or [googlemap src="google_map_url"]

	==========================================================================  */


/*  ==========================================================================
	1 - Mail antispambot [email]you@you.com[/email]
	==========================================================================  */

function ground_emailbot( $atts, $content ) {
		
	return '<a href="'.antispambot("mailto:".$content).'" class="mail-">'.antispambot($content).'</a>';
	
}

add_shortcode( 'email', 'ground_emailbot' );


/*  ==========================================================================
	2 - Tag <pre> [pre]content[/pre]
	==========================================================================  */

function ground_pre( $atts, $content=null ) {
		
	return '<pre>'.do_shortcode($content).'</pre>';

}

add_shortcode('pre', 'ground_pre');


/*  ==========================================================================
	3 - Button [link_button href="link" target="_self|_blank"]text[/link_button]
	==========================================================================  */

function ground_button( $atts, $content=null ) {
	
	$args = array(
		'href'		=> 'HREF',
		'target'	=> 'TARGET'
	);
			
	extract( shortcode_atts( $args , $atts ) );
							
	if ($target == 'TARGET') {
		
		$target = '_self';
		
	}
	
	return '<a href="'.$href.'" target="'.$target.'" class="button">'.do_shortcode($content).'</a>';

}

add_shortcode('link_button', 'ground_button');


/*  ==========================================================================
	4 - Tab [tabs] [tab title="your title 1"]...[/tab] [tab title="your title 2"]...[/tab] [/tabs]
	==========================================================================  */

function ground_tabs ( $atts, $content=null ) {
		
	global $anzimus_tabs;
	$anzimus_tabs = array();
	do_shortcode($content);
	
	$out = '<ul class="tabs">';
	
	foreach( $anzimus_tabs as $tab ) {
			
		$out .= '<li><a href="#'.$tab['id'].'"><span>' . $tab['title'] . '</span></a></li>';
	
	}
	
	$out .= '</ul><div class="panes">';
	
	foreach( $anzimus_tabs as $tab ) {
			
		$out .= '<div>' . $tab['content'] . '</div>';
	
	}

	$out .= '</div>';
	
	$anzimus_tabs = array();
	
	return $out;

}

function ground_tab($atts, $content=null) {
		
	global $anzimus_tabs;
	extract(shortcode_atts(array('title' => ''),$atts));
		
	$id = rand(0,10000);
	$args = array(
		'id'		=> $id,
		'title'		=> $title,
		'content'	=> do_shortcode($content)
	);
	
	$anzimus_tabs[] = $args;
	
}

add_shortcode('tabs', 'ground_tabs');
add_shortcode('tab', 'ground_tab');


/*  ==========================================================================
	5 - Google maps [googlemap width="200" height="200" src="[url]"] or [googlemap src="google_map_url"]
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

add_shortcode("googlemap", "ground_maps");


?>