/**
 * Split module
 * Splitting text, grids, images and more!
 * @see https://splitting.js.org
 */

import Utilities from '../utilities/utilities';
import * as deepmerge from 'deepmerge';
import Splitting from 'splitting';


export default class Split {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '[data-splitting]';
		this.defaults = {
			by: 'chars', // String of the plugin name
			key: null, // Optional String to prefix the CSS variables
			triggers: this.element,
		};
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
			Utilities.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	/**
	 * Init
	 */
	init() {
		this.DOM.element = document.querySelectorAll(this.element);
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		this.splitText(triggers);
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		this.splitText(target);
	}

	/**
     * my Animation
    */
	splitText() {
		Splitting(this.options);
	}
}
