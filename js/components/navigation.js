import Highway from '@dogstudio/highway';
import Quicklink from 'quicklink/dist/quicklink.mjs';
import Dispatcher from '../utilities/dispatcher.js';
import Reveal from '../transitions/reveal.js';
import Debug from '../utilities/debug.js';

export default class Navigation {
	constructor() {
		window.addEventListener('DOMContentLoaded', this.init());
	}

	init() {
		this.H = new Highway.Core({
			transitions: {
				default: Reveal
			}
		});

		this.H.on('NAVIGATE_IN', (data) => {
			this.navigateIn(data);
		});

		this.H.on('NAVIGATE_OUT', (data) => {
			this.navigateOut(data);
		});

		this.H.on('NAVIGATE_END', (data) => {
			this.navigateEnd(data);
		});
	}

	navigateIn(data) {
		Dispatcher.trigger('NAVIGATE_IN', data);

		$('.navigation__item').each(function(index) {
			var currentHref = $(this)
				.find('a')
				.attr('href');

			$(this).removeClass('is-active');

			if (currentHref === location.href) {
				$(this).addClass('is-active');
			}
		});
	}

	navigateOut(data) {
		Dispatcher.trigger('NAVIGATE_OUT', data);
	}

	navigateEnd(data) {
		Dispatcher.trigger('NAVIGATE_END', data);

		// Prefetch
		Quicklink({
			el: data.to.view
		});
	}
}