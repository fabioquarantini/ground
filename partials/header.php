<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if ( !function_exists( 'has_site_icon' ) || !has_site_icon() ) { ?>
			<link rel="icon" type="image/png" href="<?php echo TEMPLATE_URL .'/img/favicon.png' ?>">
			<link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL .'/img/icon.png' ?>">
		<?php } ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class('is-loading'); ?> data-template-url="<?php echo TEMPLATE_URL ?>">

		<?php get_template_part( 'partials/loader' ); ?>

		<header class="header">

			<a class="logo js-cursor-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
				<?php /* <img class="logo__img" src="<?php echo TEMPLATE_URL ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>" /> */ ?>
				<?php echo file_get_contents(TEMPLATE_PATH ."/img/logo.svg"); ?>
			</a> <!-- End .logo -->

			<?php get_template_part( 'partials/navigation', 'primary' ); ?>

			<button class="header__search js-toggle" data-toggle-target=".search" data-toggle-class-name="is-search-open">
				<i class="icon-magnifying-glass"></i>
			</button> <!-- End .navicon -->

			<?php get_template_part( 'partials/woocommerce/minicart' ); ?>

			<button class="navicon js-toggle" data-toggle-target="body" data-toggle-class-name="is-navigation-open">
				<i class="navicon__icon"></i>
			</button> <!-- End .navicon -->

		</header> <!-- End .header -->

		<div data-router-wrapper>

			<main role="main" <?php ground_view_name(); ?>>

				<?php if ( is_front_page() ) {
					get_template_part( 'partials/slider', 'secondary' );
				} ?>
