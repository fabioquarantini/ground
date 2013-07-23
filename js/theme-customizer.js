(function($) {

	/* Live renaming blog name */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '#site-title' ).text( to );
		} );
	} );

	/* Live renaming blog description */
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '#site-description' ).text( to );
		} );
	} );

})(jQuery);