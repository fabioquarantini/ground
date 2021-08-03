<header class="flex justify-between items-center shadow-lg bg-white fixed top-0 w-full z-10 px-8 py-6">

	<a class="js-cursor-hide" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">

		<?php if (GROUND_LOGO_PRIMARY_TYPE == '1') {
			echo GROUND_LOGO_PRIMARY_SOURCE;
		} else { ?>
			<img class="w-20 h-auto" src="<?php echo esc_url(GROUND_LOGO_PRIMARY_URL['sizes']['medium']); ?>" alt="<?php echo esc_attr(GROUND_LOGO_PRIMARY_URL['alt']); ?>" />
		<?php } ?>

	</a> <!-- End logo -->

	<?php

	if (class_exists('WooCommerce') && !is_checkout()) {
	?>
		<?php get_template_part('partials/navigation', 'primary'); ?>

		<button class="header__search js-toggle js-cursor-hover" data-toggle-target=".search html" data-toggle-class-name="is-search-open">
			<?php ground_icon('search'); ?>
		</button> <!-- End .header__search -->

		<?php get_template_part('partials/woocommerce/minicart'); ?>

		<button class="navicon js-toggle" data-toggle-target="body" data-toggle-class-name="is-navigation-open">
			<i class="navicon__icon"></i>
		</button> <!-- End .navicon -->
	<?php } ?>

</header> <!-- End header -->