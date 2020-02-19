/**
 * Scroll Update module
 */
import Dispatcher from '../utilities/dispatcher';
import AbstractComponent from './abstractComponent';

const Deepmerge = require('deepmerge');

export default class ScrollUpdate extends AbstractComponent {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(element, options);
		this.element = element || '.js-scroll-update';
		this.defaults = {
			triggers: this.element,
		};
		this.options = options ? Deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);
		this.scrollUpdate = this.scrollUpdate.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
			super.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	init() {
		this.DOM = {
			element: document.querySelectorAll(this.element),
		};
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		const elements = document.querySelectorAll(triggers);
		for (let i = 0; i < elements.length; i++) {
			elements[i].addEventListener('click', this.scrollUpdate);
		}
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		target.addEventListener('click', this.scrollUpdate);
	}

	/**
	 * scrollUpdate classes
	 * @param {Object} event
	 */
	scrollUpdate(event) {
		this.DOM.element = document.querySelectorAll(this.element);

		if (this.DOM.element.length === 0) {
			return;
		}

		Dispatcher.trigger('SCROLL_UPDATE');
	}
}
