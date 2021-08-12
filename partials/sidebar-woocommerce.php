<div class="sidebar sidebar--woocommerce">

	<div class="sidebar__body">
		<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'sidebar-woocommerce' ) ) :
endif; ?>
	</div>

	
	<div class="sidebar__footer">
		<button class="sidebar__button button js-toggle" data-toggle-target=".sidebar" data-toggle-class-name="is-sidebar-open">
			Chiudi
		</button>
	</div>

</div> <!-- End .sidebar -->
