/**
 * Infinite Scroll module
 * Automatically add next page
 * @see https://infinite-scroll.com
 * TODO: Fix Smoothscroll
 * TODO: Fix highway on new link
 */
import { initObserver } from '../utilities/observer'
import { DEBUG_MODE } from '../utilities/environment'

const Deepmerge = require('deepmerge')
const InfScroll = require('infinite-scroll')

export default class InfiniteScroll {
	/**
	 * @param {string} element - Container element
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.js-infinite-container'
		this.defaults = {
			path: '.js-infinite-next-page',
			append: '.js-infinite-post',
			history: false,
			scrollThreshold: 400,
			hideNav: '.js-pagination',
			status: '.js-infinite-status',
			debug: !!DEBUG_MODE,
		}
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		}
		this.options = options
			? Deepmerge(this.defaults, options)
			: this.defaults
		this.updateEvents = this.updateEvents.bind(this)

		window.addEventListener('DOMContentLoaded', () => {
			this.init()
			initObserver(this.element, this.updateEvents)
		})

		// TODO: Destroy with observer
		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroy()
		})
	}

	/**
	 * Initialize plugin
	 */
	init() {
		this.DOM.element = document.querySelector(this.element)
		this.DOM.path = document.querySelector(this.options.path)

		if (
			(this.DOM.path === null && this.DOM.element === null) ||
			(this.DOM.path !== null && this.DOM.element === null) ||
			(this.DOM.path === null && this.DOM.element !== null)
		) {
			return
		}

		this.infScroll = new InfScroll(this.element, this.options)
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents() {
		this.init()
	}

	/**
	 * Remove Infinite Scroll functionality completely
	 */
	destroy() {
		if (this.infScroll === undefined) {
			return
		}
		this.infScroll.destroy()
	}
}
