<?php

/*  ==========================================================================

	1 - Custom Login logo
	2 - Change backend footer text
	3 - Text editor markup output and styles
	4 - RSS post thumbnail
	5 - Media
	6 - Admin bar
	7 - Admin menu
	8 - Dashboard widgets
	9 - Maintenance mode
	10 - More buttons in the visual editor
	11 - Add custom user profile fields

	==========================================================================  */


/*  ==========================================================================
	1 - Custom Login logo
	==========================================================================  */

/* Add css will be loaded in login */

function ground_login_css() {

	echo '<style type="text/css">.login h1 a { background:url("'. MY_THEME_FOLDER .'/img/ground-login.png") no-repeat top center; width:326px; height:67px;</style>';

}

add_action('login_head', 'ground_login_css');


/* Change the url of the logo with home url  */

function ground_login_url() {

	return home_url();

}

add_filter('login_headerurl', 'ground_login_url');


/* Change the url of the title with blogname */

function ground_login_title() {

	return get_option('blogname');

}

add_filter('login_headertitle', 'ground_login_title');


/*  ==========================================================================
	2 - Change backend footer text
	==========================================================================  */

/* Footer left text */

function ground_backend_footer_left_text($text) {

	$my_theme = wp_get_theme();
	$text = '<span>'. __('Developed by', 'groundtheme') .' '. $my_theme->Author .'</span>';
    return $text;

}

add_filter('admin_footer_text', 'ground_backend_footer_left_text');


/* Footer right text */

function ground_admin_footer_right_text($text) {

	$my_theme = wp_get_theme();
	$text = __('Version', 'groundtheme') .' '. $my_theme->Version ;
	return $text;

}

add_filter('update_footer', 'ground_admin_footer_right_text', 11);


/*  ==========================================================================
	3 - Text editor markup output and styles
	==========================================================================  */

/* Register custom stylesheet file to the TinyMCE */

function ground_editor_styles() {

	add_editor_style( 'editor-style.css' );

}

add_action( 'init', 'ground_editor_styles' );


/* Remove p around img*/

function ground_remove_p_around_img($content) {

	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);

}

// add_filter('the_content', 'ground_remove_p_around_img');


/* Remove width and height for responsive template */

function ground_image_responsive( $html ) {

	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;

}

add_filter( 'post_thumbnail_html', 'ground_image_responsive', 10 );
add_filter( 'image_send_to_editor', 'ground_image_responsive', 10 );


/* Disable the wpautop filter */

// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );


/*  ==========================================================================
	4 - RSS post thumbnail
	==========================================================================  */

function ground_rss_post_thumbnail($content) {

	global $post;
	if( has_post_thumbnail($post->ID) ) {

		$content = '<p class="thumbnail-rss">' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</p>' . $content;
		return $content;

	}

}

add_filter('the_content_feed', 'ground_rss_post_thumbnail');


/*  ==========================================================================
	5 - Media
	==========================================================================  */

/* Adds pdf media filter */

function ground_media_pdf_filter( $post_mime_types ) {

	$post_mime_types['application/pdf'] = array( __('PDF','groundtheme'), __('Manage PDFs','groundtheme'), _n_noop( 'PDF <span class="count">(%s)</span>', 'PDF <span class="count">(%s)</span>' ) );
	return $post_mime_types;

}

add_filter( 'post_mime_types', 'ground_media_pdf_filter' );


/*  ==========================================================================
	6 - Admin bar
	==========================================================================  */

/* Remove wp logo in the admin bar */

function ground_remove_wp_logo_admin_bar( $wp_admin_bar ) {

	$wp_admin_bar->remove_node( 'wp-logo' );

}

// add_action( 'admin_bar_menu', 'ground_remove_wp_logo_admin_bar', 11);


/*  ==========================================================================
	7 - Admin menu
	==========================================================================  */

/* Remove menu links */

function ground_remove_menu_links() {

	remove_menu_page('index.php');							// Dashboard
	remove_menu_page('edit.php');							// Posts
	remove_menu_page('upload.php');							// Media
	remove_menu_page('link-manager.php');					// Links
	remove_menu_page('edit.php?post_type=page');			// Pages
	remove_menu_page('edit-comments.php');					// Comments
	remove_menu_page('themes.php');							// Appearance
	remove_menu_page('plugins.php');						// Plugins
	remove_menu_page('users.php');							// Users
	remove_menu_page('tools.php');							// Tools
	remove_menu_page('options-general.php');				// Settings
	remove_submenu_page('themes.php','theme-editor.php');	// Submenu

}

// add_action( 'admin_menu', 'ground_remove_menu_links' );


/* Remove menu label "themes" if user is different to ID 1 */

function ground_remove_themes_no_admin() {

	global $submenu, $userdata;
	get_currentuserinfo();

	if ( $userdata->ID != 1 ) {
		unset( $submenu['themes.php'][5] );
		unset( $submenu['themes.php'][15] );
	}

}

//add_action( 'admin_init', 'ground_remove_themes_no_admin' );


/*  ==========================================================================
	8 - Dashboard widgets
	==========================================================================  */

/* Disable dashboard widgets ( use id selector ) */

function ground_disable_default_dashboard_widgets() {

	remove_meta_box('dashboard_right_now', 'dashboard', 'core');    							// Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); 							// Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core'); 							// Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');        							// Plugins Widget
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');		 						// Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');  							// Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         							// Wordpress Blog Feed
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       							// Other Wordpress News
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');       							// Yoast's SEO Plugin Widget

}

add_action('admin_menu', 'ground_disable_default_dashboard_widgets');


/* Custom widget */

function ground_dashboard_widget_function() {

	echo "<p>" . __( 'Reminder dashboard widget text example', 'groundtheme' ) . "</p>";

}

function ground_add_dashboard_widgets() {

	wp_add_dashboard_widget('wp_dashboard_widget', __( 'Reminder', 'groundtheme' ) , 'ground_dashboard_widget_function');

}

// add_action('wp_dashboard_setup', 'ground_add_dashboard_widgets' );


/*  ==========================================================================
	9 - Maintenance mode
	==========================================================================  */

/* Maintenance mode message */

function ground_maintenance_notice(){

	echo '<div class="error"><p>' . __( 'Caution: Maintenance mode is <strong>active</strong>!', 'groundtheme' ) . '</p></div>';

}


/* If maintenance mode is active page will be redirected to the template */

function ground_maintenance_mode_redirect() {

	global $wp;
	get_template_part("template-maintenance-mode");
	die();

}


/* If theme customizer is true show message or redirect to template */

if( get_option( 'maintenance_option' ) == true ) {

	if (is_user_logged_in()) {
		add_action('admin_notices', 'ground_maintenance_notice');
	} else {
		add_action( 'template_redirect', 'ground_maintenance_mode_redirect' );
	}

}


/*  ==========================================================================
	10 - More buttons in the visual editor (http://www.tinymce.com/wiki.php/TinyMCE3x:Buttons/controls)
	==========================================================================  */

function ground_mce_buttons($buttons) {

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

//add_filter("mce_buttons_3", "ground_mce_buttons");


/*  ==========================================================================
	11 - Add custom user profile fields : the_author_meta('ground_user_fields_google');
	==========================================================================  */

function ground_user_fields( $contactmethods ) {

	$contactmethods['ground_user_fields_google']	= __( 'Google Plus', 'groundtheme' );
	$contactmethods['ground_user_fields_twitter']	= __( 'Twitter', 'groundtheme' );

	return $contactmethods;
}

add_filter('user_contactmethods','ground_user_fields');

?>