import Utilities from '../utilities/utilities';
import * as deepmerge from 'deepmerge';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import { DrawSVGPlugin } from 'gsap/DrawSVGPlugin';
import { MorphSVGPlugin } from 'gsap/MorphSVGPlugin';

gsap.registerPlugin(ScrollTrigger, SplitText, DrawSVGPlugin, MorphSVGPlugin);

export default class Animations {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '[data-scroll]';
		this.defaults = {
			triggers: this.element,
		};
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);

		window.addEventListener('DOMContentLoaded', () => {});

		ScrollTrigger.addEventListener('scrollStart', () => {});

		ScrollTrigger.addEventListener('scrollEnd', () => {});

		ScrollTrigger.addEventListener('refreshInit', () => {});

		ScrollTrigger.addEventListener('refresh', () => {});

		window.addEventListener('NAVIGATE_OUT', () => {
			// ScrollTrigger.update();
			// ScrollTrigger.refresh();
		});

		window.addEventListener('NAVIGATE_IN', () => {
		});

		window.addEventListener('NAVIGATE_END', () => {
		});

		window.addEventListener('LOADER_COMPLETE', () => {
			this.init();
			this.initEvents(this.options.triggers);
			Utilities.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	/**
	 * Init
	 */
	init() {
		this.DOM.element = document.querySelectorAll(this.element);
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
			if (element.dataset.scroll === 'js-splittext-chars') {
				this.splitTextAnimationChars(element);
			}
			else if (element.dataset.scroll === 'js-splittext-lines') {
				this.splitTextAnimationLines(element);
			}
			else if (element.dataset.scroll === 'js-rotation') {
				this.rotationAnimation(element);
			}
			else if (element.dataset.scroll === 'js-batch') {
				this.batchAnimation(element);
			}
			else if (element.dataset.scroll === 'js-scale') {
				this.scaleAnimation(element);
			}
			else if (element.dataset.scroll === 'js-draw-svg') {
				this.drawSvgAnimation(element);
			}
			else if (element.dataset.scroll === 'js-background-color') {
				this.backgroundColorAnimation(element);
			}
			else if (element.dataset.scroll === 'js-pin') {
				this.pinAnimation(element);
			}
			else if (element.dataset.scroll === 'js-pin-image-sequence') {
				this.pinImageSequence(element);
			}
			else if (element.dataset.scroll === 'js-pin-horizontal') {
				this.pinHorizontalAnimation(element);
			}
			else if (element.dataset.scroll === 'js-pin-vertical') {
				this.pinVerticalAnimation(element);
			}
			else if (element.dataset.scroll === 'js-comparison') {
				this.comparisonAnimation(element);
			}
			else if (element.dataset.scroll === 'js-parallax') {
				this.parallaxAnimation(element);
			}
			else if (element.dataset.scroll === 'js-video') {
				this.videoAnimation(element);
			}
			
			else {
				this.defaultAnimation(element);
			}
		});
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		// console.log(target.dataset.scroll);

		setTimeout(() => {
			if (target.dataset.scroll === 'js-splittext-chars') {
				this.splitTextAnimationChars(target);
			}
			else if (target.dataset.scroll === 'js-splittext-lines') {
				this.splitTextAnimationLines(target);
			}
			else if (target.dataset.scroll === 'js-rotation') {
				this.rotationAnimation(target);
			}
			else if (target.dataset.scroll === 'js-batch') {
				this.batchAnimation(target);
			}
			else if (target.dataset.scroll === 'js-scale') {
				this.scaleAnimation(target);
			}
			else if (target.dataset.scroll === 'js-draw-svg') {
				this.drawSvgAnimation(target);
			}
			else if (target.dataset.scroll === 'js-background-color') {
				this.backgroundColorAnimation(target);
			}
			else if (target.dataset.scroll === 'js-pin') {
				this.pinAnimation(target);
			}
			else if (target.dataset.scroll === 'js-pin-image-sequence') {
				this.pinImageSequence(target);
			}
			else if (target.dataset.scroll === 'js-pin-horizontal') {
				this.pinHorizontalAnimation(target);
			}
			else if (target.dataset.scroll === 'js-pin-vertical') {
				this.pinVerticalAnimation(target);
			}
			else if (target.dataset.scroll === 'js-comparison') {
				this.comparisonAnimation(target);
			}
			else if (target.dataset.scroll === 'js-parallax') {
				this.parallaxAnimation(target);
			}
			else if (target.dataset.scroll === 'js-video') {
				this.videoAnimation(element);
			} else {
				this.defaultAnimation(element);
			}
		}, 1000);
	}

	/**
	 * default Animation
	*/
	defaultAnimation(item) {

		const targetClass = item.dataset.scroll;

		ScrollTrigger.create({
			trigger: item,
			start: 'top 100%',
			toggleClass: targetClass,
			toggleActions: 'play none none none',
			// markers: true,
			// once: true,
		});

	}

	/**
	 * splitText Animation Chars
	*/
	splitTextAnimationChars(item) {
		
		gsap.set(item, { autoAlpha: 1 });

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
			scale: 1.5,
			opacity: 0,
			stagger: 0.1,
			duration: 0.1,
		});
	}

	/**
	 * splitText Animation Lines
	*/
	splitTextAnimationLines(item) {

		gsap.set(item, { autoAlpha: 1 });

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

		gsap.set(item, { autoAlpha: 1 });

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
	 * batch Animation
	*/
	batchAnimation(item) {

		gsap.set(item, { autoAlpha: 1 });

		const target = item.querySelectorAll('[data-scroll-target]');

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

		gsap.set(item, { autoAlpha: 1 });

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

		gsap.set(item, { autoAlpha: 1 });

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				toggleActions: 'play pause none none',
				scrub: 2,
				ease: 'power4',
			},
		});

		tl.to(item, {
			y: -item.dataset.scrollSpeedY * 100 || 0,
			x: -item.dataset.scrollSpeedX * 100 || 0,
		});
	}


	/**
	 * video Animation
	*/
	videoAnimation(item) {

		const targetVideo = item.querySelector('[data-scroll-target]');

		gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top bottom',
				end: 'bottom top',
				markers: false,
				onEnter: () => targetVideo.play(),
				onLeave: () => {
					targetVideo.pause();
					targetVideo.currentTime = 0;
				},
				onEnterBack: () => targetVideo.play(),
				onLeaveBack: () => {
					targetVideo.pause();
					targetVideo.currentTime = 0;
				},
			},
		});

	}

	/**
	 * darwSvg Animation
	*/
	drawSvgAnimation(item) {

		gsap.set(item, { autoAlpha: 1 });

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

		const target = item.querySelector('[data-scroll-target]');
		const targetElement = item.querySelectorAll('[data-scroll-target-animate]');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: '+=200%',
				toggleClass: 'active',
				pin: true,
				pinReparent: true,
				scrub: targetScrub || false,
				// anticipatePin: 1,
			},
		});

		tl.from(targetElement, {
			scale: 0.6,
			transformOrigin: 'center center',
		});
	}


	/**
	 * pin Image Sequence https://codepen.io/GreenSock/pen/yLOVJxd
	*/
	pinImageSequence(item) {

		const target = item.querySelector("[data-scroll-target]");
		const canvas = item.querySelector("[data-scroll-canvas]");
		const targetContainer = item.querySelector("[data-scroll-target-animate]");	

		const context = canvas.getContext("2d");
		const frameCount = parseInt(item.dataset.scrollFrames, 10);
		const framePath = item.dataset.scrollPath;

		canvas.width = 900;
		canvas.height = 859;

		const currentFrame = index => (
			`${framePath}/${(index + 1).toString().padStart(4, '0')}.jpg`
  			// `https://www.apple.com/105/media/us/airpods-pro/2019/1299e2f5_9206_4470_b28e_08307a42f19b/anim/sequence/large/01-hero-lightpass/${(index + 1).toString().padStart(4, '0')}.jpg`
		);

		const images = []
		const frames = {
  			frame: 0
		};
		
		for (let i = 0; i < frameCount; i++) {
			const img = new Image();
			img.src = currentFrame(i);
			images.push(img);
		}

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: '+=400%',
				scrub: 0.5,
				pin: true,
				// anticipatePin: 1,
			},
		});

		tl	
			.to(frames, { frame: frameCount - 1, snap: "frame", onUpdate: render, duration: 20},'together')
			.fromTo(targetContainer, { scale:0.95 },{ scale:1, duration: 20},'together');

		images[0].onload = render;

		function render() {
			context.clearRect(0, 0, canvas.width, canvas.height);
			context.drawImage(images[frames.frame], 0, 0); 
		}
		
	}


	/**
	 * pin Horizontal Animation
	*/
	pinHorizontalAnimation(item) {

		const target = item.querySelector('[data-scroll-target]');
		const targetContainer = item.querySelector('[data-scroll-target-animate]');
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
				// onEnter: () => {},
				// onLeave: () => {},
				// onEnterBack: () => {},
				// onLeaveBack: () => {},
			},
		});

		tl.fromTo(targetContainer, { x: 0 }, { x: -targetContainer.getBoundingClientRect().width + target.getBoundingClientRect().width });
	}

	/**
	 * pin Vertical Animation
	*/
	pinVerticalAnimation(item) {

		console.log('ooooo');

		const target = item.querySelector('[data-scroll-target]');
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

		const target = item.querySelector('[data-scroll-target]');
		const targetMedia = item.querySelectorAll('.js-comparison-after-media');
		const targetImage = item.querySelectorAll('.js-comparison-after-media img');
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
