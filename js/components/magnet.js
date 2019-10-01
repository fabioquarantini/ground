/**
 * Magnet module
 * Mouse interactions
 */

import TweenMax from 'gsap/TweenMax';
import AbstractComponent from './abstractComponent';

const Deepmerge = require('deepmerge');

export default class Magnet extends AbstractComponent {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(options);
		this.element = element || '.js-magnet';
		this.defaults = {
			triggers: this.element,
		};
		this.options = options ? Deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

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
		[...document.querySelectorAll(triggers)].forEach((magnet) => {
			magnet.addEventListener('mousemove', this.moveMagnet);
			magnet.addEventListener('mouseout', (event) => {
				if (magnet.classList.contains('is-magnet')) {
					magnet.classList.remove('is-magnet');
				}

				TweenMax.to(event.currentTarget, 0.4, { x: 0, y: 0, ease: Back.easeOut });
			});
		});
	}


	/**
	 * Update events
	 * @param {string} target - New selector
	 */
	updateEvents(target) {
		target.addEventListener('mousemove', this.moveMagnet);
		target.addEventListener('mouseout', (event) => {
			if (target.classList.contains('is-magnet')) {
				target.classList.remove('is-magnet');
			}

			TweenMax.to(event.currentTarget, 0.4, { x: 0, y: 0, ease: Back.easeOut });
		});
	}


	/**
	 * moveMagnet
	*/
	moveMagnet(event) {
		const magnetButton = event.currentTarget;
		const bounding = magnetButton.getBoundingClientRect();

		if (!magnetButton.classList.contains('is-magnet')) {
			magnetButton.classList.add('is-magnet');
		}
		// console.log(magnetButton, bounding)

		TweenMax.to(magnetButton, 1, {
			x: (((event.clientX - bounding.left) / magnetButton.offsetWidth) - 0.5) * 70,
			y: (((event.clientY - bounding.top) / magnetButton.offsetHeight) - 0.5) * 70,
			ease: Power4.easeOut,
		});

		// magnetButton.style.transform = 'translate(' + (((( event.clientX - bounding.left)/(magnetButton.offsetWidth))) - 0.5) * strength + 'px,'+ (((( event.clientY - bounding.top)/(magnetButton.offsetHeight))) - 0.5) * strength + 'px)';
	}
}
