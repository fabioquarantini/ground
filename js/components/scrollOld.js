/**
 * 
 * 
 * @see https://scroll-out.github.io
 */
import ScrollOut from 'scroll-out';
import * as deepmerge from 'deepmerge';

export default class ScrollOld {
	/**
	 * @param {Object} options - User options
	 */
	constructor(options) {
		this.defaults = {
			once: false,
			targets: '[data-scroll]'
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_END', () => {
			this.init();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			this.update();
		});
	}

	/**
	 * Initialize plugin
	 */
	init() {

		document.body.classList.add('has-scroll-animation');
		this.scroll = ScrollOut(this.options);
		
	}

	/**
	 * Manually refresh the DOM
	 */
	update() {
		this.scroll.index();
	}

	/**
	 * Destroy a ScrollOut instance,
	 */
	destroy() {
		this.scroll.teardown();
	}
}