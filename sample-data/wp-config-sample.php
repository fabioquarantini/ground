<?php

/*  ==========================================================================
	MySQL and url settings
	==========================================================================  */

define( 'ENVIRONMENT', 'development' ); // Switch database connections crendiantials between enviroments

switch( ENVIRONMENT ) {

	case 'development':

		define( 'DB_NAME',		'database_name_here' );
		define( 'DB_USER',		'username_here' );
		define( 'DB_PASSWORD',	'password_here' );
		define( 'DB_HOST',		'localhost' );
		define( 'DB_CHARSET',	'utf8' );
		define( 'DB_COLLATE',	'' );

		define( 'WP_SITEURL',	'http://' . $_SERVER['HTTP_HOST'] . '/path/to/wordpress' );
		define( 'WP_HOME',		'http://' . $_SERVER['HTTP_HOST'] . '/path/to/wordpress' );

		break;

	case 'deploy':

		define( 'DB_NAME',		'database_name_here' );
		define( 'DB_USER',		'username_here' );
		define( 'DB_PASSWORD',	'password_here' );
		define( 'DB_HOST',		'localhost' );
		define( 'DB_CHARSET',	'utf8' );
		define( 'DB_COLLATE',	'' );

		define( 'WP_SITEURL',	'http://' . $_SERVER['HTTP_HOST'] );
		define( 'WP_HOME',		'http://' . $_SERVER['HTTP_HOST'] );

		break;

}


/*  ==========================================================================
	MySQL database table prefix
	==========================================================================  */

$table_prefix = 'wp_'; // Change default prefix for security


/*  ==========================================================================
	Authentication unique keys and salts (Generate it from https://api.wordpress.org/secret-key/1.1/salt/)
	==========================================================================  */

define( 'AUTH_KEY',			'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',	'put your unique phrase here' );
define( 'LOGGED_IN_KEY',	'put your unique phrase here' );
define( 'NONCE_KEY',		'put your unique phrase here' );
define( 'AUTH_SALT',		'put your unique phrase here' );
define( 'SECURE_AUTH_SALT',	'put your unique phrase here' );
define( 'LOGGED_IN_SALT',	'put your unique phrase here' );
define( 'NONCE_SALT',		'put your unique phrase here' );


/*  ==========================================================================
	WordPress language
	==========================================================================  */

define( 'WPLANG', '' ); // For example set 'it_IT' for italian


/*  ==========================================================================
	Debug
	==========================================================================  */

define( 'WP_DEBUG',			false );	// Turn debugging on
define( 'WP_DEBUG_DISPLAY',	false );	// Display errors and warnings on your site
define( 'WP_DEBUG_LOG',		false );	// Log errors and warnings (/wp-content/debug.log)
define( 'SAVEQUERIES',		false );	// Save database queries in an array. ( Show with: "global $wpdb; print_r( $wpdb->queries );" )


/*  ==========================================================================
	Memory allocated to PHP
	==========================================================================  */

define( 'WP_MEMORY_LIMIT', '40M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );


/*  ==========================================================================
	Enable or disable the plugin/theme editor
	==========================================================================  */

define( 'DISALLOW_FILE_EDIT', true );


/*  ==========================================================================
	Enable or disable the "Trash" feature for media files
	==========================================================================  */

define( 'MEDIA_TRASH', false );


/*  ==========================================================================
	Enable or disable WordPress automatic update feature
	==========================================================================  */

define( 'WP_AUTO_UPDATE_CORE', 'minor' );


/*  ==========================================================================
	Enable or disable post revisions
	==========================================================================  */

define( 'WP_POST_REVISIONS', true );	// If you want to specify a maximum number of revisions, change false to an integer/number


/*  ==========================================================================
	Custom WordPress directory location
	==========================================================================  */

// define( 'WP_CONTENT_URL',	'http://example.com/wp-content' );			// Custom 'wp-content' URI
// define( 'WP_PLUGIN_URL',		'http://example.com/wp-content/plugins' );	// Custom 'wp-content/plugins' URI
// define( 'UPLOADS',			'/media ' );								// Custom 'wp-content/uploads' folder


/*  ==========================================================================
	SSL for Admin and Logins
	==========================================================================  */

define( 'FORCE_SSL_LOGIN', false );
define( 'FORCE_SSL_ADMIN', false );


/*  ==========================================================================
	Multisite
	==========================================================================  */

define( 'WP_ALLOW_MULTISITE', false );


/*  ==========================================================================
	Absolute path to the WordPress directory
	==========================================================================  */

if ( !defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname(__FILE__) . '/' );

}


/*  ==========================================================================
	Sets up WordPress vars and included files
	==========================================================================  */

require_once( ABSPATH . 'wp-settings.php' );
