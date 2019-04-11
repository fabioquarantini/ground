<?php if (class_exists('WooCommerce')) :
	$count = WC()->cart->cart_contents_count; ?>
	<div class="minicart">
		<div class="minicart__preview">
			<?php // When link markup is updated also update ground_woocommerce_add_to_cart_fragment() in woocommerce.php ?>
			<a class="minicart__link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'ground' ); ?>">
				<i class="minicart__icon icon-cart"></i>
				<?php if ( $count > 0 ) { ?>
					<span class="minicart__count small"><?php echo esc_html( $count ); ?></span>
				<?php }
				// Total price: echo wp_kses_post( WC()->cart->get_cart_subtotal() );
				// Total count: echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'ground' ), WC()->cart->get_cart_contents_count() ) ); ?>
			</a>
		</div>
		<div class="minicart__content">
			<div class="widget_shopping_cart_content"><?php woocommerce_mini_cart();?></div>
		</div>
	</div>
<?php endif; ?>