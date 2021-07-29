<?php
/**
 * Head output
 *
 * @package Ground
 */

/**
 * Register and enqueue CSS
 */
function ground_enqueue_styles() {
	wp_enqueue_style( 'main-style', GROUND_TEMPLATE_URL . '/css/styles.min.css', array(), GROUND_VERSION, 'all' );
	wp_enqueue_style( 'yacc-style', 'https://cdn.etcloud.it/yacc/1.3.0/yacc.css', array(), null, 'all' );
	wp_enqueue_style( 'swiper-style', 'https://unpkg.com/swiper@6.5.4/swiper-bundle.min.css', array(), null, 'all' );
}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_styles', 9 );

/**
 * Add CSS theme variables
 */
function ground_add_css_theme_variables() {
	echo '<style type="text/css">
		:root { ' .
			( ( defined( 'GROUND_COLOR_PRIMARY' ) && GROUND_COLOR_PRIMARY ) ? '--ground-color-primary:' . GROUND_COLOR_PRIMARY . ';' : '' ) .
			( ( defined( 'GROUND_COLOR_SECONDARY' ) && GROUND_COLOR_SECONDARY ) ? '--ground-color-secondary:' . GROUND_COLOR_SECONDARY . ';' : '' ) .
			( ( defined( 'GROUND_FONT_PRIMARY_NAME' ) && GROUND_FONT_PRIMARY_NAME ) ? '--ground-font-primary:' . GROUND_FONT_PRIMARY_NAME . ';' : '' ) .
			( ( defined( 'GROUND_FONT_SECONDARY_NAME' ) && GROUND_FONT_SECONDARY_NAME ) ? '--ground-font-secondary:' . GROUND_FONT_SECONDARY_NAME . ';' : '' ) .
			( ( defined( 'GROUND_ROUNDED_THEME' ) && GROUND_ROUNDED_THEME ) ? '--ground-rounded-theme:' . GROUND_ROUNDED_THEME . 'px;' : '' ) .
	' } </style>';
}

add_action( 'wp_head', 'ground_add_css_theme_variables' );

/**
 * Register and enqueue JS
 */
function ground_enqueue_scripts() {

	// wp_deregister_script( 'jquery' );
	// wp_enqueue_script( 'jquery', "https://code.jquery.com/jquery-3.5.0.min.js", array(), null, true );
	wp_enqueue_script( 'yacc', 'https://cdn.etcloud.it/yacc/1.3.0/yacc.min.js', array(), null, true );
	wp_enqueue_script( 'scripts', GROUND_TEMPLATE_URL . '/js/scripts.min.js', array( 'jquery' ), GROUND_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_scripts', 1 );

/**
 * Clean up head output
 */
function ground_head_output() {

	// Enables RSS posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Allows themes to add document title tag to HTML <head>.
	add_theme_support( 'title-tag' );
	// Remove adjacent posts links to the current post.
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// Remove the Really Simple Discovery service endpoint, EditURI link.
	remove_action( 'wp_head', 'rsd_link' );
	// Remove the link to Windows Live Writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Remove WordPress version.
	remove_action( 'wp_head', 'wp_generator' );
	// Remove post, page, attachment shortlink.
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	// Remove recent comments inline styles.
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
	// Remove rel canonical.
	// remove_action( 'wp_head', 'rel_canonical' );
}

add_action( 'init', 'ground_head_output' );

/**
 * Remove login logo
 */
function ground_login_css() { ?>
	<style type="text/css">#login h1 { display: none;} </style>
	<?php
}

	add_action( 'login_enqueue_scripts', 'ground_login_css' );
