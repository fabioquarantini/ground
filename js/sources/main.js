'use strict';

var currentLanguage = $('html').attr('lang');
var siteUrl = $('body').data('site-url');
var templateUrl = $('body').data('template-url');

$(document).ready(function() {

	siteInit.slider();
	siteInit.modal();
	siteInit.toggleClass();
	siteInit.infiniteScroll();
	siteInit.parallax();

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

		$el.fancybox({
			loop: true,
			keyboard: true,
			arrows: true,
			infobar: true,
			clickOutside: 'close',
			transitionEffect: 'slide',
			hash: false,
			wheel: false,
			buttons: [
				//"zoom",
				//"share",
				//"slideShow",
				//"fullScreen",
				//"download",
				//"thumbs",
				'close'
			],
			clickContent: false,
			clickSlide: false,
			onActivate: function() {

				$('html').addClass('overflow-hidden');

			},
			beforeClose: function() {

				$('html').removeClass('overflow-hidden');

			},
			beforeShow: function(instance, slide) {

				var $navigation = $('.fancybox-navigation');
				var $navigationButtons = $navigation.find('.fancybox-button');
				var $navigationButtonLeft = $navigation.find('.fancybox-button--arrow_left');
				var $navigationButtonRight = $navigation.find('.fancybox-button--arrow_right');
				var navigationHeight = $navigationButtons.height();
				var $toolbar = $('.fancybox-toolbar');
				var toolbarHeight = $toolbar.height();
				var toolbarWidth = $toolbar.width();
				var $container = $('.fancybox-container');
				var containerHeight = $container.height();
				var containerWidth = $container.width();
				var scrollTop = $(window).scrollTop();

				$container.addClass('modal--follow-mouse');
				$navigationButtons.removeAttr('title');

				setTimeout(function() {

					$navigationButtons.blur();

				}, 400);

				$container.on('mousemove', function(e) {

					$navigationButtons.each(function() {

						$(this).css({
							left: e.pageX,
							top: e.pageY - scrollTop
						});

					});

					if (e.pageY - scrollTop < toolbarHeight && e.pageX > containerWidth - toolbarWidth) {

						$navigationButtons.hide();

					} else if (e.pageX < containerWidth / 2) {

						$navigationButtonLeft.show();
						$navigationButtonRight.hide();

					} else {

						$navigationButtonLeft.hide();
						$navigationButtonRight.show();

					}

				});

			}
		});

	},

	// Loader
	loaderPage: function() {

		var $el = $('.js-loader-page');

		if ($el.length == 0) {

			return;

		}

		$el.fadeOut();

	},

	// Parallax
	parallax: function() {

		var $el = $('.js-parallax');

		if ($el.length == 0) {

			return;

		}

		var scene;
		var controller = new ScrollMagic.Controller();

		$el.each(function(index, el) {

			var $selector = $(el);
			var from = $selector.data('parallax-from') || '0';
			var to = $selector.data('parallax-to') || '0';
			var duration = $selector.data('parallax-duration') || '200%';
			var triggerHook = $selector.data('parallax-trigger-hook') || 'onEnter';
			var timeLine = new TimelineMax();

			scene = new ScrollMagic.Scene({
				duration: duration,
				triggerElement: el,
				triggerHook: triggerHook,
				reverse: true,
				loglevel: 2
			}).addTo(controller);

			// Timeline GSAP
			timeLine.fromTo(
				$selector,
				1,
				{
					y: from,
					force3D: true
				},
				{
					y: to,
					force3D: true,
					ease: Linear.easeNone
				}
			);
			scene.setTween(timeLine);

			// Add "class" to an element during a scene
			scene.setClassToggle(el, 'is-in-scene');

			// Pin element for the duration of scene
			//scene.setPin('.js-parallax-pin');

			// Class will remain on element outside of scene
			//scene.removeClassToggle(false);

			// Debug (enable script in head-output.php)
			// scene.addIndicators({
			// 	name: "Indicator"
			// })

		});

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
