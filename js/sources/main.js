'use strict';

var currentLanguage = $('html').attr('lang');
var siteUrl = $('body').data('site-url');
var templateUrl = $('body').data('template-url');

$(document).ready(function() {

	siteInit.slider();
	siteInit.modal();
	siteInit.toggleClass();

});

$(window).on('load', function() {
	// Load function
});

$(window).scroll(function() {
	// Scroll function
});

$(window).resize(function() {

	if (window.matchMedia('(min-width: 992px)').matches) {
		// The viewport is at least 992 pixels wide
	}

});

var siteInit = {
	// Slider
	slider: function() {

		var $el = $('.js-slider');

		if ($el.length == 0) {

			return;

		}

		$el.owlCarousel({
			loop: false,
			dots: true,
			margin: 0,
			center: false,
			autoHeight: false,
			stagePadding: 0,
			responsiveClass: true,
			responsive: {
				0: {
					autoplay: true,
					nav: false,
					items: 1,
					dots: true
				},
				992: {
					items: 1,
					nav: true,
					dots: false
				}
			}
		});

	},

	// Modal
	modal: function() {

		var $el = $('[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]');

		if ($el.length == 0) {

			return;

		}

		$el.fancybox();

	},

	// Toggle class
	toggleClass: function() {

		var elName = '.js-toggle-class';
		var $el = $(elName);

		if ($el.length == 0) {

			return;

		}

		$('body').on('click', elName, function(event) {

			event.preventDefault();
			var $elCliked = $(this);
			var toggleClassName = 'is-active';

			// Add data-toggle-class-name="customclass" to change the default class name
			if ($elCliked.attr('data-toggle-class-name')) {

				toggleClassName = $elCliked.data('toggle-class-name');

			}

			// Add data-toggle-class-selector="selector1 selector2" to toggle class on different tag
			if ($elCliked.attr('data-toggle-class-selector')) {

				var toggleClassSelector = $elCliked.data('toggle-class-selector');
				var obj = toggleClassSelector.split(' ');

				$.each(obj, function(index, value) {

					$('.' + value).toggleClass(toggleClassName);

				});

			} else {

				$elCliked.toggleClass(toggleClassName);

			}

		});

	}
};
