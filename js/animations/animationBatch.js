/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default class animationBatch {
	constructor() {
		this.element = '[data-scroll="js-batch"]';
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
		const target = item.querySelectorAll('[data-scroll-target]');

		// gsap.set(target, { y: 100, opacity: 0 });

		ScrollTrigger.batch(target, {
			interval: 0.1, // time window (in seconds) for batching to occur.
			batchMax: 3, // maximum batch size (targets)
			onEnter: (batch) => gsap.to(batch, { autoAlpha: 1, stagger: 0.1, overwrite: true }),
			onLeave: (batch) => gsap.set(batch, { autoAlpha: 0, overwrite: true }),
			onEnterBack: (batch) => gsap.to(batch, { autoAlpha: 1, stagger: 0.1, overwrite: true }),
			onLeaveBack: (batch) => gsap.set(batch, { autoAlpha: 0, overwrite: true })
		});
		// ScrollTrigger.addEventListener('refreshInit', () =>
		// 	gsap.set(target, { y: 0 })
		// )
	}
}
