'use strict';

var currentLanguage = $('html').attr('lang');
var siteUrl = $('body').data('site-url');
var templateUrl = $('body').data('template-url');

$(document).ready(function() {

	siteInit.slider();
	siteInit.modal();
	siteInit.toggleClass();
	siteInit.infiniteScroll();

});

$(window).on('load', function() {
	// Load function
});

// Detect when background images have loaded, in addition to <img>s
$('body').imagesLoaded({ background: true }, function() {

	$('body').addClass('is-loaded');
	siteInit.loaderPage();

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

		var groundSwiper = new Swiper($el, {
			direction: 'horizontal',
			loop: true,
			effect: 'slide',
			autoHeight: false,
			parallax: true,
			autoplay: {
				delay: 3000
			},
			pagination: {
				el: '.swiper-pagination'
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev'
			},
			slidesPerView: 1,
			spaceBetween: 0,
			breakpoints: {
				// when window width is <= 320px
				320: {
					slidesPerView: 1
				},
				992: {
					slidesPerView: 3
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

	// Loader
	loaderPage: function() {

		var $el = $('.js-loader-page');

		if ($el.length == 0) {

			return;

		}

		$el.fadeOut();

	},

	// Infinite scroll
	infiniteScroll: function() {

		var $el = $('.js-next-page');

		if ($el.length == 0) {

			return;

		}

		$('.js-infinite-container').infiniteScroll({
			path: '.js-next-page',
			append: '.js-infinite-post',
			history: false,
			scrollThreshold: 400,
			hideNav: '.pagination',
			status: '.js-infinite-status'
		});

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

	},

	// Utility
	utility: {
		isTouch: function() {

			if ('ontouchstart' in window || (window.DocumentTouch && document instanceof DocumentTouch)) {

				return true;

			}

		}
	}
};
