/**
 * Split module
 * Splitting text, grids, images and more!
 * @see https://splitting.js.org
 */
import Splitting from 'splitting';
import * as deepmerge from 'deepmerge';

export default class Split {
	/**
	 * @param {Object} options - User options
	 */
	constructor(options) {
		this.defaults = {
			target: '[data-splitting]', // String selector, Element, Array of Elements, or NodeList
			by: 'chars', // String of the plugin name
			key: null //Optional String to prefix the CSS variables
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});
		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});
	}

	init() {
		Splitting(this.options);
	}
}