<!doctype html>
<html <?php language_attributes(); ?> class="has-no-js is-loading">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#C5AB78">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=WindSong&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php if ((defined('FONT_PRIMARY') && FONT_PRIMARY)) { ?>
		<link href="<?php echo FONT_PRIMARY; ?>" rel="stylesheet">
	<?php } else { ?>
		<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@500;700&display=swap" rel="stylesheet">
	<?php } ?>

	<?php if ((defined('FONT_SECONDARY') && FONT_SECONDARY)) : ?>
		<link href="<?php echo FONT_SECONDARY; ?>" rel="stylesheet">
	<?php endif; ?>

	<?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
		<link rel="icon" type="image/png" href="<?php echo TEMPLATE_URL . '/img/favicon.png'; ?>">
		<link rel="apple-touch-icon" href="<?php echo TEMPLATE_URL . '/img/icon.png'; ?>">
	<?php } ?>
	<?php wp_head(); ?>
	<?php get_template_part('inc/variables'); ?>
</head>

<body <?php body_class('font-primary text-black debug-screens'); ?> data-template-url="<?php echo TEMPLATE_URL; ?>">

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