<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(''); ?></title>

	<link rel="shortcut icon" href="<?php echo MY_THEME_FOLDER .'/favicon.ico' ?>">
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

			<?php get_template_part( 'partials/menu', 'primary' ); ?>

		</header> <!-- End .main-header -->

		<?php get_template_part( 'partials/header', 'image' ); ?>

		<?php get_template_part( 'partials/slider' ); ?>
