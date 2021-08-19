const isMobile = require('ismobilejs');

export default class ScrollDirection {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		window.addEventListener('DOMContentLoaded', () => {
			this.initEvents();
		});
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents() {
		if (isMobile.any) {
			return;
		}
		// Initial state
		let scrollPos = 0;
		// adding scroll event
		window.addEventListener('scroll', () => {
			if (scrollPos < -96) {
				// detects new state and compares it with the new one
				if (document.body.getBoundingClientRect().top > scrollPos) {
					if (document.documentElement.classList.contains('scroll-direction-down')) {
						document.documentElement.classList.replace('scroll-direction-down', 'scroll-direction-up');
					} else {
						document.documentElement.classList.add('scroll-direction-up');
					}
				} else if (document.documentElement.classList.contains('scroll-direction-up')) {
					document.documentElement.classList.replace('scroll-direction-up', 'scroll-direction-down');
				} else {
					document.documentElement.classList.add('scroll-direction-down');
				}
				document.documentElement.classList.add('body-scrolled');
			} else {
				if (document.documentElement.classList.contains('body-scrolled')) {
					document.documentElement.classList.remove('body-scrolled');
				}
			}
			// saves the new position for iteration.
			scrollPos = document.body.getBoundingClientRect().top;
		});
	}
}
