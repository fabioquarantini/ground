<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(''); ?></title>

	<link rel="shortcut icon" href="<?php echo MY_THEME_FOLDER .'/favicon.ico' ?>">
	<link rel="apple-touch-icon-precomposed" href="<?php echo MY_THEME_FOLDER .'/apple-touch-icon-precomposed.png' ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-path="<?php echo MY_THEME_FOLDER ?>">

	<div class="container">

		<a class="visuallyhidden" href="#main-content"><?php _e( 'Skip to main content', 'ground' ); ?></a>

		<header class="main-header" role="banner">

			<a href="<?php echo home_url(); ?>" class="site-logo" title="<?php bloginfo('name'); ?>">
				<img src="<?php echo MY_THEME_FOLDER ?>/img/site-logo.png" alt="<?php bloginfo('name'); ?>" />
			</a>

			<nav class="navigation-primary" role="navigation">
				<?php get_template_part( 'partials/menu', 'primary' ); ?>
			</nav> <!-- End .navigation-primary -->

			<span class="navicon">Menu</span>

		</header> <!-- End .main-header -->

		<?php get_template_part( 'partials/header', 'image' ); ?>

		<?php get_template_part( 'partials/slider' ); ?>
