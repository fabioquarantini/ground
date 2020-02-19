/* eslint-disable no-unused-vars */

import 'lazysizes';
import InfiniteScroll from './components/infiniteScroll';
import Modal from './components/modal';
import AjaxNavigation from './components/ajaxNavigation';
import Slider from './components/slider';
import Parallax from './components/parallax';
import Loader from './components/loader';
import Split from './components/split';
import Toggle from './components/toggle';
// import ScrollOld from './components/scrollOld';
import Scroll from './components/scroll';
import ScrollUpdate from './components/scrollUpdate';
import Cursor from './components/cursor';
import Search from './components/search';
import Magnet from './components/magnet';
import Example from './components/example';


const infiniteScroll = new InfiniteScroll();
const loader = new Loader();
const modal = new Modal();
const ajaxNavigation = new AjaxNavigation();
const sliderPrimary = new Slider('.js-slider-primary');
const split = new Split();
const toggle = new Toggle();
// const scrollOld = new ScrollOld();
const scroll = new Scroll();
const scrollUpdate = new ScrollUpdate();
const parallax = new Parallax();
const cursor = new Cursor();
const search = new Search();
const magnet = new Magnet();
// const example = new Example();


const sliderGallery = new Slider('.js-slider-gallery', {
	direction: 'horizontal',
	loop: false,
	effect: 'slide',
	speed: 1000,
	autoHeight: false,
	parallax: true,
	autoplay: false,
	slidesPerView: 1,
	spaceBetween: 40,
	breakpoints: {
		// when window width is >= xl
		1440: {
			speed: 1400,
			spaceBetween: 80,
		},
	},
});

const carousel = new Slider('.js-carousel', {
	loop: false,
	autoHeight: false,
	effect: 'slide',
	slidesPerView: 'auto',
	spaceBetween: 30,
	parallax: false,
	autoplay: false,
	freeMode: true,
	touchEventsTarget: '.swiper-wrapper',
	pagination: {
		el: '.swiper-pagination',
		type: 'progressbar',
	},
	on: {
		touchStart() {
			const swiper = this;
			for (let i = 0; i < swiper.slides.length; i++) {
				TweenMax.to(swiper.slides[i], 0.6, { ease: Circ.easeOut, scale: 0.9 });
				TweenMax.to(swiper.slides[i].querySelector('.carousel__media'), 2, { ease: Circ.easeOut, scale: 1.2 });
			}
		},
		touchEnd() {
			const swiper = this;
			for (let i = 0; i < swiper.slides.length; i++) {
				TweenMax.to(swiper.slides[i], 0.2, { ease: Circ.easeOut, scale: 1 });
				TweenMax.to(swiper.slides[i].querySelector('.carousel__media'), 0.2, { ease: Circ.easeOut, scale: 1 });
			}
		},
	},
});
