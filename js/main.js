/*  ==========================================================================
	Author: Fabio Quarantini - @febba
	==========================================================================  */

$.noConflict();

jQuery(document).ready(function($) {

	var siteInit = {

		DOMready: function() {

			if ($('.gallery-icon').length > 0) {
				siteInit.modalGallery();
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
				rel:'gallery',
				className: "colorbox-gallery"
			});

		}

	};

	siteInit.DOMready();

});