<?php
	$count = WC()->cart->get_cart_contents_count();
	$class = '';

if ( $count === 0 ) {
	$class = 'is-empty ';
} else {
	$class = 'is-full js-toggle';
}
?>

<a class="minicart__contents <?php echo $class; ?> text-black hover:text-primary" data-toggle-target="#minicart html" data-toggle-class-name="is-overlay-panel-open" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">

	<div class="minicart__link">
		<span><?php _e( 'Cart', 'ground' ); ?></span>
		<?php ground_icon( 'shopping-cart', 'minicart__icon' ); ?>
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
