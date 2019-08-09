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
			
		<div class="scroll" id="js-scroll">

			<?php get_template_part( 'partials/content', 'header' ); ?>
			<?php get_template_part( 'partials/loader' ); ?>
			
			<div data-scroll-section>

				<div data-router-wrapper>

					<main role="main" <?php ground_view_name(); ?>>	

						<?php if ( is_front_page() ) {
							get_template_part( 'partials/slider', 'secondary' );
						} ?>