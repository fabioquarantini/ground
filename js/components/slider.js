/**
 * Slider module
 * Modern mobile touch slider with hardware accelerated transitions
 * @see http://idangero.us/swiper
 */
//import Swiper from 'swiper/bundle';
import {
	Swiper,
	Navigation,
	Pagination,
	Autoplay,
	Lazy,
	EffectFade,
} from 'swiper'

const Deepmerge = require('deepmerge')

Swiper.use([Navigation, Pagination, Autoplay, Lazy, EffectFade])
export default class Slider {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.js-slider'
		this.defaults = {
			init: true,
			initialSlide: 0,
			direction: 'horizontal',
			speed: 1600,
			loop: true,
			effect: 'slide',
			autoHeight: false,
			parallax: false,
			preloadImages: true,
			observer: true,
			observeParents: true,
			lazy: {
				loadPrevNext: true,
				loadPrevNextAmount: 1,
				loadOnTransitionStart: true,
			},
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.js-slider-primary-pagination',
				clickable: true,
				type: 'bullets',
			},
			navigation: {
				prevEl: '.js-slider-primary-navigation-prev',
				nextEl: '.js-slider-primary-navigation-next',
			},
			slidesPerView: 1,
			spaceBetween: 0,
			breakpointsInverse: true,
			/* breakpoints: {
				// when window width is >= xs
				480: {
					slidesPerView: 1,
					// slidesPerView: 'auto',
					// freeMode: true,
					// spaceBetween: 48
				},
				// when window width is >= sm
				768: {
					slidesPerView: 1,
					// freeMode: false,
				},
				// when window width is >= md
				992: {
					slidesPerView: 1,
				},
				// when window width is >= lg
				1200: {
					slidesPerView: 1,
				},
				// when window width is >= xl
				1440: {
					slidesPerView: 1,
				},
			}, */
		}
		this.options = options
			? Deepmerge(this.defaults, options)
			: this.defaults

		window.addEventListener('DOMContentLoaded', () => {
			this.init()
		})

		window.addEventListener('NAVIGATE_END', () => {
			this.init()
		})

		window.addEventListener('infiniteScrollAppended', () => {
			this.init()
		})
	}

	/**
	 * Initialize plugin
	 */
	init() {
		if (document.querySelectorAll(this.element).length === 0) {
			return
		}

		this.slider = new Swiper(this.element, this.options)
	}

	/**
	 * Start autoplay
	 */
	autoplayStart() {
		if (this.slider === undefined) {
			return
		}
		this.slider.autoplay.start()
	}

	/**
	 * Stop autoplay
	 */
	autoplayStop() {
		if (this.slider === undefined) {
			return
		}
		this.slider.autoplay.stop()
	}

	/**
	 * Destroy slider instance and detach all events listeners
	 * @param {boolean} deleteInstance - Set it to false (by default it is true) to not to delete Swiper instance
	 * @param {boolean} cleanStyles - Set it to true (by default it is true) and all custom styles will be removed from slides, wrapper and container.
	 */
	destroy(deleteInstance, cleanStyles) {
		if (this.slider === undefined) {
			return
		}
		this.slider.destroy(deleteInstance, cleanStyles)
	}

	/**
	 * Run transition to previous slide
	 * @param {number} speed - transition duration (in ms). Optional
	 * @param {boolean} runCallbacks Set it to false (by default it is true) and transition will not produce transition events. Optional
	 */
	slidePrev(speed, runCallbacks) {
		if (this.slider === undefined) {
			return
		}
		this.slider.slidePrev(speed, runCallbacks)
	}

	/**
	 * Run transition to next slide
	 * @param {number} speed - transition duration (in ms). Optional
	 * @param {boolean} runCallbacks - Set it to false (by default it is true) and transition will not produce transition events. Optional
	 */
	slideNext(speed, runCallbacks) {
		if (this.slider === undefined) {
			return
		}
		this.slider.slideNext(speed, runCallbacks)
	}

	/**
	 * Run transition to the slide with index number equal to 'index' parameter for the duration equal to 'speed' parameter.
	 * @param {number} index - index number of slide
	 * @param {number} speed - transition duration (in ms). Optional
	 * @param {boolean} runCallbacks Set it to false (by default it is true) and transition will not produce transition events. Optional
	 */
	slideTo(index, speed, runCallbacks) {
		if (this.slider === undefined) {
			return
		}
		this.slider.slideTo(index, speed, runCallbacks)
	}
}
