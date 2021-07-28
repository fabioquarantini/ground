<!doctype html>
<html <?php language_attributes(); ?> class="has-no-js is-loading">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#C5AB78">
	<?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
		<link rel="icon" type="image/png" href="<?php echo TEMPLATE_URL . '/img/favicon.png'; ?>">
		<link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL . '/img/icon.png'; ?>">
	<?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class('font-sans text-black debug-screens'); ?> data-template-url="<?php echo TEMPLATE_URL; ?>">

	<div class="scroll" id="js-scroll">

		<?php get_template_part('partials/content', 'header');
		?>
		<?php
		// get_template_part( 'partials/loader' );
		?>

		<div data-router-wrapper>

			<div <?php ground_view_name(); ?>>

				<div data-scroll-section>

					<main role="main">

						<?php if (is_front_page()) {
							get_template_part('partials/slider', 'secondary');
						} ?>