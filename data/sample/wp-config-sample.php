<?php

/*  ==========================================================================
	MySQL and url settings
	==========================================================================  */

$protocol = 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ? "s" : "") . '://';
$domain = $_SERVER['HTTP_HOST'];

define('ENVIROMENT', 'development');

// Switch database connections crendiantials between enviroments
switch(ENVIROMENT) {

	case 'development':

		define('DB_NAME',		'database_name_here');
		define('DB_USER',		'username_here');
		define('DB_PASSWORD',	'password_here');
		define('DB_HOST',		'localhost');

		define('WP_SITEURL',	$protocol . $domain . '/path/to/wordpress');
		define('WP_HOME',		$protocol . $domain . '/path/to/wordpress');

		break;

	case 'production':

		define('DB_NAME',		'database_name_here');
		define('DB_USER',		'username_here');
		define('DB_PASSWORD',	'password_here');
		define('DB_HOST',		'localhost');

		define('WP_SITEURL',	$protocol . $domain );
		define('WP_HOME',		$protocol . $domain );

		break;

}


/*  ==========================================================================
	MySQL database table prefix
	==========================================================================  */

$table_prefix = 'gr_'; // Only numbers, letters, and underscores


/*  ==========================================================================
	Database internals
	==========================================================================  */

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');


/*  ==========================================================================
	Authentication unique keys and salts (Generate it from https://api.wordpress.org/secret-key/1.1/salt/)
	==========================================================================  */

define('AUTH_KEY',			'put your unique phrase here');
define('SECURE_AUTH_KEY',	'put your unique phrase here');
define('LOGGED_IN_KEY',		'put your unique phrase here');
define('NONCE_KEY',			'put your unique phrase here');
define('AUTH_SALT',			'put your unique phrase here');
define('SECURE_AUTH_SALT',	'put your unique phrase here');
define('LOGGED_IN_SALT',	'put your unique phrase here');
define('NONCE_SALT',		'put your unique phrase here');


/*  ==========================================================================
	WordPress language
	==========================================================================  */

define('WPLANG', 'it_IT'); // Default en_EN


/*  ==========================================================================
	Debug
	==========================================================================  */

define('WP_DEBUG',			false);	// Turn debugging on
define('WP_DEBUG_DISPLAY',	false);	// Display errors and warnings on your site
define('WP_DEBUG_LOG',		false);	// Log errors and warnings (/wp-content/debug.log)
define('SAVEQUERIES',		false);	// Save database queries in an array. ( Show with: "global $wpdb; print_r( $wpdb->queries );" )
// @ini_set('display_errors',0);


/*  ==========================================================================
	Compression
	==========================================================================  */

define('COMPRESS_CSS',        false);
define('COMPRESS_SCRIPTS',    false);
define('CONCATENATE_SCRIPTS', false);
define('ENFORCE_GZIP',        false);


/*  ==========================================================================
	WordPress Cache
	==========================================================================  */

define('WP_CACHE', true);


/*  ==========================================================================
	Memory allocated to PHP
	==========================================================================  */

define('WP_MEMORY_LIMIT', '40M');
define('WP_MAX_MEMORY_LIMIT', '256M');


/*  ==========================================================================
	Enable or disable the plugin/theme editor
	==========================================================================  */

define('DISALLOW_FILE_EDIT', true);


/*  ==========================================================================
	Enable or disable the "Trash" feature for media files
	==========================================================================  */

define('MEDIA_TRASH', false);


/*  ==========================================================================
	Enable or disable WordPress automatic update feature (minor-true-false)
	==========================================================================  */

define('WP_AUTO_UPDATE_CORE', 'minor');


/*  ==========================================================================
	Enable or disable post revisions
	==========================================================================  */

define('WP_POST_REVISIONS', true);	// If you want to specify a maximum number of revisions, change false to an integer/number


/*  ==========================================================================
	Custom WordPress directory location
	==========================================================================  */

// define('WP_CONTENT_URL',	'http://example.com/wp-content');			// Custom 'wp-content' URI
// define('WP_PLUGIN_URL',		'http://example.com/wp-content/plugins');	// Custom 'wp-content/plugins' URI
// define('UPLOADS',			'wp-content/uploads');						// Custom 'wp-content/uploads' folder


/*  ==========================================================================
	SSL for Admin and Logins
	==========================================================================  */
if ($protocol === 'https://') {
	define('FORCE_SSL_LOGIN', true);
	define('FORCE_SSL_ADMIN', true);
}

/*  ==========================================================================
	Multisite
	==========================================================================  */

define('WP_ALLOW_MULTISITE', false);


/*  ==========================================================================
	Plugins
	==========================================================================  */

// Contact form 7: Restricting access to the administration panel
define('WPCF7_ADMIN_READ_CAPABILITY', 'manage_options');
define('WPCF7_ADMIN_READ_WRITE_CAPABILITY', 'manage_options');


/*  ==========================================================================
	Absolute path to the WordPress directory
	==========================================================================  */

if ( !defined('ABSPATH') ) {

	define('ABSPATH', dirname(__FILE__) . '/');

}


/*  ==========================================================================
	Sets up WordPress vars and included files
	==========================================================================  */

require_once( ABSPATH . 'wp-settings.php');
