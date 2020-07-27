<header class="header">

	<a class="logo js-cursor-hide js-magnet" href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
		<?php /* <img class="logo__img" src="<?php echo TEMPLATE_URL ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>" /> */ ?>
		<?php echo file_get_contents(TEMPLATE_PATH . "/img/logo.svg"); ?>
	</a> <!-- End .logo -->

	<?php get_template_part('partials/navigation', 'primary'); ?>

	<button class="header__search js-toggle js-magnet js-cursor-hover" data-toggle-target=".search" data-toggle-class-name="is-search-open">
		<?php ground_icon( 'search'); ?>
	</button> <!-- End .navicon -->

	<?php get_template_part('partials/woocommerce/minicart'); ?>

	<button class="navicon js-toggle" data-toggle-target="body" data-toggle-class-name="is-navigation-open">
		<i class="navicon__icon"></i>
	</button> <!-- End .navicon -->

</header> <!-- End .header -->