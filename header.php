<!DOCTYPE html>

	<html class="no-js" <?php language_attributes(); ?>>

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

		<div class="container">

			<header class="main-header">

				<a href="<?php echo home_url(); ?>" class="site-title" title="<?php bloginfo('name'); ?>">
					<h1 class="site-name"><?php bloginfo('name'); ?></h1>
					<h2 class="site-description"><?php bloginfo('description'); ?></h2>
				</a>

				<?php ground_main_nav(); ?>

			</header> <!-- End .main-header -->

			<?php if( get_header_image() ) { ?>
				<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" class="header-image" />
			<?php } ?>

			<?php get_template_part( 'content', 'slide' ); ?>
