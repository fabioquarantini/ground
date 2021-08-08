<?php
    $count = WC()->cart->get_cart_contents_count();
    $class = '';

    if ($count === 0) {
        $class = 'is-empty ';
    } else {
        $class = 'is-full js-toggle';
    }
?>

<a class="minicart__contents <?php echo $class; ?>" data-toggle-target="html" data-toggle-class-name="is-minicart-open" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">

    <div class="flex justify-start space-x-3">
        <?php ground_icon( 'shopping-cart', 'minicart__icon' ); ?>
        <?php _e( 'Cart', 'ground' ); ?>
    </div>

    <div class="minicart__subtotal">
        <?php echo wp_kses_post( WC()->cart->get_cart_subtotal() ); ?>
    </div>

    <div class="minicart__count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>

    <div class="minicart__count-label">
        <?php /* translators: %d: number of items in cart */ ?>
        <?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?>
    </div>

</a>