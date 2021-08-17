import * as deepmerge from 'deepmerge';

export default class Cart {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.minicart';
		this.defaults = {
			triggers: this.element
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});
	}

	/**
	 * Init
	 */
	init() {
		this.DOM = {
			element: document.querySelectorAll(this.element)
		};

		jQuery('body').on('added_to_cart', function (e, fragments, cart_hash, this_button) {
			jQuery('#minicart, html').addClass('is-overlay-panel-open');
		});
	}
}
