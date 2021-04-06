<?php
/**
 * Cache
 */
define( 'WP_CACHE', false );

/**
 * Url
 */
$protocol = 'http' . ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on' ? 's' : '' ) . '://';
$domain   = $_SERVER['HTTP_HOST'];

/**
 * MySQL and url settings
 */
define( 'WP_ENVIRONMENT_TYPE', 'local' ); // production, local, development and staging.

switch ( wp_get_environment_type() ) {

	case 'local':
		define( 'DB_NAME', 'database_name_here' );
		define( 'DB_USER', 'username_here' );
		define( 'DB_PASSWORD', 'password_here' );
		define( 'WP_SITEURL', $protocol . $domain . '/path/to/wordpress' );
		define( 'WP_HOME', $protocol . $domain . '/path/to/wordpress' );
		break;

	case 'production':
		define( 'DB_NAME', 'database_name_here' );
		define( 'DB_USER', 'username_here' );
		define( 'DB_PASSWORD', 'password_here' );
		define( 'WP_SITEURL', $protocol . $domain );
		define( 'WP_HOME', $protocol . $domain );
		break;

}

/**
 * MySQL database table prefix
 */
$table_prefix = 'gr_'; // Only numbers, letters, and underscores.

/**
 * Database internals
 */
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

/**
 * Authentication unique keys and salts (Generate it from https://api.wordpress.org/secret-key/1.1/salt/)
 */
define( 'AUTH_KEY', 'put your unique phrase here' );
define( 'SECURE_AUTH_KEY', 'put your unique phrase here' );
define( 'LOGGED_IN_KEY', 'put your unique phrase here' );
define( 'NONCE_KEY', 'put your unique phrase here' );
define( 'AUTH_SALT', 'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT', 'put your unique phrase here' );
define( 'NONCE_SALT', 'put your unique phrase here' );
// require('wp-salt.php');

/**
 * WordPress language
 */
define( 'WPLANG', 'it_IT' ); // Default en_EN.

/**
 * Debug
 */
define( 'WP_DEBUG', false ); // Turn debugging on.
define( 'WP_DEBUG_DISPLAY', false ); // Display errors and warnings on your site.
define( 'WP_DEBUG_LOG', true ); // Log errors and warnings (/wp-content/debug.log).
define( 'SAVEQUERIES', false ); // Save database queries in an array. ( Show with: "global $wpdb; print_r( $wpdb->queries );" ).
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', false ); // Disable Fatal Error Handler.
// @ini_set('display_errors',0);

/**
 * Memory allocated to PHP
 */
define( 'WP_MEMORY_LIMIT', '128M' );
define( 'WP_MAX_MEMORY_LIMIT', '256M' );

/**
 * File system
 */
define( 'FS_METHOD', 'direct' );
define( 'FS_CHMOD_DIR', ( 0775 & ~ umask() ) );
define( 'FS_CHMOD_FILE', ( 0664 & ~ umask() ) );

/**
 * Disable theme and plugin editors
 */
define( 'DISALLOW_FILE_EDIT', true );

/**
 * Media trash
 */
define( 'MEDIA_TRASH', false );

/**
 * Automatic update (minor, true, false)
 */
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

/**
 * Post revisions (true, false, int)
 */
define( 'WP_POST_REVISIONS', true );

/**
 * Multisite
 */
define( 'WP_ALLOW_MULTISITE', false );

/**
 * Plugin options
 */

// Contact form 7: Restricting access to the administration panel.
define( 'WPCF7_ADMIN_READ_CAPABILITY', 'manage_options' );
define( 'WPCF7_ADMIN_READ_WRITE_CAPABILITY', 'manage_options' );

/**
 * Custom directory
 */
// define( 'WP_CONTENT_URL', 'http://example.com/wp-content' ); // Custom 'wp-content' URI.
// define( 'WP_PLUGIN_URL', 'http://example.com/wp-content/plugins' ); // Custom 'wp-content/plugins' URI.
// define( 'UPLOADS', 'wp-content/uploads' ); // Custom 'wp-content/uploads' folder.

/**
 * Absolute path to the WordPress directory
 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/**
 * Sets up WordPress vars and included files
 */
require_once ABSPATH . 'wp-settings.php';
