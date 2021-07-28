<style type="text/css">
	:root {
		<?php if ( defined( 'COLOR_PRIMARY' ) && COLOR_PRIMARY ) {
			echo '--ground-color-primary:' . COLOR_PRIMARY . ';';
		};
		if ( defined( 'COLOR_SECONDARY' ) && COLOR_SECONDARY ) {
			echo '--ground-color-secondary:' . COLOR_SECONDARY . ';';
		};
		if ( defined( 'FONT_PRIMARY_NAME' ) && FONT_PRIMARY_NAME ) {
			echo '--ground-font-primary:' . FONT_PRIMARY_NAME . ';';
		};
		if ( defined( 'FONT_SECONDARY_NAME' ) && FONT_SECONDARY_NAME ) {
			echo '--ground-font-secondary:' . FONT_SECONDARY_NAME . ';';
		};
		if ( defined( 'ROUNDED_THEME' ) && ROUNDED_THEME ) {
			echo '--ground-rounded-theme:' . ROUNDED_THEME . 'px;';
		};
		?>
	}
</style>
