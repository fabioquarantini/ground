/* eslint-disable no-unused-vars */
import { initObserver } from '../utilities/observer';
import { getTemplateUrl } from '../utilities/paths';
import * as deepmerge from 'deepmerge';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';
import { DrawSVGPlugin } from 'gsap/DrawSVGPlugin';
import { MorphSVGPlugin } from 'gsap/MorphSVGPlugin';

gsap.registerPlugin(ScrollTrigger, SplitText, DrawSVGPlugin, MorphSVGPlugin);

export default class AnimationsAll {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '[data-scroll]';
		this.defaults = {
			triggers: this.element
		};
		this.DOM = {
			html: document.documentElement,
			body: document.body
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

		window.addEventListener('resize', () => {
			// ScrollTrigger.update();
			// ScrollTrigger.refresh();
		});

		window.addEventListener('NAVIGATE_IN', () => {});

		window.addEventListener('NAVIGATE_END', () => {});

		window.addEventListener('LOADER_COMPLETE', () => {
			this.init();
			this.initEvents(this.options.triggers);
			initObserver(this.options.triggers, this.updateEvents);
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
		// ScrollTrigger.defaults({
		// 	markers: false,
		// 	ease: 'power3',
		// })

		gsap.utils.toArray(triggers).forEach((element) => {
			if (element.dataset.scroll === 'js-split-text') {
				this.animationSplitText(element);
			} else if (element.dataset.scroll === 'js-rotation') {
				this.animationRotation(element);
			} else if (element.dataset.scroll === 'js-batch') {
				this.animationBatch(element);
			} else if (element.dataset.scroll === 'js-scale') {
				this.animationScale(element);
			} else if (element.dataset.scroll === 'js-draw') {
				this.animationDraw(element);
			} else if (element.dataset.scroll === 'js-bg-color') {
				this.animationChangeBgColor(element);
			} else if (element.dataset.scroll === 'js-pin') {
				this.animationPin(element);
			} else if (element.dataset.scroll === 'js-sprite-images') {
				this.animationSpriteImages(element);
			} else if (element.dataset.scroll === 'js-horizontal-scroll') {
				this.animationHorizontalScroll(element);
			} else if (element.dataset.scroll === 'js-horizontal-scroll-section') {
				this.animationHorizontalScrollSection(element);
			} else if (element.dataset.scroll === 'js-comparison') {
				this.animationSomparison(element);
			} else if (element.dataset.scroll === 'js-parallax') {
				this.animationParallax(element);
			} else if (element.dataset.scroll === 'js-video') {
				this.animationVideo(element);
			} else {
				this.animationDefault(element);
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
			if (target.dataset.scroll === 'js-split-text') {
				this.animationSplitText(target);
			} else if (target.dataset.scroll === 'js-rotation') {
				this.animationRotation(target);
			} else if (target.dataset.scroll === 'js-batch') {
				this.animationBatch(target);
			} else if (target.dataset.scroll === 'js-scale') {
				this.animationScale(target);
			} else if (target.dataset.scroll === 'js-draw') {
				this.animationDraw(target);
			} else if (target.dataset.scroll === 'js-bg-color') {
				this.animationChangeBgColor(target);
			} else if (target.dataset.scroll === 'js-pin') {
				this.animationPin(target);
			} else if (target.dataset.scroll === 'js-sprite-images') {
				this.animationSpriteImages(target);
			} else if (target.dataset.scroll === 'js-horizontal-scroll') {
				this.animationHorizontalScroll(target);
			} else if (target.dataset.scroll === 'js-horizontal-scroll-section') {
				this.animationHorizontalScrollSection(target);
			} else if (target.dataset.scroll === 'js-comparison') {
				this.animationSomparison(target);
			} else if (target.dataset.scroll === 'js-parallax') {
				this.animationParallax(target);
			} else if (target.dataset.scroll === 'js-video') {
				this.animationVideo(target);
			} else {
				this.animationDefault(target);
			}
		}, 1000);
	}

	/**
	 * default Animation
	 */
	animationDefault(item) {
		const targetClass = item.dataset.scroll;

		ScrollTrigger.create({
			trigger: item,
			start: 'top 100%',
			toggleClass: targetClass,
			toggleActions: 'play none none none'
			// markers: true,
			// once: true,
		});
	}

	/**
	 * splitText Animation
	 */
	animationSplitText(item) {
		gsap.set(item, { autoAlpha: 1 });
		const targetSplitBy = item.dataset.scrollSplittext;
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 60%',
				scrub: targetScrub || false,
				// markers: true,
				toggleActions: 'play none play reset'
			}
		});

		if (targetSplitBy === 'chars') {
			const itemSplitted = new SplitText(item, { type: 'chars' });
			tl.from(itemSplitted.chars, {
				yPercent: 100,
				opacity: 0,
				stagger: 0.05,
				duration: 0.5,
				ease: 'back.inOut'
			});
		}

		if (targetSplitBy === 'words') {
			const itemSplitted = new SplitText(item, { type: 'words' });
			tl.from(itemSplitted.words, {
				yPercent: 100,
				opacity: 0,
				stagger: 0.05,
				duration: 0.5,
				ease: 'back.inOut'
			});
		}

		if (targetSplitBy === 'lines') {
			const itemSplitted = new SplitText(item, { type: 'lines' });
			tl.from(itemSplitted.lines, { y: 20, opacity: 0, stagger: 0.01, duration: 0.01, ease: 'back.inOut' });
		}
	}

	/**
	 * rotation Animation
	 */
	animationRotation(item) {
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 90%',
				end: 'bottom 80%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse'
			}
		});

		tl.from(item, {
			x: 400,
			rotation: 360
		});
	}

	/**
	 * batch Animation
	 */
	animationBatch(item) {
		const target = item.querySelectorAll('[data-scroll-target]');

		// gsap.set(target, { y: 100, opacity: 0 });

		ScrollTrigger.batch(target, {
			interval: 0.1, // time window (in seconds) for batching to occur.
			batchMax: 3, // maximum batch size (targets)
			onEnter: (batch) => gsap.to(batch, { autoAlpha: 1, stagger: 0.1, overwrite: true }),
			onLeave: (batch) => gsap.set(batch, { autoAlpha: 0, overwrite: true }),
			onEnterBack: (batch) => gsap.to(batch, { autoAlpha: 1, stagger: 0.1, overwrite: true }),
			onLeaveBack: (batch) => gsap.set(batch, { autoAlpha: 0, overwrite: true })
		});

		// ScrollTrigger.addEventListener('refreshInit', () =>
		// 	gsap.set(target, { y: 0 })
		// )
	}

	/**
	 * scale Animation
	 */
	animationScale(item) {
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				start: 'top 100%',
				end: 'bottom 0%',
				scrub: targetScrub || false,
				toggleActions: 'play none play reverse'
			}
		});

		tl.to(item, {
			scale: 1.5
		});
	}

	/**
	 * parallax Animation
	 */
	animationParallax(item) {
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				toggleActions: 'play pause none none',
				scrub: targetScrub || 2
			}
		});

		tl.to(item, {
			y: -item.dataset.scrollSpeedY * 100 || 0,
			x: -item.dataset.scrollSpeedX * 100 || 0
		});
	}

	/**
	 * video Animation
	 */
	animationVideo(item) {
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
				}
			}
		});
	}

	/**
	 * darwSvg Animation
	 */
	animationDraw(item) {
		const target = item.querySelectorAll('path');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: targetScrub || false,
				toggleActions: 'play none none none'
			}
		});

		tl.from(target, {
			drawSVG: 0
		});
	}

	/**
	 * backgroundColor Animation
	 */
	animationChangeBgColor(item) {
		const target = document.body;
		const targetColor = item.dataset.scrollBgcolor;

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: item,
				scrub: 1,
				toggleActions: 'play reset play reset'
			}
		});

		tl.to(target, {
			backgroundColor: targetColor,
			ease: 'power1'
		});
	}

	/**
	 * pin Animation
	 */
	animationPin(item) {
		const target = item.querySelectorAll('[data-scroll-target]');
		const targetElement = item.querySelectorAll('[data-scroll-target-animate]');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				// end: '+=200%',
				// toggleClass: 'active',
				scrub: targetScrub || false,
				pin: true,
				pinReparent: true,
				anticipatePin: 1
			}
		});

		tl.from(targetElement, {
			scale: 0.6,
			transformOrigin: 'center center'
		});
	}

	/**
	 * pin Image Sequence https://codepen.io/GreenSock/pen/yLOVJxd
	 */
	animationSpriteImages(item) {
		const target = item.querySelector('[data-scroll-target]');
		const canvas = item.querySelector('[data-scroll-canvas]');
		const targetContainer = item.querySelector('[data-scroll-target-animate]');
		const context = canvas.getContext('2d');
		const frameCount = parseInt(item.dataset.scrollFrames, 10);
		const framePath = item.dataset.scrollPath;

		canvas.width = 900;
		canvas.height = 859;

		const currentFrame = (index) => `${framePath}/${(index + 1).toString().padStart(4, '0')}.jpg`;
		// `https://www.apple.com/105/media/us/airpods-pro/2019/1299e2f5_9206_4470_b28e_08307a42f19b/anim/sequence/large/01-hero-lightpass/${(index + 1).toString().padStart(4, '0')}.jpg`

		const images = [];
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
				pinReparent: true,
				anticipatePin: 1
			}
		});

		tl.to(
			frames,
			{
				frame: frameCount - 1,
				snap: 'frame',
				onUpdate: render,
				duration: 20
			},
			'together'
		).fromTo(targetContainer, { scale: 0.95 }, { scale: 1, duration: 20 }, 'together');

		images[0].onload = render;

		function render() {
			context.clearRect(0, 0, canvas.width, canvas.height);
			context.drawImage(images[frames.frame], 0, 0);
		}
	}

	/**
	 * pin Horizontal Animation
	 */
	animationHorizontalScroll(item) {
		const target = item.querySelector('[data-scroll-target]');
		const targetContainer = item.querySelector('[data-scroll-target-animate]');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		gsap.to(targetContainer, {
			x: () => -targetContainer.getBoundingClientRect().width + target.getBoundingClientRect().width,
			ease: 'none',
			scrollTrigger: {
				trigger: target,
				invalidateOnRefresh: true,
				start: 'center center',
				end: () => '+=' + targetContainer.offsetWidth,
				pin: true,
				pinReparent: true,
				anticipatePin: 1,
				scrub: targetScrub || false
			}
		});
	}

	/**
	 * pin Horizontal Section Animation
	 */
	animationHorizontalScrollSection(item) {
		const target = item.querySelector('[data-scroll-target]');
		const section = item.querySelectorAll('[data-scroll-section]');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const sections = gsap.utils.toArray(section);

		let maxWidth = 0;

		const getMaxWidth = () => {
			maxWidth = 0;
			sections.forEach((section) => {
				maxWidth += section.offsetWidth;
			});
		};
		getMaxWidth();
		ScrollTrigger.addEventListener('refreshInit', getMaxWidth);

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
				invalidateOnRefresh: true
			}
		});

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
					(sct.offsetLeft - window.innerWidth / 2) * (maxWidth / (maxWidth - window.innerWidth)),
				end: () => '+=' + sct.offsetWidth * (maxWidth / (maxWidth - window.innerWidth)),
				toggleClass: { targets: sct, className: 'active' }
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
			});
		});

		// SKEW: make the right edge "stick" to the scroll bar. force3D: true improves performance
		// gsap.set(section, { transformOrigin: 'center center', force3D: true })
		// END SKEW
	}

	/**
	 * comparison Animation
	 */
	animationSomparison(item) {
		const target = item.querySelector('[data-scroll-target]');
		const targetMedia = item.querySelectorAll('[data-scroll-target-media]');
		const targetImage = item.querySelectorAll('[data-scroll-target-media] img');
		const targetScrub = parseInt(item.dataset.scrollScrub, 10);

		const tl = gsap.timeline({
			scrollTrigger: {
				trigger: target,
				start: 'center center',
				end: () => `+=${target.offsetWidth}`,
				scrub: targetScrub || false,
				pin: true,
				pinReparent: true,
				anticipatePin: 1
			},
			defaults: { ease: 'none' }
		});

		tl.fromTo(targetMedia, { xPercent: 100, x: 0 }, { xPercent: 0 }).fromTo(
			targetImage,
			{ xPercent: -100, x: 0 },
			{ xPercent: 0 },
			0
		);
	}
}
