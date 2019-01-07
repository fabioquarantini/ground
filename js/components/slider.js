import Swiper from 'swiper';

export default class Slider {
	constructor(classToAttach) {
		window.addEventListener('DOMContentLoaded', this.init());
		//TODO: fix highway event
		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});
	}

	init() {
		var $el = $('.js-slider-primary');

		if ($el.length == 0) {
			// TODO: log error?
			return;
		}

		var slider = new Swiper($el, {
			//init: false,
			direction: 'horizontal',
			loop: true,
			effect: 'slide',
			autoHeight: false,
			parallax: true,
			preloadImages: false,
			lazy: {
				loadPrevNext: true,
				loadPrevNextAmount: 1,
				loadOnTransitionStart: true,
			},
			autoplay: {
				delay: 3000
			},
			pagination: {
				el: '.js-slider-primary-pagination',
				clickable: true
			},
			navigation: {
				prevEl: '.js-slider-primary-navigation-prev',
				nextEl: '.js-slider-primary-navigation-next'
			},
			slidesPerView: 1,
			spaceBetween: 0,
			breakpoints: {
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

	play() {
		if (this.slider === undefined) {
			return;
		}
		this.slider.autoplay.start();
	}

	stop() {
		this.slider.autoplay.stop();
	}

	destroy() {
		this.slider.destroy();
	}
}
