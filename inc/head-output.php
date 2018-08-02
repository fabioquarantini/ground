<?php

/*  ==========================================================================

	1 - Register and enqueue css
	2 - Register and enqueue js
	3 - Clean up head output
	4 - Disable emojis
	5 - Remove login logo

	==========================================================================  */


/*  ==========================================================================
	1 - Register and enqueue css
	==========================================================================  */

function ground_enqueue_styles() {

	wp_enqueue_style( 'main-style', TEMPLATE_URL . '/css/main.css', array(), '1.0', 'all' );

}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_styles', 9 );


/*  ==========================================================================
	2 - Register and enqueue js
	==========================================================================  */

function ground_enqueue_scripts() {

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', "https://code.jquery.com/jquery-3.3.1.min.js", array(), null, true );
	wp_enqueue_script( 'imagesloaded', "https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js", array(), null, true );
	wp_enqueue_script( 'owlcarousel', "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js", array(), null, true );
	wp_enqueue_script( 'fancybox', "https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js", array(), null, true );
	wp_enqueue_script( 'infinitescroll', "https://cdnjs.cloudflare.com/ajax/libs/jquery-infinitescroll/3.0.4/infinite-scroll.pkgd.min.js", array(), null, true );
	wp_enqueue_script( 'tweenmax', "https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js", array(), null, true );
	wp_enqueue_script( 'scrollmagic', "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js", array(), null, true );
	wp_enqueue_script( 'scrollmagic-gsap', "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js", array(), null, true );
	wp_enqueue_script( 'scrollmagic-indicators', "https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js", array(), null, true );
	wp_enqueue_script( 'scripts', TEMPLATE_URL . '/js/scripts.min.js', array( 'jquery' ), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'wp_enqueue_scripts', 'ground_enqueue_scripts', 1 );


/*  ==========================================================================
	3 - Clean up head output
	==========================================================================  */

function ground_head_output() {

	// Enables RSS posts and comments
	add_theme_support( 'automatic-feed-links' );

	// Allows themes to add document title tag to HTML <head>
	add_theme_support( 'title-tag' );

	// Remove adjacent posts links to the current post
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

	// Remove the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'rsd_link' );

	// Remove the link to Windows Live Writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Remove WordPress version
	remove_action( 'wp_head', 'wp_generator' );

	// Remove post, page, attachment shortlink
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

	// Remove recent comments inline styles
	add_filter( 'show_recent_comments_widget_style', '__return_false' );

	// Remove rel canonical
	//remove_action( 'wp_head', 'rel_canonical' );

}

add_action( 'init', 'ground_head_output' );


/*  ==========================================================================
	4 - Disable emojis
	==========================================================================  */

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

function ground_disable_emojis_tinymce( $plugins ) {

	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}

}

function ground_disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {

	if ( 'dns-prefetch' == $relation_type ) {
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	}

	return $urls;

}

add_action( 'init', 'ground_disable_emojis' );


/*  ==========================================================================
	5 - Remove login logo
	==========================================================================  */

function ground_login_css() { ?>
	<style type="text/css">
		#login h1 {
			display: none;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'ground_login_css' );
