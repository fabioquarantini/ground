<?php

/*  ==========================================================================
	MySQL and url settings
	==========================================================================  */

/* Switch database connections crendiantials between enviroments */

define( 'ENVIRONMENT', 'development' );

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

/* Change default prefix for security */

$table_prefix = 'wp_';


/*  ==========================================================================
	Authentication Unique Keys and Salts (https://api.wordpress.org/secret-key/1.1/salt/)
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
	WordPress Localized Language, defaults to English (wp-content/languages)
	==========================================================================  */

define( 'WPLANG', '' );
// define( 'WPLANG', 'it_IT' );
// define( 'WP_LANG_DIR', $_SERVER['DOCUMENT_ROOT'].'wordpress/languages' );  // If WP_LANG_DIR is not defined WordPress looks first to wp-content/languages and then wp-includes/languages for the .mo defined by WPLANG file.


/*  ==========================================================================
	Debug
	==========================================================================  */

define( 'WP_DEBUG',			false );	// Turn debugging on.
define( 'WP_DEBUG_LOG',		false );	// Log errors and warnings.(/wp-content/debug.log)
define( 'SAVEQUERIES',		false );	// Save database queries in an array. Show with: if (current_user_can('administrator')){ global $wpdb;  echo "<pre>"; print_r($wpdb->queries);  echo "</pre>"; }
define( 'WP_DEBUG_DISPLAY',	false );	// Display errors and warnings on your site.
//@ini_set('display_errors',0);


/*  ==========================================================================
	Custom WordPress directory location
	==========================================================================  */

// define( 'WP_CONTENT_URL',	'http://example.com/wp-content' );			// Content directory
// define( 'WP_PLUGIN_URL',		'http://example.com/wp-content/plugins' );	// Plugins directory
// define( 'UPLOADS',			'/media ' );									// Uploads directory


/*  ==========================================================================
	Enable Multisite
	==========================================================================  */

define( 'WP_ALLOW_MULTISITE', false );


/*  ==========================================================================
	 Disable the plugin and theme editor for security
	==========================================================================  */

define( 'DISALLOW_FILE_EDIT', true );


 /*  ==========================================================================
	 Enabling the "Trash" feature for media files
	==========================================================================  */

define( 'MEDIA_TRASH', false );


 /*  ==========================================================================
	 Disabling WordPress automatic update feature
	==========================================================================  */

define( 'AUTOMATIC_UPDATER_DISABLED', false );


 /*  ==========================================================================
	SSL
	==========================================================================  */

define( 'FORCE_SSL_LOGIN', false );
define( 'FORCE_SSL_ADMIN', false );


 /*  ==========================================================================
	Automatic Database Optimizing
	==========================================================================  */

define( 'WP_ALLOW_REPAIR', false );		// The script can be found at {$your_site}/wp-admin/maint/repair.php


 /*  ==========================================================================
	Disable Post Revisions
	==========================================================================  */

// define( 'WP_POST_REVISIONS', false );	// If you want to specify a maximum number of revisions, change false to an integer/number


 /*  ==========================================================================
	 Setting a default theme
	==========================================================================  */

// define( 'WP_DEFAULT_THEME', 'ground' );


 /*  ==========================================================================
	Increasing memory allocated to PHP
	==========================================================================  */

define( 'WP_MEMORY_LIMIT', '40M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );


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
