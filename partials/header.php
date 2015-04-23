<!doctype html>

<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php wp_title(''); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?php echo MY_THEME_FOLDER .'/favicon.ico' ?>">
	<link rel="apple-touch-icon" href="<?php echo MY_THEME_FOLDER .'/apple-touch-icon.png' ?>">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

	<!--[if lt IE 9]>
    	<script src="<?php echo MY_THEME_FOLDER .'/js/html5shiv.min.js' ?>"></script>
    	<script src="<?php echo MY_THEME_FOLDER .'/js/respond.min.js' ?>"></script>
	<![endif]-->
</head>

<body <?php body_class(); ?> data-path="<?php echo MY_THEME_FOLDER ?>">

	<div class="container">

		<a class="visuallyhidden" href="#main-content"><?php _e( 'Skip to main content', 'ground' ); ?></a>

		<header class="header header--primary" role="banner">

			<a class="logo" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
				<img class="logo__img" src="<?php echo MY_THEME_FOLDER ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" />
			</a> <!-- End .logo -->

			<?php get_template_part( 'partials/navigation', 'primary' ); ?>

			<span class="navicon">Menu</span>

		</header> <!-- End .header- -primary -->

		<?php get_template_part( 'partials/header', 'image' ); ?>

		<?php get_template_part( 'partials/slider', 'primary' ); ?>

		<div class="content">
