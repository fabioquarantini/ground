<style type="text/css">
	:root {
		<?php if ( defined( 'GROUND_COLOR_PRIMARY' ) && GROUND_COLOR_PRIMARY ) {
			echo '--ground-color-primary:' . GROUND_COLOR_PRIMARY . ';';
		};
		if ( defined( 'GROUND_COLOR_SECONDARY' ) && GROUND_COLOR_SECONDARY ) {
			echo '--ground-color-secondary:' . GROUND_COLOR_SECONDARY . ';';
		};
		if ( defined( 'GROUND_FONT_PRIMARY_NAME' ) && GROUND_FONT_PRIMARY_NAME ) {
			echo '--ground-font-primary:' . GROUND_FONT_PRIMARY_NAME . ';';
		};
		if ( defined( 'GROUND_FONT_SECONDARY_NAME' ) && GROUND_FONT_SECONDARY_NAME ) {
			echo '--ground-font-secondary:' . GROUND_FONT_SECONDARY_NAME . ';';
		};
		if ( defined( 'GROUND_ROUNDED' ) && GROUND_ROUNDED ) {
			echo '--ground-rounded-theme:' . GROUND_ROUNDED . 'px;';
		};
		?>
	}
</style>
