/*  ==========================================================================
	Author: Fabio Quarantini - @febba
	==========================================================================  */

jQuery.noConflict();

jQuery(document).ready(function($) {

	var siteInit = {

		DOMready: function() {

			if ($('#publish').length > 0) {
				siteInit.manadatoryFields();
			}

		},


		/* Mandatory fields */

		manadatoryFields: function() {

			$('#publish').click(function(){
				//alert("cliccato");
			});

		}

	};

	siteInit.DOMready();

});