/**
 * Infinite Scroll module
 * Automatically add next page
 * @see https://infinite-scroll.com
 * TODO: Fix Smoothscroll
 * TODO: Fix highway on new link
 */
import * as deepmerge from 'deepmerge';
import { DEBUG_MODE } from '../utilities/environment';
import AbstractComponent from '../components/abstractComponent';

var infScroll = require('infinite-scroll');

export default class InfiniteScroll extends AbstractComponent {
	/**
	 * @param {string} element - Container element
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(element, options);
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
		this.updateEvents = this.updateEvents.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			super.initObserver(this.element, this.updateEvents);
		});

		// TODO: Destroy with observer
		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroy();
		});
	}

	/**
	 * Initialize plugin
	 */
	init() {
		this.DOM = {element: document.querySelector(this.element)};

		if (!this.DOM.element) {
			return;
		}

		this.infScroll = new infScroll(this.element, this.options);
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
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
