<?php

/*  ==========================================================================
	Define constants
	==========================================================================  */

// Template directory : returns http://www.site.com/wp-content/themes/sitename
define('MY_THEME_FOLDER', get_template_directory_uri() );


/*  ==========================================================================
	Extend backend
	==========================================================================  */

// Clean head output
require_once('inc/head-output.php');

// Extend backend
require_once('inc/extend-backend.php');

// Extend text editor
require_once('inc/extend-text-editor.php');

// Extend administration
require_once('inc/extend-administration.php');


/*  ==========================================================================
	Custom post type
	==========================================================================  */

// Slider
require_once('inc/cpt-slider.php');

// Catalog
require_once('inc/cpt-catalog.php');


/*  ==========================================================================
	Shortcode
	==========================================================================  */

require_once('inc/shortcode.php');


?>