<?php

/*  ==========================================================================
	Define constants
	==========================================================================  */

define('MY_THEME_FOLDER', get_template_directory_uri() ); 	// Returns http://www.site.com/wp-content/themes/sitename


/*  ==========================================================================
	Extend backend
	==========================================================================  */

require_once('inc/extend-backend.php');						// Customozine backend text editor and login
require_once('inc/theme-support.php');						// Register theme support


/*  ==========================================================================
	Extend frontend
	==========================================================================  */

require_once('inc/extend-frontend.php');					// Extend frontend functionality
require_once('inc/head-output.php');						// Clean head output


/*  ==========================================================================
	Shortcode
	==========================================================================  */

require_once('inc/shortcode.php');							// Shortcode


/*  ==========================================================================
	Custom post type
	==========================================================================  */

require_once('inc/slideshows.php');							// Slideshow
require_once('inc/custom-catalog.php');						// Catalog


/*  ==========================================================================
	Theme options panels
	==========================================================================  */

require_once('inc/theme-customizer.php');					// Theme customize


?>