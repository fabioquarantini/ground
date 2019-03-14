/**
 * Infinite Scroll module
 * Automatically add next page
 * @see https://infinite-scroll.com
 */
import * as deepmerge from 'deepmerge';
import { DEBUG_MODE } from '../utilities/environment';
var infScroll = require('infinite-scroll');

export default class InfiniteScroll {
	/**
	 * @param {string} element - Container element
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.js-infinite-container';
		this.defaults = {
			path: '.js-infinite-next-page',
			append: '.js-infinite-post',
			history: false,
			scrollThreshold: 400,
			hideNav: '.js-pagination',
			status: '.js-infinite-status',
			debug: DEBUG_MODE ? true : false
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});
		window.addEventListener('NAVIGATE_END', () => {
			this.init();
		});
		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroy();
		});
	}

	/**
	 * Initialize plugin
	 */
	init() {
		if (document.querySelectorAll(this.element).length == 0) {
			return;
		}
		this.infScroll = new infScroll(this.element, this.options);
	}

	/**
	 * Remove Infinite Scroll functionality completely
	 */
	destroy() {
		if (this.infScroll === undefined) {
			return;
		}
		this.infScroll.destroy();
	}
}
