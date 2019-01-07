import Highway from '@dogstudio/highway';
import quicklink from 'quicklink/dist/quicklink.mjs';
import basic from '../transitions/basic.js';
import fade from '../transitions/fade.js';
import overlap from '../transitions/overlap.js';

const H = new Highway.Core({
	transitions: {
		default: fade
	}
});

H.on('NAVIGATE_IN', (to, location) => {
	//TODO: creare evento js puro
	$(document).trigger('NAVIGATE_IN');

	$('.navigation__item').each(function(index) {
		var currentHref = $(this)
			.find('a')
			.attr('href');

		$(this).removeClass('is-active');

		if (currentHref === location.href) {
			$(this).addClass('is-active');
		}
	});
});

// Listen the `NAVIGATE_END` event
H.on('NAVIGATE_END', (from, to, location) => {
	// Enable prefetch
	quicklink();

	//TODO: Uniformare con la funzione nel push
	// Update Analytics
	if (typeof gtag !== 'undefined') {
		gtag('config', 'UA-XXXXXXXXX-X', {
			'page_path': location.pathname,
			'page_title': to.properties.page.title,
			'page_location': location.href
		});
	}
});
