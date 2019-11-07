import * as deepmerge from 'deepmerge';
import AbstractComponent from './abstractComponent';

export default class ContactForm extends AbstractComponent {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(options);
		this.element = element || '.wpcf7-form';
		this.defaults = {
			triggers: this.element,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			super.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	/**
	 * Init
	 */
	init() {
		this.DOM = {
			element: document.querySelectorAll(this.element),
		};
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
