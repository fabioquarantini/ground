<!doctype html>

<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
		
	<head>
		
		<meta charset="<?php bloginfo('charset'); ?>">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title><?php wp_title(''); ?></title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<?php
			$favicon =  MY_THEME_FOLDER .'/favicon.ico';
			if(get_option('favicon_option') ) {
				$favicon = get_option('favicon_option', MY_THEME_FOLDER . '/favicon.ico');
			}
		?>
		<link rel="shortcut icon" href="<?php echo $favicon ?>">
						
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php wp_head(); ?>

	</head>
	
	<body <?php body_class(); ?> data-path="<?php echo MY_THEME_FOLDER ?>">

		<!--[if lt IE 7]>
			<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<p class="browsehappy">Il browser che stai utilizzando <strong>non &egrave; aggiornato</strong>. Per visualizzare correttamente il sito <a href="http://browsehappy.com/?locale=it_IT">aggiornalo con una versione pi&ugrave; recente</a></p>
		<![endif]-->

		<div id="container">
			
			<header id="main-header">
		
				<a href="<?php echo home_url(); ?>" id="site-title" title=""><?php bloginfo('name'); ?></a>
				<span id="site-description"><?php bloginfo('description'); ?></span>
				
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" class="header-image" />

				<nav>
					<?php ground_main_nav(); ?>
				</nav>

				<?php ground_slider('slideshows', '100', 'thumb-600-150'); ?>

			</header> <!-- End #main-header -->
