<?php if ( GROUND_LOGO_URL_PRIMARY || GROUND_LOGO_SOURCE_PRIMARY ) { ?>
	<a class="logo logo--primary js-cursor-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ); ?>">
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
