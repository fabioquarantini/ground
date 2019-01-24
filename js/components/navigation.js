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

		this.H.on('NAVIGATE_IN', ({to, trigger, location}) => {
			this.navigateIn({to, trigger, location});
		});

		this.H.on('NAVIGATE_OUT', ({from, trigger, location}) => {
			this.navigateOut({from, trigger, location});
		});

		this.H.on('NAVIGATE_END', ({to, from, trigger, location}) => {
			this.navigateEnd({to, from, trigger, location});
		});
	}

	navigateIn({to, trigger, location}) {
		Dispatcher.trigger('NAVIGATE_IN', {
			to: to,
			trigger: trigger,
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
	}

	navigateOut({from, trigger, location}) {
		Dispatcher.trigger('NAVIGATE_OUT', {
			from: from,
			trigger: trigger,
			location: location
		});
	}

	navigateEnd({to, from, trigger, location}) {
		Dispatcher.trigger('NAVIGATE_END', {
			to: to,
			from: from,
			trigger: trigger,
			location: location
		});

		// Prefetch
		Quicklink({
			el: to.view
		});
	}
}