<header class="header">

    <a class="logo js-cursor-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>">
        <?php /* <img class="logo__img" src="<?php echo TEMPLATE_URL ?>/img/logo.svg" alt="<?php bloginfo('name'); ?>" /> */ ?>
        <?php echo file_get_contents(TEMPLATE_PATH ."/img/logo.svg"); ?>
    </a> <!-- End .logo -->

    <?php get_template_part( 'partials/navigation', 'primary' ); ?>

    <button class="header__search js-toggle js-magnet" data-toggle-target=".search" data-toggle-class-name="is-search-open">
        <i class="icon-magnifying-glass"></i>
    </button> <!-- End .navicon -->

    <?php get_template_part( 'partials/woocommerce/minicart' ); ?>

    <button class="navicon js-toggle" data-toggle-target="body" data-toggle-class-name="is-navigation-open">
        <i class="navicon__icon"></i>
    </button> <!-- End .navicon -->

</header> <!-- End .header -->