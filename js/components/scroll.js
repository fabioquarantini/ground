/**
 * Scroll module
 * Detection of elements in viewport & smooth scrolling with parallax.
 * @see https://github.com/locomotivemtl/locomotive-scroll
 */

import LocomotiveScroll from 'locomotive-scroll';
import * as deepmerge from 'deepmerge';
import AbstractComponent from './abstractComponent';

const imagesLoaded = require('imagesloaded');


export default class Scroll extends AbstractComponent {
	/**
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(options);
		this.DOM = { element: document.getElementById('js-scroll') };
		this.DOM.body = document.body;
		this.DOM.scrollProgress = document.getElementById('js-scroll-progress');
		this.defaults = {
			el: this.DOM.element,
			triggers: '[data-scroll-to]',
			smooth: true,
			getSpeed: true,
			getDirection: true,
			smoothMobile: false,
			scrollbarClass: 'scrollbar',
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

		imagesLoaded(this.DOM.body, { background: true }, () => {
			this.init();
			super.initObserver(this.options.triggers, this.updateEvents);
		});

		window.addEventListener('SCROLL_UPDATE', () => {
			this.update();
		});

		window.addEventListener('NAVIGATE_OUT', () => {
			this.stop();
		});

		window.addEventListener('NAVIGATE_IN', () => {
			this.destroy();
		});

		window.addEventListener('NAVIGATE_END', () => {
			if (this.options.smooth) {
				this.reinitialize();
				this.progressBar();
				this.direction();
			} else {
				this.reinitialize();
			}
		});
	}

	init() {
		if (this.DOM.element.length === 0) {
			return;
		}

		setTimeout(() => {
			this.scroll = new LocomotiveScroll(this.options);
			this.progressBar();
			this.direction();
		}, 200);
	}

	/**
	 * Update events
	 * @param {string} target - New selector
	 */
	updateEvents(target) {
		// da riabilitare
		target.addEventListener('click', (event) => {
			const href = target.getAttribute('href');
			this.scrollTo(href);
		});
	}

	/**
	 * Scroll Progress Bar
	 */
	progressBar() {
		/**
		 * @param {Object} istance (delta, direction, limit, scroll, speed)
		 */

		this.DOM.scrollProgress.style.height = 0;

		this.on('scroll', (instance) => {
			const progress = (instance.scroll.y / (this.DOM.element.offsetHeight - window.innerHeight)) * 100;
			const progressRounded = Math.round(progress);
			this.DOM.scrollProgress.style.height = `${progressRounded}%`;
		});
	}

	/**
	 * Scroll direction
	 */
	direction() {
		/**
		 * @param {Object} istance (delta, direction, limit, scroll, speed)
		 */

		document.documentElement.setAttribute('data-direction', 'up');

		this.on('scroll', (instance) => {
			document.documentElement.setAttribute('data-direction', instance.direction);
		});
	}

	/**
	 * Restarts the scroll events
	 */
	start() {
		this.scroll.start();
	}

	/**
	 * Stops the scroll events
	 */
	stop() {
		this.scroll.stop();
	}

	/**
	 * Reinitializes the scroll
	 */
	reinitialize() {
		this.scroll.init();
	}

	/**
	 * Manually refresh the DOM
	 */
	update() {
		this.scroll.update();
	}

	/**
	 * Scroll to an element
	 * @param {Object|string|'top'|'bottom'} target
	 * @param {number} offset
	 */
	scrollTo(target, offset) {
		this.scroll.scrollTo(target, offset);
	}

	/**
	 * On instance
	 */
	on(eventName, func) {
		this.scroll.on(eventName, func);
	}

	/**
	 * Destroy instance
	 */
	destroy() {
		this.scroll.destroy();
	}
}
