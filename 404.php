<?php // The template for displaying 404 pages (Not Found).

get_header(); ?>

<section class="content">

	<h1><?php _e( "Not found", "groundtheme" ); ?></h1>
	<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'groundtheme' ); ?></p>
	<p><?php get_search_form(); ?></p>

	<?php

	// http://wp-mix.com/wordpress-404-email-alerts/

	if ( ! is_admin() ) {

		// Site info
		$blog  = get_bloginfo( 'name' );
		$site  = home_url( '/' );
		$email = get_bloginfo( 'admin_email' );


		// Sanitize
		function clean($string) {

			$string = rtrim( $string );
			$string = ltrim( $string );
			$string = htmlentities( $string, ENT_QUOTES );
			$string = str_replace( "\n", "<br>", $string );

			if ( get_magic_quotes_gpc() ) {

				$string = stripslashes( $string );

			}
			return $string;

		}

		// Theme info
		if ( !empty( $_COOKIE["nkthemeswitch" . COOKIEHASH] ) ) {
			$theme = clean( $_COOKIE["nkthemeswitch" . COOKIEHASH] );
		} else {
			$theme_data = wp_get_theme();
			$theme = clean( $theme_data->Name );
		}

		// Referrer
		if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
			$referer = clean( $_SERVER['HTTP_REFERER'] );
		} else {
			$referer = "undefined";
		}


		// Request URI
		if ( isset( $_SERVER['REQUEST_URI'] ) && isset( $_SERVER["HTTP_HOST"] ) ) {
			$request = clean( 'http://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
		} else {
			$request = "undefined";
		}


		// Query string
		if ( isset( $_SERVER['QUERY_STRING'] ) ) {
			$string = clean( $_SERVER['QUERY_STRING'] );
		} else {
			$string = "undefined";
		}


		// IP address
		if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
			$address = clean( $_SERVER['REMOTE_ADDR'] );
		} else {
			$address = "undefined";
		}


		// User agent
		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
			$agent = clean( $_SERVER['HTTP_USER_AGENT'] );
		} else {
			$agent = "undefined";
		}


		// Identity
		if ( isset($_SERVER['REMOTE_IDENT'] ) ) {
			$remote = clean( $_SERVER['REMOTE_IDENT'] );
		} else {
			$remote = "undefined";
		}


		// Log time
		$time = clean( date( "F jS Y, h:ia", time() ) );

		$message =
			"Time: "			. $time    . "\n" .
			"404 url: "			. $request . "\n" .
			"Site: "			. $site    . "\n" .
			"Theme: "			. $theme   . "\n" .
			"Referrer: "		. $referer . "\n" .
			"Query string: "	. $string  . "\n" .
			"Remote address: "	. $address . "\n" .
			"Remote identity: "	. $remote  . "\n" .
			"User agent: "		. $agent   . "\n\n\n";

		// Comment this line if you don't want 404 alert to be sent to your email
		mail( $email, __( "Page with 404 error: ", "groundtheme" ) . $blog . " [" . $theme . "]", $message, "From: $email" );

	}

	?>

</section> <!-- End .content -->

<?php get_footer(); ?>