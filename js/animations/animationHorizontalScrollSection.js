/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

export default class animationHorizontalScrollSection {
	constructor() {
		this.element = '[data-scroll="js-horizontal-scroll-section"]'
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

		const target = item.querySelector('[data-scroll-target]')
		const section = item.querySelectorAll('[data-scroll-section]')
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const sections = gsap.utils.toArray(section)

		let maxWidth = 0

		const getMaxWidth = () => {
			maxWidth = 0
			sections.forEach((section) => {
				maxWidth += section.offsetWidth
			})
		}
		getMaxWidth()
		ScrollTrigger.addEventListener('refreshInit', getMaxWidth)

		gsap.to(sections, {
			x: () => `-${maxWidth - window.innerWidth}`,
			ease: 'none',
			scrollTrigger: {
				trigger: target,
				pin: true,
				pinReparent: true,
				scrub: targetScrub || false,
				start: 'center center',
				end: () => `+=${maxWidth}`,
				invalidateOnRefresh: true,
			},
		})

		// ADD SKEW
		// let proxy = { skew: 0 },
		// 	skewSetter = gsap.quickSetter(section, 'skewX', 'deg'), // fast
		// 	clamp = gsap.utils.clamp(-10, 10) // don't let the skew go beyond [X] degrees.
		// END SKEW

		sections.forEach((sct, i) => {
			ScrollTrigger.create({
				trigger: sct,
				start: () =>
					'top top-=' +
					(sct.offsetLeft - window.innerWidth / 2) *
					(maxWidth / (maxWidth - window.innerWidth)),
				end: () =>
					'+=' +
					sct.offsetWidth *
					(maxWidth / (maxWidth - window.innerWidth)),
				toggleClass: { targets: sct, className: 'active' },
				// ADD SKEW
				// onUpdate: (self) => {
				// 	let skew = clamp(self.getVelocity() / -500)
				// 	// only do something if the skew is MORE severe. Remember, we're always tweening back to 0, so if the user slows their scrolling quickly, it's more natural to just let the tween handle that smoothly rather than jumping to the smaller skew.
				// 	if (Math.abs(skew) > Math.abs(proxy.skew)) {
				// 		proxy.skew = skew
				// 		gsap.to(proxy, {
				// 			skew: 0,
				// 			duration: 0.5,
				// 			ease: 'circ',
				// 			overwrite: true,
				// 			onUpdate: () => skewSetter(proxy.skew),
				// 		})
				// 	}
				// },
				// END SKEW
			})
		})

		// SKEW: make the right edge "stick" to the scroll bar. force3D: true improves performance
		// gsap.set(section, { transformOrigin: 'center center', force3D: true })
		// END SKEW
	}

}