/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default class animationComparison {
	constructor() {
		this.element = '[data-scroll="js-comparison"]';
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
		const target = item.querySelector('[data-scroll-target]');
		const targetMedia = item.querySelectorAll('[data-scroll-target-media]');
		const targetImage = item.querySelectorAll('[data-scroll-target-media] img');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: () => `+=${target.offsetWidth}`,
				scrub: targetScrub || false,
				pin: true,
				pinReparent: true,
				anticipatePin: 1
			},
			defaults: { ease: 'none' }
		});

		tl.fromTo(targetMedia, { xPercent: 100, x: 0 }, { xPercent: 0 }).fromTo(
			targetImage,
			{ xPercent: -100, x: 0 },
			{ xPercent: 0 },
			0
		);
	}
}
