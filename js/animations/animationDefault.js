/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer'
import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

export default class animationDefault {
	constructor() {
		this.element = '[data-scroll]'
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
			if(element.dataset.scroll.substr(0,3) != 'js-') {
				this.startAnimation(element)
			} 
		})
	
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init()
		// console.log(target.dataset.scroll);
		if (target.dataset.scroll.substr(0,3) != 'js-') {
			this.startAnimation(target)
		}
	}

	/**
	 *  Start Animation
	 */
	startAnimation(item) {
		const targetClass = item.dataset.scroll
		ScrollTrigger.create({
			trigger: item,
			start: 'top 100%',
			toggleClass: targetClass,
			toggleActions: 'play none none none',
			once: false,
			//markers: true,
		})
	}

}