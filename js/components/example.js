
import * as deepmerge from 'deepmerge';
import { gsap } from 'gsap';
import AbstractComponent from './abstractComponent';

export default class Example extends AbstractComponent {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(options);
		this.element = element || '.js-example';
		this.defaults = {
			triggers: this.element,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
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
		this.DOM.child = document.querySelectorAll('.js-test-child');
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		this.example = 'Example';

		[...document.querySelectorAll(triggers)].forEach((element) => {
			element.addEventListener('mouseenter', () => { this.myAnimation(); });
		});
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		target.addEventListener('mouseenter', () => { this.myAnimation(); });
	}

	/**
	 * my Animation
	*/
	myAnimation() {
		console.log(this.example);

		// Animation
		const timelineExample = gsap.timeline({ delay: 0 });

		timelineExample
			.fromTo(this.DOM.element, { opacity: 1 }, { duration: 0.5, opacity: 0.2 })
			.fromTo(this.DOM.child, { scale: 1 }, { duration: 0.5, scale: 3 });
	}
}
