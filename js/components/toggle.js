/**
 * Toggle module
 */
import { initObserver } from '../utilities/observer';
const Deepmerge = require('deepmerge');

export default class Toggle {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.js-toggle';
		this.defaults = {
			triggers: this.element,
			toggleClassName: 'is-active'
		};
		this.DOM = {
			html: document.documentElement,
			body: document.body
		};
		this.options = options ? Deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);
		this.toggle = this.toggle.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
			initObserver(this.options.triggers, this.updateEvents);
		});
	}

	init() {
		this.DOM.element = document.querySelectorAll(this.element);
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		const elements = document.querySelectorAll(triggers);
		for (let i = 0; i < elements.length; i++) {
			elements[i].addEventListener('click', this.toggle);
		}
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		target.addEventListener('click', this.toggle);
	}

	/**
	 * Toggle classes
	 * @param {Object} event
	 */
	toggle(event) {
		this.DOM.element = document.querySelectorAll(this.element);

		if (this.DOM.element.length === 0) {
			return;
		}

		const curent = event.currentTarget;
		if (curent) {
			// Add data-toggle-prevent-default="false" to restore default behaviour
			if (!curent.hasAttribute('data-toggle-prevent-default')) {
				event.preventDefault();
			}

			// Add data-toggle-class-name="customclass" to change the default class name
			if (curent.hasAttribute('data-toggle-class-name')) {
				this.options.toggleClassName = curent.dataset.toggleClassName;
			}

			// Add data-toggle-target=".selector1 #selector2" to toggle different target
			if (curent.hasAttribute('data-toggle-target')) {
				const targetList = curent.dataset.toggleTarget.split(' ');

				for (let i = 0; i < targetList.length; i++) {
					const target = document.querySelectorAll(targetList[i]);

					for (let ib = 0; ib < target.length; ib++) {
						target[ib].classList.toggle(this.options.toggleClassName);
					}
				}
			} else {
				curent.classList.toggle(this.options.toggleClassName);
			}
		}
	}
}
