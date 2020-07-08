import * as deepmerge from 'deepmerge';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import { DrawSVGPlugin } from 'gsap/DrawSVGPlugin';

import AbstractComponent from './abstractComponent';

gsap.registerPlugin(ScrollTrigger, SplitText, DrawSVGPlugin);

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
		// this.updateEvents = this.updateEvents.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
			// super.initObserver(this.options.triggers, this.updateEvents);
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
		this.example = 'Example';

		ScrollTrigger.defaults({
			markers: false,
		});

		gsap.utils.toArray(triggers).forEach((element, i) => {
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
			if (element.dataset.scrollAnimation === 'scale') {
				this.scaleAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'draw-svg') {
				this.drawSvgAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'pin') {
				this.pinAnimation(element);
			}
			if (element.dataset.scrollAnimation === 'pin-horizontal') {
				this.pinHorizontalAnimation(element);
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
		if (target.dataset.scrollAnimation === 'scale') {
			this.scaleAnimation(target);
		}
		if (target.dataset.scrollAnimation === 'draw-svg') {
			this.drawSvgAnimation(target);
		}
		if (target.dataset.scrollAnimation === 'pin') {
			this.pinAnimation(target);
		}
		if (target.dataset.scrollAnimation === 'pin-horizontal') {
			this.pinHorizontalAnimation(target);
		}
		if (target.dataset.scrollAnimation === 'comparison') {
			this.comparisonAnimation(target);
		}
		if (target.dataset.scrollAnimation === 'parallax') {
			this.parallaxAnimation(target);
		}
	}

	/**
	 * splitText Animation Chars
	*/
	splitTextAnimationChars(item) {
		const splitText = new SplitText(item, {
			type: 'chars, words',
		});
		const target = splitText.chars;

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: 1,
				start: 'top 90%',
				end: 'bottom 60%',
				toggleActions: 'play reset play reset',
			},
		});

		tl.from(target, {
			scale: 2,
			opacity: 0,
			stagger: 0.01,
			duration: 0.01,
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

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: 1,
				start: 'top 90%',
				end: 'bottom 60%',
				toggleActions: 'play reset play reset',
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
		gsap.from(item, {
			x: 400,
			rotation: 360,
			// duration: 4,
			scrollTrigger: {
				trigger: item,
				start: 'top 100%',
				end: 'bottom 70%',
				toggleActions: 'play reset play reset',
				scrub: 2,
				// markers: true,
			},
		});
	}

	/**
	 * fadeInDown Animation
	*/
	fadeInDownAnimation(item) {
		gsap.to(item, {
			opacity: 1,
			y: 20,
			duration: 1,
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				toggleActions: 'play none none reset',
				// pin: true,
				// toggleClass: 'active',
				// markers: true,
			},
		});
	}

	/**
	 * scale Animation
	*/
	scaleAnimation(item) {
		gsap.to(item, {
			scale: 2,
			scrollTrigger: {
				trigger: item,
				start: 'top 100%',
				end: 'bottom 0%',
				toggleActions: 'play none none reset',
				scrub: 2,
				// markers: true,
			},
		});
	}

	/**
	 * parallax Animation
	*/
	parallaxAnimation(item) {
		gsap.to(item, {
			y: -item.dataset.scrollSpeed * 100 || 0,
			x: -item.dataset.scrollSpeedHorizontal * 100 || 0,
			scrollTrigger: {
				trigger: item,
				toggleActions: 'play none none none',
				scrub: 2,
				ease: 'power4',
				// markers: true,
			},
		});
	}

	/**
	 * darwSvg Animation
	*/
	drawSvgAnimation(item) {
		const target = item.querySelectorAll('path');
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: 0.5,
				start: 'top 70%',
				end: 'bottom 70%',
				toggleActions: 'play reset play reset',
				// markers: true,
			},
		});

		tl.from(target, {
			drawSVG: 0,
		});
	}

	/**
	 * pin Animation
	*/
	pinAnimation(item) {
		const target = item.querySelectorAll('.js-pin__element');

		// Animation PIN move into Function
		const animationPin = gsap.from(target, {
			scale: 0.6,
			transformOrigin: 'center center',
			ease: 'power2',
		});

		ScrollTrigger.create({
			trigger: item,
			animation: animationPin,
			start: 'center center',
			end: '+=200%',
			toggleClass: 'active',
			pin: true,
			scrub: 1,
			// onEnter: () => console.log('enter'),
			// onLeave: () => console.log('leave'),
			// onEnterBack: () => console.log('enter back'),
			// onLeaveBack: () => console.log('leave back'),
			// onUpdate: (self) => {
			// 	console.log('progress:', self.progress.toFixed(3), 'direction:', self.direction, 'velocity', self.getVelocity());
			// },

		});
	}

	/**
	 * pin Horizontal Animation
	*/
	pinHorizontalAnimation(item) {
		const target = item.querySelector('.js-pin-horizontal-container');
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'center center',
				end: () => `+=${target.offsetWidth}`,
				scrub: 1,
				pin: true,
				anticipatePin: 1,
			},
		});
		tl.fromTo(target, { x: 0 }, { x: -target.offsetWidth + item.offsetWidth });
	}

	/**
	 * comparison Animation
	*/
	comparisonAnimation(item) {
		const target = item.querySelectorAll('.js-comparison-after-media');
		const targetImage = item.querySelectorAll('.js-comparison-after-media .comparison__img');
		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'center center',
				// makes the height of the scrolling (while pinning) match the width, thus the speed remains constant (vertical/horizontal)
				end: () => `+=${item.offsetWidth}`,
				scrub: true,
				pin: true,
				anticipatePin: 1,
			},
			defaults: { ease: 'none' },
		});
			// animate the container one way...
		tl.fromTo(target, { xPercent: 100, x: 0 }, { xPercent: 0 })
			// ...and the image the opposite way (at the same time)
			.fromTo(targetImage, { xPercent: -100, x: 0 }, { xPercent: 0 }, 0);
	}
}
