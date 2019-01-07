import imagesLoaded from 'imagesLoaded';

$('body').imagesLoaded({ background: true }, function() {
	var $el = $('.js-loader-page');

	$('body').addClass('is-loaded');

	if ($el.length == 0) {
		return;
	}

	$el.fadeOut();
});
