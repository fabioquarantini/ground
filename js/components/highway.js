import Highway from '@dogstudio/highway';
import quicklink from 'quicklink/dist/quicklink.mjs';
import dispatcher from '../utilities/dispatcher.js';
import basic from '../transitions/basic.js';
import fade from '../transitions/fade.js';
import overlap from '../transitions/overlap.js';

const modalLinks = $('[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]');

const H = new Highway.Core({
	transitions: {
		default: fade
	}
});
for (let link of modalLinks) {
	link.removeEventListener('click', H._navigate);
}

H.on('NAVIGATE_IN', (to, location) => {
	dispatcher.trigger('NAVIGATE_IN', {
		to: to,
		location: location
	});

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

/**
 *
 */
H.on('NAVIGATE_OUT', (from, location) => {
	dispatcher.trigger('NAVIGATE_OUT', {
		from: from,
		location: location
	});
});

// Listen the `NAVIGATE_END` event
H.on('NAVIGATE_END', (from, to, location) => {
	dispatcher.trigger('NAVIGATE_END', {
		from: from,
		to: to,
		location: location
	});
	for (let link of modalLinks) {
		link.removeEventListener('click', H._navigate);
	}
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