/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

export default class animationParallax {
	constructor() {
		this.element = '[data-scroll="js-rotation"]'
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		}
		this.options = { triggers: this.element }
		this.updateEvents = this.updateEvents.bind(this)
		window.addEventListener('DOMContentLoaded', () => {})
		window.addEventListener('LOADER_COMPLETE', () => {
			this.init()
			this.initEvents(this.options.triggers)
			initObserver(this.options.triggers, this.updateEvents)
		})
	}

	/**
	 * Init
	 */
	init() {
		this.DOM.element = document.querySelectorAll(this.element)
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		gsap.utils.toArray(triggers).forEach((element) => {
			this.startAnimation(element)
		})
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init()
		this.startAnimation(target)
	}

	/**
	 *  Start Animation
	 */
	startAnimation(item) {

		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 80%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse',
			},
		})

		tl.from(item, {
			x: 400,
			rotation: 360,
		})
	}

}