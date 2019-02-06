import Swiper from 'swiper';
import TweenMax from 'gsap/TweenMax';
import Debug from '../utilities/debug.js';

export default class Slider {
	constructor(classToAttach, options) {
		this.$el = classToAttach;
		this.options = options || {};
		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.animateIn();
		});
		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
			this.animateIn();
		});
		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroy();
		});
	}

	init() {
		if (document.querySelectorAll(this.$el).length == 0) {
			return;
		}

		this.slider = new Swiper(this.$el, {
			init: (this.options.init == false) ? false : true,
			direction: this.options.direction || 'horizontal',
			loop: (this.options.loop == false) ? false : true,
			effect: this.options.effect || 'fade',
			autoHeight: (this.options.autoHeight == true) ? true : false,
			parallax: (this.options.parallax == false) ? false : true,
			preloadImages: (this.options.preloadImages == false) ? false : false,
			lazy: this.options.lazy || {
				loadPrevNext: true,
				loadPrevNextAmount: 1,
				loadOnTransitionStart: true,
			},
			autoplay: this.options.autoplay || {
				delay: 5000
			},
			pagination: this.options.pagination || {
				el: '.js-slider-primary-pagination',
				clickable: true
			},
			navigation: this.options.navigation || {
				prevEl: '.js-slider-primary-navigation-prev',
				nextEl: '.js-slider-primary-navigation-next'
			},
			speed: 800,
			slidesPerView: this.options.slidesPerView || 1,
			spaceBetween: this.options.spaceBetween || 0,
			breakpoints: this.options.breakpoints || {
				// when window width is <= 320px
				320: {
					slidesPerView: 1
				},
				992: {
					slidesPerView: 1
				}
			}
		});
	}

	start() {
		if (this.slider === undefined) {
			Debug.error('Slider does not exist');
			return;
		}
		this.slider.init();
	}

	play() {
		if (this.slider === undefined) {
			Debug.error('Slider does not exist');
			return;
		}
		this.slider.autoplay.start();
	}

	stop() {
		if (this.slider === undefined) {
			Debug.error('Slider does not exist');
			return;
		}
		this.slider.autoplay.stop();
	}

	destroy() {
		if (this.slider === undefined) {
			Debug.error('Slider does not exist');
			return;
		} else {
			this.slider.destroy(true, false);
		}
	}

	animateIn() {
		if (this.slider === undefined) {
			Debug.error('Slider does not exist');
			return;
		} else {
			const $activeSlide = $(this.$el).find('.swiper-slide-active');
			const $activeSlideImage = $activeSlide.find('.slider__img');

			TweenMax.from($activeSlideImage, 1, {
				force3D: true,
				scale: 1.15,
				delay: 0.4,
				ease: Power2.easeOut
			});
		}
	}
}