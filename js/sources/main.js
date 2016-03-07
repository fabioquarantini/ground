'use strict';

jQuery.noConflict();

jQuery( document ).ready( function( $ ) {

	var siteInit = {

		DOMready: function() {

			if ( $('.js-slider--primary').length > 0 ) {
				siteInit.slider();
			}

			if ( $('[href$=".jpg"], [href$=".png"], [href$=".gif"]').length > 0 ) {
				siteInit.modal();
			}

			if ( $('.js-navicon').length > 0 ) {
				siteInit.mobileMenu();
			}

		},

		// Slider
		slider: function() {

			$(".js-slider--primary").slick({
				dots: true,
				speed: 500
			});

		},

		// Modal
		modal: function() {

			$('[href$=".jpg"], [href$=".png"], [href$=".gif"]').colorbox({
				transition: 'elastic',
				speed: 400,
				opacity: 0.8,
				slideshow: true,
				slideshowSpeed: 4000,
				itemsnitialWidth: 50,
				initialHeight: 50,
				maxWidth: '90%',
				maxHeight: '90%',
			});

		},

		// Mobile menu
		mobileMenu: function() {

			$('body').on( 'click', '.js-navicon', function() {
				$(this).toggleClass('navicon--active');
				$('.navigation--primary').toggleClass('navigation--open');
			});

		}

	};

	siteInit.DOMready();

});
