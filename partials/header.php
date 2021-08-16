<!doctype html>
<html <?php language_attributes(); ?> class="has-no-js is-loading">

<head>
	<meta charset="<?php echo GROUND_CHARSET; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?php echo GROUND_COLOR_PRIMARY; ?>">
	<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
		<link rel="icon" type="image/png" href="<?php echo GROUND_TEMPLATE_URL . '/img/favicon.png'; ?>">
		<link rel="apple-touch-icon" href="<?php echo GROUND_TEMPLATE_URL . '/img/icon.png'; ?>">
	<?php } ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'font-primary debug-screens' ); ?> data-template-url="<?php echo GROUND_TEMPLATE_URL; ?>">

	<div class="scroll" id="js-scroll">

	<?php
		/**
		 * Hook: ground_header.
		 */
		do_action( 'ground_header' );

	?>

		 <?php
			$type = GROUND_HEADER_TYPE;
			switch ( $type ) {
				case $type == 'menu':
					get_template_part( 'partials/content', 'header' );
					break;
				case $type == 'megaMenu':
					get_template_part( 'partials/content', 'header-mega-menu' );
					break;
				default:
					 get_template_part( 'partials/content', 'header' );
			}

			?>
		<?php
		// get_template_part( 'partials/loader' );
		?>



		<div data-router-wrapper>

			<div <?php ground_view_name(); ?>>

					<main role="main">
