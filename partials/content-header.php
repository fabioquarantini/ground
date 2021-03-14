<header class="flex justify-between items-center shadow-lg bg-white fixed top-0 w-full z-10 px-8 py-6">

	<a class="js-cursor-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
		<?php /* <img class="logo__img" src="<?php echo TEMPLATE_URL ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>" /> */ ?>
		<?php echo file_get_contents( TEMPLATE_PATH . '/img/logo.svg' ); ?>
	</a> <!-- End logo -->

	<?php if ( ! is_checkout() ) { ?>
		<?php get_template_part( 'partials/navigation', 'primary' ); ?>

		<button class="header__search js-toggle js-cursor-hover" data-toggle-target=".search html" data-toggle-class-name="is-search-open">
			<?php ground_icon( 'search' ); ?>
		</button> <!-- End .header__search -->

		<?php get_template_part( 'partials/woocommerce/minicart' ); ?>

		<button class="navicon js-toggle" data-toggle-target="body" data-toggle-class-name="is-navigation-open">
			<i class="navicon__icon"></i>
		</button> <!-- End .navicon -->
	<?php } ?>

</header> <!-- End header -->
