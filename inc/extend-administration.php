<?php

/*  ==========================================================================

	1 - Login form customization (wp-login.php)
	2 - Remove menu items
	3 - Remove WordPress logo in the admin bar
	4 - Footer text custumization
	5 - Disable dashboard widgets
	6 - Custom widgets

	==========================================================================  */


/*  ==========================================================================
	1 - Login form customization (wp-login.php)
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


/*  ==========================================================================
	2 - Remove menu items
	==========================================================================  */

function ground_remove_menu_links() {

	remove_menu_page( 'index.php' );						// Dashboard
	remove_menu_page( 'edit.php' );							// Posts
	remove_menu_page( 'upload.php' );						// Media
	remove_menu_page( 'edit.php?post_type=page' );			// Pages
	remove_menu_page( 'edit-comments.php' );				// Comments
	remove_menu_page( 'themes.php' );						// Appearance
	remove_menu_page( 'plugins.php' );						// Plugins
	remove_menu_page( 'users.php' );						// Users
	remove_menu_page( 'tools.php' );						// Tools
	remove_menu_page( 'options-general.php' );				// Settings
	remove_submenu_page( 'themes.php','theme-editor.php' );	// Submenu

}

// add_action( 'admin_menu', 'ground_remove_menu_links' );


/*  ==========================================================================
	3 - Remove WordPress logo in the admin bar
	==========================================================================  */

function ground_remove_wp_logo_admin_bar( $wp_admin_bar ) {

	$wp_admin_bar->remove_node( 'wp-logo' );

}

// add_action( 'admin_bar_menu', 'ground_remove_wp_logo_admin_bar', 11);


/*  ==========================================================================
	4 - Footer text custumization
	==========================================================================  */

// Replace WordPress credits with custom text and theme author
function ground_backend_footer_left_text( $text ) {

	$my_theme = wp_get_theme();
	$text = '<span>' . __( 'Developed by', 'ground-admin' ) . ' ' . $my_theme->Author . '</span>';
	return $text;

}

// add_filter( 'admin_footer_text', 'ground_backend_footer_left_text' );


// Replace WordPress version with theme version
function ground_admin_footer_right_text( $text ) {

	$my_theme = wp_get_theme();
	$text = __( 'Version', 'ground-admin' ) . ' ' . $my_theme->Version ;
	return $text;

}

// add_filter( 'update_footer', 'ground_admin_footer_right_text', 11 );


/*  ==========================================================================
	5 - Disable dashboard widgets
	==========================================================================  */

function ground_disable_default_dashboard_widgets() {

	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );		// Right Now Widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );	// Comments Widget
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );	// Incoming Links Widget
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );			// Plugins Widget
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );		// Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );	// Recent Drafts Widget
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );			// Wordpress Blog Feed
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );		// Other Wordpress News

}

// add_action( 'admin_menu', 'ground_disable_default_dashboard_widgets' );


/*  ==========================================================================
	6 - Custom widgets
	==========================================================================  */

function ground_dashboard_widget_function() {

	echo "<p>" . __( 'Widget text example', 'ground-admin' ) . "</p>";

}

function ground_add_dashboard_widgets() {

	wp_add_dashboard_widget( 'wp_dashboard_widget', __( 'Custom widget', 'ground-admin' ) , 'ground_dashboard_widget_function' );

}

// add_action( 'wp_dashboard_setup', 'ground_add_dashboard_widgets' );

?>