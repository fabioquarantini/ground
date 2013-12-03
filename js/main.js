/*  ==========================================================================
	Main scripts
	==========================================================================  */

jQuery.noConflict();

jQuery(document).ready(function($) {

	var siteInit = {

		DOMready: function() {

			if ($('.gallery-icon').length > 0) {
				siteInit.modalGallery();
			}

			if ($('.flexslider').length > 0) {
				siteInit.slider();
			}

		},


		/* Colorbox image gallery */

		modalGallery: function() {

			$(".gallery-icon").find("[href$='.jpg'], [href$='.png'], [href$='.gif']").colorbox({
				transition: "elastic",
				speed: 400,
				opacity: 0.6,
				slideshow: true,
				slideshowSpeed: 4000,
				initialWidth: 50,
				initialHeight: 50,
				maxWidth: "90%",
				maxHeight: "90%",
				rel:'gallery',
				className: "colorbox-gallery"
			});

		},


		/* FlexSlider */

		slider: function() {

			$('.flexslider').flexslider({
				animation: "slide",
				slideshow: true,
				slideshowSpeed: 7000,
				controlNav: true,
				directionNav: true,
				animationSpeed: 600
			});

		}

	};

	siteInit.DOMready();

});