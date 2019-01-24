import imagesLoaded from 'imagesLoaded';
import Debug from '../utilities/debug.js';
import TimelineLite from 'gsap/TimelineLite';

export default class Loader {
	constructor() {
		this.$el = $('.js-loader');
		this.$elBg = this.$el.find('.loader__bg');
		this.$elContent = this.$el.find('.loader__content');
		this.tlLoader = new TimelineLite();
		this.tlLoaderContent = new TimelineLite({
			delay: 0.2
		});

		$('body').imagesLoaded({ background: true }, () => {
			this.init();
		});
	}

	init() {
		if (this.$el.length == 0) {
			return;
		}
		window.scrollTo(0, 0);
		this.tlLoader.to(this.$elBg, 1.5, {
			yPercent: -100,
			force3D: true,
			rotation: 0.01,
			ease: Quart.easeInOut,
			onComplete: () => {
				document.body.classList.remove('is-loading');
				document.body.classList.add('is-loaded');
				this.$el.hide();
			}
		});
		this.tlLoaderContent.to(this.$elContent, 0.8, {
			ease: Power3.easeOut,
			y: -65,
			opacity: 0
		});
	}

	destroy() {
		this.$el.remove();
	}
}
