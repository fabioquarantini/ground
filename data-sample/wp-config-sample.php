<?php

/* ==========================================================================
		MySQL settings
========================================================================== */

define('ENVIRONMENT', 'testing');

switch(ENVIRONMENT){

	case 'testing':

		define( 'DB_NAME',		'database_name_here' );
		define( 'DB_USER',		'username_here' );
		define( 'DB_PASSWORD',	'password_here' );
		define( 'DB_HOST',		'localhost' );
		define( 'DB_CHARSET',	'utf8' );
		define( 'DB_COLLATE',	'' );

		break;

	case 'production':

		define( 'DB_NAME',		'database_name_here' );
		define( 'DB_USER',		'username_here' );
		define( 'DB_PASSWORD',	'password_here' );
		define( 'DB_HOST',		'localhost' );
		define( 'DB_CHARSET',	'utf8' );
		define( 'DB_COLLATE',	'' );

		break;

}


/* ==========================================================================
		MySQL database table prefix
========================================================================== */

$table_prefix = 'wp_';


/* ==========================================================================
		Authentication Unique Keys and Salts (https://api.wordpress.org/secret-key/1.1/salt/)
========================================================================== */

define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );


/* ==========================================================================
		WordPress Localized Language, defaults to English (wp-content/languages)
========================================================================== */

define('WPLANG', '');
// define( 'WPLANG', 'it_IT' );


/* ==========================================================================
		Debug
========================================================================== */

define( 'WP_DEBUG',			false );	// Display errors and warnings.
define( 'WP_DEBUG_LOG',		false );	// Log errors and warnings.(/wp-content/debug.log)
define( 'SAVEQUERIES',		false );	// Save database queries in an array. if (current_user_can('administrator')){ global $wpdb;  echo "<pre>"; print_r($wpdb->queries);  echo "</pre>"; }
define( 'WP_DEBUG_DISPLAY',	false );	// Display errors and warnings.
//@ini_set('display_errors',0);


/* ==========================================================================
		Custom WordPress URL
========================================================================== */

// define( 'WP_SITEURL',     'http://example.com/blog' );					// Your Wordpress blog/site URI.
// define( 'WP_HOME',        'http://example.com/wordpress' );				// WordPress core files URI.				
// define( 'WP_CONTENT_URL', 'http://example.com/wp-content' );				// Content URL
// define( 'UPLOADS',        'http://example.com/wp-content/uploads' );		// Uploads URL 
// define( 'WP_PLUGIN_URL',  'http://example.com/wp-content/plugins' );		// Plugins URL


/* ==========================================================================
		Increasing memory allocated to PHP 
========================================================================== */

// define('WP_MEMORY_LIMIT', '64M');


/* ==========================================================================
		Upload folder
========================================================================== */

define( 'UPLOADS', ''.'img' );				// http://www.example.com/img/


/* ==========================================================================
		Enable Multisite
========================================================================== */

 define( 'WP_ALLOW_MULTISITE', false );


/* ==========================================================================
		Absolute path to the WordPress directory
========================================================================== */

if ( !defined('ABSPATH') ) {
		
	define('ABSPATH', dirname(__FILE__) . '/');
	
}

/* ==========================================================================
		Sets up WordPress vars and included files
========================================================================== */

require_once(ABSPATH . 'wp-settings.php');
