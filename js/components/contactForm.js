import Utilities from '../utilities/utilities';
import * as deepmerge from 'deepmerge';

export default class ContactForm {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.wpcf7-form';
		this.defaults = {
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
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		this.renitializeForm(target);
	}

	/**
	 * renitializeForm
	 * @param {Object} target - Form selector
	 */
	renitializeForm(target) {
		if (this.DOM.length === 0) {
			return;
		}

		// register all the necessary events on the Contact Form 7 form
		wpcf7.initForm(target);

		// register all the necessary events for the conditional logic to work
		// wpcf7cf.initForm(target);
	}
}
