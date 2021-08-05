/* eslint-disable no-unused-vars */
import { gsap } from 'gsap';
import InfiniteScroll from './components/infiniteScroll';
import Modal from './components/modal';
// import AjaxNavigation from './components/ajaxNavigation';
import Slider from './components/slider';
import Loader from './components/loader';
import Toggle from './components/toggle';

import Cursor from './components/cursorV2';
import Search from './components/search';
import Magnet from './components/magnetV2';
import Billing from './components/billing';
import GdprCompliance from './components/gdprCompliance';

// Animations
import AnimationAll from './animations/animationAll';
import AnimationsFlip from './animations/animationsFlip';
// import AnimationBatch from './animations/animationBatch'
// import AnimationChangeBgColor from './animations/animationChangeBgColor'
// import AnimationComparison from './animations/animationComparison'
// import AnimationDraw from './animations/animationDraw'
// import AnimationHorizontalScroll from './animations/animationHorizontalScroll'
// import AnimationHorizontalScrollSection from './animations/animationHorizontalScrollSection'
// import AnimationParallax from './animations/animationParallax'
// import AnimationPin from './animations/animationPin'
// import AnimationRotation from './animations/animationRotation'
// import AnimationScale from './animations/animationScale'
// import AnimationSplitText from './animations/animationSplitText'
// import AnimationSpriteImages from './animations/animationSpriteImages'
// import AnimationVideo from './animations/animationVideo'
import AnimationWebGl from './animations/animationWebGl';
// import AnimationDefault from './animations/animationDefault'

const infiniteScroll = new InfiniteScroll();
const loader = new Loader();
const modal = new Modal();
// const ajaxNavigation = new AjaxNavigation();
const sliderPrimary = new Slider('.js-slider-primary');
const toggle = new Toggle();
const billing = new Billing();

const cursor = new Cursor();
const search = new Search();
const magnet = new Magnet();
const gdprCompliance = new GdprCompliance();

// Animations
// const animationBatch = new AnimationBatch()
// const animationChangeBgColor = new AnimationChangeBgColor()
// const animationComparison = new AnimationComparison()
// const animationDraw = new AnimationDraw()
// const animationHorizontalScroll = new AnimationHorizontalScroll()
// const animationHorizontalScrollSection = new AnimationHorizontalScrollSection()
// const animationParallax = new AnimationParallax()
// const animationRotation = new AnimationRotation()
// const animationScale = new AnimationScale()
// const animationSpriteImages = new AnimationSpriteImages()
// const animationVideo = new AnimationVideo()
const animationWebGl = new AnimationWebGl();
// const animationSplitText = new AnimationSplitText()
// const animationPin = new AnimationPin()
// const animationDefault = new AnimationDefault()
const animationAll = new AnimationAll();
const animationsFlip = new AnimationsFlip();

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
			spaceBetween: 80
		}
	}
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
		type: 'progressbar'
	},
	on: {
		touchStart() {
			const swiper = this;
			for (let i = 0; i < swiper.slides.length; i++) {
				gsap.to(swiper.slides[i], {
					duration: 0.6,
					ease: 'circ.out',
					scale: 0.9
				});
				gsap.to(swiper.slides[i].querySelector('.carousel__media'), {
					duration: 2,
					ease: 'circ.out',
					scale: 1.2
				});
			}
		},
		touchEnd() {
			const swiper = this;
			for (let i = 0; i < swiper.slides.length; i++) {
				gsap.to(swiper.slides[i], {
					duration: 0.2,
					ease: 'circ.out',
					scale: 1
				});
				gsap.to(swiper.slides[i].querySelector('.carousel__media'), {
					duration: 0.2,
					ease: 'circ.out',
					scale: 1
				});
			}
		}
	}
});
