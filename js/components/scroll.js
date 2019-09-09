/**
 * Scroll module
 * Detection of elements in viewport & smooth scrolling with parallax.
 * @see https://github.com/locomotivemtl/locomotive-scroll
 */
import imagesLoaded from 'imagesLoaded';
import locomotiveScroll from 'locomotive-scroll';
import * as deepmerge from 'deepmerge';
import { DEBUG_MODE } from '../utilities/environment';


export default class Scroll {
	/**
	 * @param {Object} options - User options
	 */
	constructor(options) {
		this.DOM = { element: document.getElementById('js-scroll')};
		this.DOM.body = document.body;
		this.DOM.scrollProgress = document.getElementById('js-scroll-progress');
		this.defaults = {
			el: this.DOM.element,
			smooth: true,
			getSpeed: true,
			getDirection: true,
			smoothMobile: false,
			scrollbarClass: 'scrollbar'
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;


		new imagesLoaded(document.body, { background: true }, this.init());

		window.addEventListener('DOMContentLoaded', () => {
			document.body.classList.add('has-scroll-animation');
		});

		window.addEventListener('NAVIGATE_END', () => {
			this.update();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			//this.init();
		});
	}

	init() {
		if (this.DOM.element.length == 0) {
			return;
		}

		setTimeout(() => {
			this.scroll = new locomotiveScroll(this.options);
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
			if (DEBUG_MODE) {
				console.log('Istance:' + instance);
				console.log('scrollY:' + instance.scroll.y);
				console.log('Limit:' + instance.limit);
				console.log('Scroll Progress:' + progress_rounded + '%');
			}

			let progress = (instance.scroll.y / (this.DOM.element.offsetHeight - window.innerHeight)) * 100;
			let progress_rounded = Math.round(progress);
			this.DOM.scrollProgress.style.height = progress_rounded + '%';
			document.documentElement.setAttribute('data-direction', instance.direction);
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