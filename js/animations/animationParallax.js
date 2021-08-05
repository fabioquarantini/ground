/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default class animationParallax {
	constructor() {
		this.element = '[data-scroll="js-parallax"]';
		this.DOM = {
			html: document.documentElement,
			body: document.body
		};
		this.options = { triggers: this.element };
		this.updateEvents = this.updateEvents.bind(this);
		window.addEventListener('DOMContentLoaded', () => {});
		window.addEventListener('LOADER_COMPLETE', () => {
			this.init();
			this.initEvents(this.options.triggers);
			initObserver(this.options.triggers, this.updateEvents);
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
			this.startAnimation(element);
		});
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		this.startAnimation(target);
	}

	/**
	 *  Start Animation
	 */
	startAnimation(item) {
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				toggleActions: 'play pause none none',
				scrub: targetScrub || 2
			}
		});

		tl.to(item, {
			y: -item.dataset.scrollSpeedY * 100 || 0,
			x: -item.dataset.scrollSpeedX * 100 || 0
		});
	}
}
