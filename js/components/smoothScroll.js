/**
 * Scroll module
 * Detection of elements in viewport & smooth scrolling with parallax.
 * @see https://github.com/locomotivemtl/locomotive-scroll
 */

import { initObserver } from '../utilities/observer'
import LocomotiveScroll from 'locomotive-scroll'
import * as deepmerge from 'deepmerge'

const imagesLoaded = require('imagesloaded')

export default class SmoothScroll {
	/**
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.DOM = {
			html: document.documentElement,
			body: document.body,
			element: document.getElementById('js-scroll'),
			scrollProgress: document.getElementById('js-scroll-progress'),
		}
		this.defaults = {
			el: this.DOM.element,
			elMobile: document,
			name: 'scroll',
			offset: [0, 0],
			repeat: false,
			smooth: true,
			smoothMobile: false,
			direction: 'vertical',
			inertia: 1,
			class: 'is-inview',
			scrollbarClass: 'scrollbar',
			scrollingClass: 'has-scroll-scrolling',
			draggingClass: 'has-scroll-dragging',
			smoothClass: 'has-scroll-smooth',
			initClass: 'has-scroll-init',
			getSpeed: true,
			getDirection: true,
			firefoxMultiplier: 50,
			touchMultiplier: 2,
			triggers: '[data-scroll-to]',
			updaterClass: 'js-scroll-update',
		}
		this.options = options
			? deepmerge(this.defaults, options)
			: this.defaults

		this.updateEvents = this.updateEvents.bind(this)

		imagesLoaded(this.DOM.body, { background: true }, () => {
			this.init()
			this.initEvents(this.options.updater)
			// TODO: Only 1 observer
			initObserver(this.options.triggers, this.updateEvents)
			initObserver('.' + this.options.updaterClass, this.updateEvents)
		})

		window.addEventListener('NAVIGATE_OUT', () => {
			this.stop()
		})

		window.addEventListener('NAVIGATE_IN', () => {
			this.destroy()
		})

		window.addEventListener('NAVIGATE_END', () => {
			if (this.options.smooth) {
				this.reinitialize()
				this.progressBar()
				this.direction()
			} else {
				this.reinitialize()
			}
		})
	}

	init() {
		if (this.DOM.element.length === 0) {
			return
		}

		setTimeout(() => {
			this.scroll = new LocomotiveScroll(this.options)
			this.progressBar()
			this.direction()
		}, 200)
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		const elements = document.querySelectorAll(triggers)
		for (let i = 0; i < elements.length; i++) {
			elements[i].addEventListener('click', () => {
				this.update()
			})
		}

		const updaters = document.querySelectorAll(
			'.' + this.options.updaterClass
		)
		for (let i = 0; i < updaters.length; i++) {
			updaters[i].addEventListener('click', () => {
				this.update()
			})
		}
	}

	/**
	 * Update events
	 * @param {string} target - New selector
	 */
	updateEvents(target) {
		if (target.classList.contains(this.options.updaterClass)) {
			target.addEventListener('click', () => {
				this.update()
			})
		} else {
			target.addEventListener('click', (event) => {
				const href = target.getAttribute('href')
				this.scrollTo(href)
			})
		}
	}

	/**
	 * Scroll Progress Bar
	 */
	progressBar() {
		/**
		 * @param {Object} istance (delta, direction, limit, scroll, speed)
		 */

		if (this.DOM.scrollProgress === null) {
			return
		}

		this.DOM.scrollProgress.style.height = 0

		this.on('scroll', (instance) => {
			const progress =
				(instance.scroll.y /
					(this.DOM.element.offsetHeight - window.innerHeight)) *
				100
			const progressRounded = Math.round(progress)
			this.DOM.scrollProgress.style.height = `${progressRounded}%`
		})
	}

	/**
	 * Scroll direction
	 */
	direction() {
		/**
		 * @param {Object} istance (delta, direction, limit, scroll, speed)
		 */

		document.documentElement.setAttribute('data-direction', 'up')

		this.on('scroll', (instance) => {
			document.documentElement.setAttribute(
				'data-direction',
				instance.direction
			)
		})
	}

	/**
	 * Restarts the scroll events
	 */
	start() {
		this.scroll.start()
	}

	/**
	 * Stops the scroll events
	 */
	stop() {
		this.scroll.stop()
	}

	/**
	 * Reinitializes the scroll
	 */
	reinitialize() {
		this.scroll.init()
	}

	/**
	 * Manually refresh the DOM
	 */
	update() {
		this.scroll.update()
	}

	/**
	 * Scroll to an element
	 * @param {Object|string|'top'|'bottom'} target
	 * @param {number} offset
	 */
	scrollTo(target, offset) {
		this.scroll.scrollTo(target, offset)
	}

	/**
	 * On instance
	 */
	on(eventName, func) {
		this.scroll.on(eventName, func)
	}

	/**
	 * Destroy instance
	 */
	destroy() {
		this.scroll.destroy()
	}
}
