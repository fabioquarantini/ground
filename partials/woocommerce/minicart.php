<?php if ( class_exists( 'WooCommerce' ) ) : ?>

	<div class="minicart">
		<?php
		echo ground_overlay_panel(
			'minicart',
			get_the_widget( 'WC_Widget_Cart', 'title=Prodotti nel carrello&hide_if_empty=1' ),
			'right'
		);
		?>
	</div>

<?php endif; ?>
