'use strict';

jQuery.noConflict();

jQuery( document ).ready( function( $ ) {

	var siteInit = {

		DOMready: function() {

			if ( $('.slider--primary').length > 0 ) {
				siteInit.carousel();
			}

			if ( $('[rel="gallery"]').length > 0 ) {
				siteInit.modalGallery();
			}

			if ( $('[href$=".jpg"], [href$=".png"], [href$=".gif"]').length > 0 ) {
				siteInit.modal();
			}

			if ( $('.navicon').length > 0 ) {
				siteInit.mobileMenu();
			}

		},

		// Carousel
		carousel: function() {

			$(".slider--primary").slick({
				dots: true,
				speed: 500
			});

		},

		// Modal image gallery
		modalGallery: function() {

			$('[rel="gallery"]').colorbox({
				transition: 'elastic',
				speed: 400,
				opacity: 0.8,
				slideshow: true,
				slideshowSpeed: 4000,
				initialWidth: 50,
				initialHeight: 50,
				maxWidth: '90%',
				maxHeight: '90%',
				rel:'gallery'
			});

		},

		// Modal
		modal: function() {

			$('[href$=".jpg"], [href$=".png"], [href$=".gif"]').colorbox({
				transition: 'elastic',
				speed: 400,
				opacity: 0.8,
				itemsnitialWidth: 50,
				initialHeight: 50,
				maxWidth: '90%',
				maxHeight: '90%',
			});

		},

		// Mobile menu
		mobileMenu: function() {

			$('body').on( 'click', '.navicon', function() {
				$('body').toggleClass('navigation--open');
			});

		}

	};

	siteInit.DOMready();

});
