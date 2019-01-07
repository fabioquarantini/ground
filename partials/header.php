<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php if ( !function_exists( 'has_site_icon' ) || !has_site_icon() ) { ?>
			<link rel="icon" type="image/png" href="<?php echo TEMPLATE_URL .'/img/favicon.png' ?>">
			<link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL .'/img/icon.png' ?>">
		<?php } ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> data-site-url="<?php echo SITE_URL ?>" data-template-url="<?php echo TEMPLATE_URL ?>">

		<div class="container">

			<header class="header">

				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
					<img class="logo__img" src="<?php echo TEMPLATE_URL ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>" />
				</a> <!-- End .logo -->

				<?php get_template_part( 'partials/navigation', 'primary' ); ?>

				<button class="navicon js-toggle-class" data-toggle-class-selector="navicon navigation--primary" data-toggle-class-name="is-navigation-open">
					<i class="navicon__icon"></i>
				</button> <!-- End .navicon -->

			</header> <!-- End .header -->

			<?php if ( is_front_page() ) {
				get_template_part( 'partials/slider', 'primary' );
			} ?>

			<main class="clear-fix" role="main">
