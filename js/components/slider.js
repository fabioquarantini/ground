import Swiper from 'swiper';
import Debug from '../utilities/debug.js';

export default class Slider {
	constructor(classToAttach, options) {
		this.el = classToAttach;
		this.options = options || {};
		window.addEventListener('DOMContentLoaded', this.init());
		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});
		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroy();
		});
	}

	init() {
		if (document.querySelectorAll(this.el).length == 0) {
			Debug.error('DOM node does not exist');
			return;
		}

		Debug.log('slider init');
		this.slider = new Swiper(this.el, {
			init: (this.options.init == false) ? false : true,
			direction: this.options.direction || 'horizontal',
			loop: (this.options.loop == false) ? false : true,
			effect: this.options.effect || 'slide',
			autoHeight: (this.options.autoHeight == false) ? false : true,
			parallax: (this.options.parallax == false) ? false : true,
			preloadImages: (this.options.preloadImages == false) ? false : false,
			lazy: this.options.lazy || {
				loadPrevNext: true,
				loadPrevNextAmount: 1,
				loadOnTransitionStart: true,
			},
			autoplay: this.options.autoplay || {
				delay: 3000
			},
			pagination: this.options.pagination || {
				el: '.js-slider-primary-pagination',
				clickable: true
			},
			navigation: this.options.navigation || {
				prevEl: '.js-slider-primary-navigation-prev',
				nextEl: '.js-slider-primary-navigation-next'
			},
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
}