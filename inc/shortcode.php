<?php
/**
 * Shortcode
 *
 * @package Ground
 */

/**
 * Mail antispambot
 *
 * [email]you@you.com[/email]
 *
 * @param array  $atts An array of attributes.
 * @param string $content The shortcode content or null if not set.
 * @return string Shortcode output.
 */
function ground_shortcode_antispambot( $atts, $content = null ) {

	if ( ! is_email( $content ) ) {
		return;
	}

	return '<a href="mailto:' . antispambot( $content ) . '" class="link link--mail" >' . antispambot( $content ) . '</a>';

}

add_shortcode( 'email', 'ground_shortcode_antispambot' );

/**
 * Google maps
 *
 * [map ratio="16-9" width="200" height="200" src="[url]"] or [map src="[url]"]
 *
 * @param array  $atts An array of attributes.
 * @param string $content The shortcode content or null if not set.
 * @return string Shortcode output.
 */
function ground_shortcode_map( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'width'  => '640',
			'height' => '480',
			'src'    => '',
			'ratio'  => '',
		),
		$atts,
		'map'
	);

	if ( ! isset( $atts['ratio'] ) ) {
		return '<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . esc_html( $atts['src'] ) . '&amp;output=embed"></iframe>';
	} else {
		return '<div class="ratio-' . esc_html( $atts['ratio'] ) . '"><iframe width="' . esc_html( $atts['width'] ) . '" height="' . esc_html( $atts['height'] ) . '" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . esc_html( $atts['src'] ) . '&amp;output=embed"></iframe></div>';
	}

}

add_shortcode( 'map', 'ground_shortcode_map' );

/**
 * Button
 *
 * [button link="link" target="_blank" class="button button--rounded"]Button text[/button]
 *
 * @param array  $atts An array of attributes.
 * @param string $content The shortcode content or null if not set.
 * @return string Shortcode output.
 */
function ground_shortcode_button( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'link'   => '',
			'target' => '_self',
			'class'  => 'button',
		),
		$atts,
		'button'
	);

	return '<a href="' . esc_html( $atts['link'] ) . '" class="' . esc_html( $atts['class'] ) . '" target="' . esc_html( $atts['target'] ) . '">' . esc_html( $content ) . '</a>';

}

add_shortcode( 'button', 'ground_shortcode_button' );

/**
 * Content only for logged in user
 *
 * [loggedin]content[/loggedin]
 *
 * @param array  $atts An array of attributes.
 * @param string $content The shortcode content or null if not set.
 * @return string Shortcode output.
 */
function ground_shortcode_logged_in( $atts, $content = null ) {

	if ( is_user_logged_in() ) {
		return do_shortcode( $content );
	} else {
		return;
	}

}

add_shortcode( 'loggedin', 'ground_shortcode_logged_in' );

/**
 * Get variables from url
 *
 * [get name="example"]
 *
 * @param array  $atts An array of attributes.
 * @param string $content The shortcode content or null if not set.
 * @return string Shortcode output.
 */
function ground_shortcode_get( $atts, $content = null ) {

	$atts = shortcode_atts(
		array(
			'name' => '',
		),
		$atts,
		'get'
	);

	$value = $atts['name'];

	if ( isset( $_GET[ $value ] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		return sanitize_text_field( wp_unslash( $_GET[ $value ] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}

}

add_shortcode( 'get', 'ground_shortcode_get' );
