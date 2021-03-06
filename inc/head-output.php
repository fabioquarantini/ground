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
	wp_enqueue_style( 'main-style', TEMPLATE_URL . '/css/main.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'yacc-style', 'https://cdn.etcloud.it/yacc/1.3.0/yacc.css', array(), '1.3.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_styles', 9 );

/**
 * Register and enqueue JS
 */
function ground_enqueue_scripts() {

	// wp_deregister_script( 'jquery' );
	// wp_enqueue_script( 'jquery', "https://code.jquery.com/jquery-3.5.0.min.js", array(), null, true );
	wp_enqueue_script( 'yacc', 'https://cdn.etcloud.it/yacc/1.3.0/yacc.min.js', array(), '1.3.0', true );
	wp_enqueue_script( 'polyfill', 'https://polyfill.io/v3/polyfill.min.js?features=fetch%2CPromise', array(), null, true );
	wp_enqueue_script( 'scripts', TEMPLATE_URL . '/js/scripts.min.js', array( 'jquery' ), '1.0', true );

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
 * Disable emojis
 */
function ground_disable_emojis() {

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'ground_disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'ground_disable_emojis_remove_dns_prefetch', 10, 2 );

}

/**
 * Disable emojis TinyMCE
 *
 * @param array $plugins An array of default TinyMCE plugins.
 * @return array
 */
function ground_disable_emojis_tinymce( $plugins ) {

	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}

}

/**
 * Disable emojis DNS prefetch
 *
 * @param array  $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for, e.g. 'preconnect' or 'prerender'.
 * @return array
 */
function ground_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

	if ( 'dns-prefetch' === $relation_type ) {
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls          = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;

}

add_action( 'init', 'ground_disable_emojis' );

/**
 * Remove login logo
 */
function ground_login_css() { ?>
	<style type="text/css">#login h1 { display: none;} </style>
	<?php
}

add_action( 'login_enqueue_scripts', 'ground_login_css' );
