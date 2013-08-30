<?php

/*  ==========================================================================
	Define constants
	==========================================================================  */

// Template directory : returns http://www.site.com/wp-content/themes/sitename
define('MY_THEME_FOLDER', get_template_directory_uri() );


/*  ==========================================================================
	Extend backend
	==========================================================================  */

// Customozine backend text editor and login
require_once('inc/extend-backend.php');

// Register theme support						
require_once('inc/theme-support.php');


/*  ==========================================================================
	Extend frontend
	==========================================================================  */

// Extend frontend functionality
require_once('inc/extend-frontend.php');

// Clean head output
require_once('inc/head-output.php');


/*  ==========================================================================
	Shortcode
	==========================================================================  */

// Shortcode
require_once('inc/shortcode.php');


/*  ==========================================================================
	Custom post type
	==========================================================================  */

// Slideshow
require_once('inc/slideshows.php');

// Catalog
require_once('inc/custom-catalog.php');


/*  ==========================================================================
	Theme options panels
	==========================================================================  */

// Theme customize
require_once('inc/theme-customizer.php');

?>