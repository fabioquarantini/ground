/**
 * Magnet module
 * Mouse interactions
 */

import { initObserver } from '../utilities/observer'
import { gsap } from 'gsap'

const Deepmerge = require('deepmerge')

export default class Magnet {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.js-magnet'
		this.defaults = {
			triggers: this.element,
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
			this.initEvents(this.options.triggers)
			initObserver(this.options.triggers, this.updateEvents)
		})
	}

	init() {
		this.DOM.element = document.querySelectorAll(this.element)
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		;[...document.querySelectorAll(triggers)].forEach((magnet) => {
			magnet.addEventListener('mousemove', this.moveMagnet)
			magnet.addEventListener('mouseout', (event) => {
				if (magnet.classList.contains('is-magnet')) {
					magnet.classList.remove('is-magnet')
				}

				gsap.to(event.currentTarget, {
					duration: 0.4,
					x: 0,
					y: 0,
					ease: 'back.out',
				})
			})
		})
	}

	/**
	 * Update events
	 * @param {string} target - New selector
	 */
	updateEvents(target) {
		target.addEventListener('mousemove', this.moveMagnet)
		target.addEventListener('mouseout', (event) => {
			if (target.classList.contains('is-magnet')) {
				target.classList.remove('is-magnet')
			}

			gsap.to(event.currentTarget, {
				duration: 0.4,
				x: 0,
				y: 0,
				ease: 'back.out',
			})
		})
	}

	/**
	 * moveMagnet
	 */
	moveMagnet(event) {
		const magnetButton = event.currentTarget
		const bounding = magnetButton.getBoundingClientRect()

		if (!magnetButton.classList.contains('is-magnet')) {
			magnetButton.classList.add('is-magnet')
		}
		// console.log(magnetButton, bounding)

		gsap.to(magnetButton, {
			duration: 1,
			x:
				((event.clientX - bounding.left) / magnetButton.offsetWidth -
					0.5) *
				70,
			y:
				((event.clientY - bounding.top) / magnetButton.offsetHeight -
					0.5) *
				70,
			ease: 'power4.out',
		})

		// magnetButton.style.transform = 'translate(' + (((( event.clientX - bounding.left)/(magnetButton.offsetWidth))) - 0.5) * strength + 'px,'+ (((( event.clientY - bounding.top)/(magnetButton.offsetHeight))) - 0.5) * strength + 'px)';
	}
}
