/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { SplitText } from 'gsap/SplitText'


gsap.registerPlugin(ScrollTrigger , SplitText)

export default class animationSplitText {
	constructor() {
		this.element = '[data-scroll="js-split-text"]'
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

		gsap.set(item, { autoAlpha: 1 })
		const targetSplitBy = item.dataset.scrollSplittext
		const targetScrub = parseInt(item.dataset.scrollScrub, 10)

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				scrub: targetScrub || false,
				markers: true,
				toggleActions: 'play none play reset',
			},
		})

		if(targetSplitBy === 'chars') {
			const itemSplitted = new SplitText(item, {type:"chars"});
			tl.from(itemSplitted.chars, { yPercent: 100, opacity: 0, stagger: 0.05, duration: 0.5, ease: 'back.inOut'})
		}

		if(targetSplitBy === 'words') {
			const itemSplitted = new SplitText(item, {type:"words"});
			tl.from(itemSplitted.words, { yPercent: 100, opacity: 0, stagger: 0.05, duration: 0.5, ease: 'back.inOut'})
		}
        
		if (targetSplitBy === 'lines') {
			const itemSplitted = new SplitText(item, {type:"lines"});
			tl.from(itemSplitted.lines, { y: 20, opacity: 0, stagger: 0.01, duration: 0.01, ease: 'back.inOut' })
		}
	
	}

}