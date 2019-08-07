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

		this.defaults = {
			el: document.querySelector('#js-scroll'),
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
			this.init();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			this.init();
		});
	}

	init() {

		this.scroll = new locomotiveScroll(this.options);
		this.onScroll();

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
				console.log(instance);
				console.log(instance.scroll.y);
			}

			document.documentElement.setAttribute('data-direction', instance.direction)	
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