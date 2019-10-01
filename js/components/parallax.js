/**
 * Parallax module
 * @see https://dixonandmoe.com/rellax/
 */
import Rellax from 'rellax';
import * as deepmerge from 'deepmerge';

export default class Split {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.js-parallax';
		this.defaults = {
			speed: -2,
			center: false,
			wrapper: null,
			round: true,
			vertical: true,
			horizontal: false,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			this.init();
		});
	}

	/**
	 * Initialize plugin
	 */
	init() {
		if (document.querySelectorAll(this.element).length === 0) {
			return;
		}

		this.parallax = new Rellax(this.element, this.options);
	}

	/**
	 * Refresh
	 * Destroy and create again parallax with previous settings
	 */
	refresh() {
		if (this.parallax === undefined) {
			return;
		}
		this.parallax.refresh();
	}

	/**
	 * Destroy
	 * End Rellax and reset parallax elements to their original positions
	 */
	destroy() {
		if (this.parallax === undefined) {
			return;
		}
		this.parallax.destroy();
	}
}
