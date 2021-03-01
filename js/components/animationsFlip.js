import Utilities from '../utilities/utilities';
import * as deepmerge from 'deepmerge';
import { gsap } from 'gsap';
import { Flip } from 'gsap/Flip';
import { Draggable } from 'gsap/Draggable';

gsap.registerPlugin(Flip, Draggable);

export default class AnimationsFlip {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '[data-flip]';
		this.defaults = {
			triggers: this.element,
		};
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

		window.addEventListener('DOMContentLoaded', () => {});

		window.addEventListener('NAVIGATE_OUT', () => {});

		window.addEventListener('NAVIGATE_IN', () => {});

		window.addEventListener('NAVIGATE_END', () => {});

		window.addEventListener('LOADER_COMPLETE', () => {
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

		gsap.utils.toArray(triggers).forEach((element) => {
			this.defaultAnimation(element);
		});
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		this.defaultAnimation(element);
	}

	/**
	 * default Animation
	*/
	defaultAnimation(item) {

        const flipFrom = item.querySelector("[data-flip-from]");
		const flipTo = item.querySelector("[data-flip-to]");
		const flipItem = item.querySelector("[data-flip-item]");
		const flipTrigger = item.querySelector("[data-flip-trigger]");

		Draggable.create(flipFrom);
		Draggable.create(flipTo);

		flipTrigger.addEventListener("click", () => {
			
			const state = Flip.getState(flipItem);
			
			flipItem.classList.toggle("active");

			if (flipItem.parentElement === flipFrom) {
				flipTo.appendChild(flipItem);
			} else {
				flipFrom.appendChild(flipItem);
			}
			
			Flip.from(state, {
				duration: 0.6,
				scale: true,
				absolute: true,
				ease: "power3.inOut"
			});
		});


	}

}
