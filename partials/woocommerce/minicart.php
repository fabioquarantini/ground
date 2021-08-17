<?php if ( class_exists( 'WooCommerce' ) ) : ?>

	<div class="overlay-panel minicart js-minicart" id="minicart">
		<div class="overlay-panel__mask js-toggle" data-toggle-target="#minicart html" data-toggle-class-name="is-overlay-panel-open"></div>
		<div class="overlay-panel__body">
			<div class="overlay-panel__close js-toggle" data-toggle-target="#minicart html" data-toggle-class-name="is-overlay-panel-open">
				<?php ground_icon( 'close' ); ?>
			</div>
			<div class="overlay-panel__content">
				<?php the_widget( 'WC_Widget_Cart', 'title=Prodotti nel carrello&hide_if_empty=1' ); ?>
			</div>
		</div>
	</div>

<?php endif; ?>
