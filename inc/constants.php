<?php
/**
 * Constants
 *
 * @package Ground
 */

define( 'SITE_URL', site_url() ); // Return http://www.site.com.
define( 'TEMPLATE_URL', get_template_directory_uri() ); // Return http://www.site.com/wp-content/themes/themename.
define( 'TEMPLATE_PATH', get_template_directory() ); // Return /home/user/public_html/wp-content/themes/themename.
define( 'CHARSET', get_bloginfo( 'charset' ) ); // The "Encoding for pages and feeds" (set in Settings > Reading).
