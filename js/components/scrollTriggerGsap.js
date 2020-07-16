import * as deepmerge from 'deepmerge';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import { DrawSVGPlugin } from 'gsap/DrawSVGPlugin';
import { MorphSVGPlugin } from 'gsap/MorphSVGPlugin';

import AbstractComponent from './abstractComponent';

gsap.registerPlugin(ScrollTrigger, SplitText, DrawSVGPlugin, MorphSVGPlugin);

export default class ScrollTriggerGsap extends AbstractComponent {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(options);
		this.element = element || '[data-scroll]';
		this.defaults = {
			triggers: this.element,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

		const dataContainer = document.querySelectorAll('[data-router-wrapper]');
		gsap.set(dataContainer, { opacity: 0 });

		window.addEventListener('DOMContentLoaded', () => {});

		ScrollTrigger.addEventListener('scrollStart', () => {});

		ScrollTrigger.addEventListener('scrollEnd', () => {});

		ScrollTrigger.addEventListener('refreshInit', () => {});

		ScrollTrigger.addEventListener('refresh', () => {});

		window.addEventListener('NAVIGATE_OUT', () => {
			// ScrollTrigger.update();
			ScrollTrigger.refresh();
		});

		window.addEventListener('NAVIGATE_IN', () => {
			gsap.set(dataContainer, { opacity: 0 });
		});

		window.addEventListener('NAVIGATE_END', () => {
			gsap.set(dataContainer, { opacity: 1 });
		});

		window.addEventListener('LOADER_COMPLETE', () => {
			gsap.set(dataContainer, { opacity: 1 });
			this.init();
			this.initEvents(this.options.triggers);
			super.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	/**
	 * Init
	 */
	init() {
		this.DOM = {
			element: document.querySelectorAll(this.element),
		};
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		ScrollTrigger.defaults({
			markers: false,
			ease: 'power3',
		});

		gsap.utils.toArray(triggers).forEach((element) => {
			if (element.dataset.scrollAnimation === 'splittext-chars') {
				this.splitTextAnimationChars(element);
			}
			if (element.dataset.scrollAnimation === 'splittext-lines') {
				this.splitTextAnimationLines(element);
			}
			if (element.dataset.scrollAnimation === 'rotation') {
				this.rotationAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'fade-in-down') {
				this.fadeInDownAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'batch') {
				this.batchAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'scale') {
				this.scaleAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'draw-svg') {
				this.drawSvgAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'background-color') {
				this.backgroundColorAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'pin') {
				this.pinAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'pin-horizontal') {
				this.pinHorizontalAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'pin-vertical') {
				this.pinVerticalAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'comparison') {
				this.comparisonAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'parallax') {
				this.parallaxAnimation(element);
			}
		});
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		// console.log(target.dataset.scrollAnimation);

		setTimeout(() => {
			if (target.dataset.scrollAnimation === 'splittext-chars') {
				this.splitTextAnimationChars(target);
			}
			if (target.dataset.scrollAnimation === 'splittext-lines') {
				this.splitTextAnimationLines(target);
			}
			if (target.dataset.scrollAnimation === 'rotation') {
				this.rotationAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'fade-in-down') {
				this.fadeInDownAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'batch') {
				this.batchAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'scale') {
				this.scaleAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'draw-svg') {
				this.drawSvgAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'background-color') {
				this.backgroundColorAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'pin') {
				this.pinAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'pin-horizontal') {
				this.pinHorizontalAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'pin-vertical') {
				this.pinVerticalAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'comparison') {
				this.comparisonAnimation(target);
			}
			if (target.dataset.scrollAnimation === 'parallax') {
				this.parallaxAnimation(target);
			}
		}, 1000);
	}

	/**
	 * splitText Animation Chars
	*/
	splitTextAnimationChars(item) {
		const splitText = new SplitText(item, {
			type: 'chars, words',
		});
		const target = splitText.chars;
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reset',
			},
		});

		tl.from(target, {
			scale: 2,
			opacity: 0,
			stagger: 0.1,
			duration: 0.1,
		});
	}

	/**
	 * splitText Animation Lines
	*/
	splitTextAnimationLines(item) {
		const splitText = new SplitText(item, {
			type: 'lines',
		});
		const target = splitText.lines;
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reset',
			},
		});

		tl.from(target, {
			y: 20,
			opacity: 0,
			stagger: 0.01,
			duration: 0.01,
		});
	}

	/**
	 * rotation Animation
	*/
	rotationAnimation(item) {
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 80%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse',
			},
		});

		tl.from(item, {
			x: 400,
			rotation: 360,
		});
	}

	/**
	 * fadeInDown Animation
	*/
	fadeInDownAnimation(item) {
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse',
			},
		});

		tl.to(item, {
			opacity: 1,
			y: 20,
			duration: 0.2,
		});
	}

	/**
	 * batch Animation
	*/
	batchAnimation(item) {
		const target = item.querySelectorAll('.js-batch-el');
		gsap.set(target, { y: 100, opacity: 0 });

		ScrollTrigger.batch(target, {
			// interval: 0.1, // time window (in seconds) for batching to occur.
			// batchMax: 3, // maximum batch size (targets)
			onEnter: (batch) => gsap.to(batch, {
				opacity: 1, y: 0, stagger: { each: 0.1, grid: [1, 3] }, overwrite: true,
			}),
			// onLeave: (batch) => gsap.set(batch, { opacity: 0, y: -100, overwrite: true }),
			// onEnterBack: (batch) => gsap.to(batch, {
			// 	opacity: 1, y: 0, stagger: 0.1, overwrite: true,
			// }),
			// onLeaveBack: (batch) => gsap.set(batch, { opacity: 0, y: 100, overwrite: true }),
			// you can also define things like start, end, etc.

		});
		ScrollTrigger.addEventListener('refreshInit', () => gsap.set(target, { y: 0 }));
	}

	/**
	 * scale Animation
	*/
	scaleAnimation(item) {
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 100%',
				end: 'bottom 0%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse',
			},
		});

		tl.to(item, {
			scale: 1.5,
		});
	}

	/**
	 * parallax Animation
	*/
	parallaxAnimation(item) {
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				toggleActions: 'play pause none none',
				scrub: 2,
				ease: 'power4',
			},
		});

		tl.to(item, {
			y: -item.dataset.scrollSpeed * 100 || 0,
			x: -item.dataset.scrollSpeedHorizontal * 100 || 0,
		});
	}

	/**
	 * darwSvg Animation
	*/
	drawSvgAnimation(item) {
		const target = item.querySelectorAll('path');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: targetScrub || false,
				start: 'top 70%',
				end: 'bottom 70%',
				toggleActions: 'play none play reverse',
			},
		});

		tl.from(target, {
			drawSVG: 0,
		});
	}

	/**
	 * backgroundColor Animation
	*/
	backgroundColorAnimation(item) {
		const target = document.body;
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: 1,
				toggleActions: 'play reset play reset',
			},
		});

		tl.to(target, {
			backgroundColor: item.dataset.backgroundColor,
			ease: 'power1',
		});
	}

	/**
	 * pin Animation
	*/
	pinAnimation(item) {
		const target = item.querySelector('[data-scroll-animation-target]');
		const targetElement = item.querySelectorAll('.js-pin__element');

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: '+=200%',
				toggleClass: 'active',
				pin: true,
				pinReparent: true,
				scrub: 1,
				// anticipatePin: 1,
			},
		});

		tl.from(targetElement, {
			scale: 0.6,
			transformOrigin: 'center center',
		});
	}

	/**
	 * pin Horizontal Animation
	*/
	pinHorizontalAnimation(item) {
		const audioplay = document.createElement('audio');
		audioplay.setAttribute('src', 'http://wordpress-364601-1334787.cloudwaysapps.com/concept/music/audio.mp3');
		const target = item.querySelector('[data-scroll-animation-target]');
		const targetContainer = item.querySelector('.js-pin-horizontal-container');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: () => `+=${targetContainer.offsetWidth}`,
				scrub: targetScrub || false,
				pin: true,
				// invalidateOnRefresh: true,
				// anticipatePin: 1,
				onEnter: () => audioplay.play(),
				onLeave: () => {
					audioplay.pause();
					audioplay.currentTime = 0;
				},
				onEnterBack: () => audioplay.play(),
				onLeaveBack: () => {
					audioplay.pause();
					audioplay.currentTime = 0;
				},
			},
		});

		tl.fromTo(targetContainer, { x: 0 }, { x: -targetContainer.getBoundingClientRect().width + target.getBoundingClientRect().width });
	}

	/**
	 * pin Vertical Animation
	*/
	pinVerticalAnimation(item) {
		const target = item.querySelector('[data-scroll-animation-target]');
		const targetLeft = item.querySelector('.js-pin-vertical-container-left');
		const targetCenter = item.querySelector('.js-pin-vertical-container-center');
		const targetRight = item.querySelector('.js-pin-vertical-container-right');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: () => `+=${targetLeft.offsetHeight}`,
				scrub: targetScrub || false,
				pin: true,
				// anticipatePin: 1,
			},
		});
		tl.fromTo(targetLeft, { y: 0 }, { y: -targetLeft.offsetHeight + item.offsetHeight }, 'step')
			.fromTo(targetCenter, { y: 0 }, { y: targetCenter.offsetHeight - item.offsetHeight }, 'step')
			.fromTo(targetRight, { y: 0 }, { y: -targetRight.offsetHeight + item.offsetHeight }, 'step');
	}

	/**
	 * comparison Animation
	*/
	comparisonAnimation(item) {
		const target = item.querySelector('[data-scroll-animation-target]');
		const targetMedia = item.querySelectorAll('.js-comparison-after-media');
		const targetImage = item.querySelectorAll('.js-comparison-after-media .comparison__img');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				// makes the height of the scrolling (while pinning) match the width, thus the speed remains constant (vertical/horizontal)
				end: () => `+=${target.offsetWidth}`,
				scrub: targetScrub || false,
				pin: true,
				// anticipatePin: 1,
			},
			defaults: { ease: 'none' },
		});
			// animate the container one way...
		tl.fromTo(targetMedia, { xPercent: 100, x: 0 }, { xPercent: 0 })
			// ...and the image the opposite way (at the same time)
			.fromTo(targetImage, { xPercent: -100, x: 0 }, { xPercent: 0 }, 0);
	}
}
