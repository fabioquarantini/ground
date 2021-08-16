<div class="panel panel--primary">
	<div class="js-toggle js-close-overview-panel panel panel__overview overview-panel" data-toggle-target="html" data-toggle-class-name="is-all-products-open"></div>

	<div class="panel panel__body">
		<div class="js-toggle js-close-panel panel panel__close" data-toggle-target="html" data-toggle-class-name="is-all-products-open">
			<?php ground_icon( 'close' ); ?>
		</div>

		<div class="inline-block mt-8 mb-12 ml-8">
			<?php if ( GROUND_LOGO_URL_PRIMARY || GROUND_LOGO_SOURCE_PRIMARY ) { ?>
			<a class="js-cursor-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
				<?php
				if ( GROUND_LOGO_TYPE_PRIMARY && GROUND_LOGO_SOURCE_PRIMARY ) {
					echo GROUND_LOGO_SOURCE_PRIMARY;
				} elseif ( GROUND_LOGO_URL_PRIMARY ) {
					?>
					<img class="w-20 h-auto" src="<?php echo esc_url( GROUND_LOGO_URL_PRIMARY['sizes']['medium'] ); ?>" alt="<?php echo esc_attr( GROUND_LOGO_URL_PRIMARY['alt'] ); ?>" />
				<?php } ?>
			</a>
			<?php } else { ?>
				<a class="border border-dashed border-primary p-2" target="_blank" href="<?php echo admin_url( 'admin.php?page=theme-general-settings', 'http' ); ?>">Upload your logo</a>
			<?php } ?>
		</div>
		<a class="js-back block ml-6 mb-6 header__back cursor-pointer"> <span> <?php ground_icon( 'chevron-left', 'text-black dark:text-white' ); ?> </span> <?php _e( 'Indietro', 'ground' ); ?> </a>


		<?php get_template_part( 'partials/navigation', 'panel-primary' ); ?>


	</div>
</div>
