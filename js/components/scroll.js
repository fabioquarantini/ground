/**
 * Scroll module
 * Detection of elements in viewport & smooth scrolling with parallax.
 * @see https://github.com/locomotivemtl/locomotive-scroll
 */
import LocomotiveScroll from 'locomotive-scroll';
import { DEBUG_MODE } from '../utilities/environment';

const Deepmerge = require('deepmerge');

const imagesLoaded = require('imagesloaded');

export default class Scroll {
	/**
	 * @param {Object} options - User options
	 */
	constructor(options) {
		this.DOM = { element: document.getElementById('js-scroll') };
		this.DOM.html = document.documentElement;
		this.DOM.body = document.body;
		this.DOM.scrollProgress = document.getElementById('js-scroll-progress');
		this.defaults = {
			el: this.DOM.element,
			smooth: true,
			getSpeed: true,
			getDirection: true,
			smoothMobile: false,
			scrollbarClass: 'scrollbar',
		};
		this.options = options ? Deepmerge(this.defaults, options) : this.defaults;

		imagesLoaded(this.DOM.body, { background: true }, this.init());

		window.addEventListener('NAVIGATE_END', () => {
			this.update();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			// this.init();
		});
	}

	init() {
		if (this.DOM.element.length === 0) {
			return;
		}

		setTimeout(() => {
			this.scroll = new LocomotiveScroll(this.options);
			this.onScroll();
		}, 1000);
	}

	/**
	 * Scroll instance,
	 */
	onScroll() {
		/**
		 * @param {Object} istance (delta, direction, limit, scroll, speed)
		 */

		this.scroll.on('scroll', (instance) => {
			const progress = (instance.scroll.y / (this.DOM.element.offsetHeight - window.innerHeight)) * 100;
			const progressRounded = Math.round(progress);
			this.DOM.scrollProgress.style.height = `${progressRounded}%`;
			document.documentElement.setAttribute('data-direction', instance.direction);

			if (DEBUG_MODE) {
				/* eslint-disable no-console */
				console.log(`Istance:${instance}`);
				console.log(`scrollY:${instance.scroll.y}`);
				console.log(`Limit:${instance.limit}`);
				console.log(`Scroll Progress:${progressRounded}%`);
				/* eslint-enable no-console */
			}
		});
	}

	/**
	 * Manually refresh the DOM
	 */
	update() {
		this.scroll.update();
	}

	/**
	 * Destroy instance,
	 */
	destroy() {
		this.scroll.destroy();
	}
}
