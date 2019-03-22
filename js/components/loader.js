import imagesLoaded from 'imagesLoaded';
import TweenMax from 'gsap/TweenMax';

export default class Loader {
	constructor() {
		this.element = document.getElementById('js-loader');
		this.elementBg = document.getElementById('js-loader-bg');
		this.elementContent = document.getElementById('js-loader-content');
		this.tlLoader = new TimelineLite();
		this.tlLoaderContent = new TimelineLite({
			delay: 0.2
		});

		new imagesLoaded(document.body, { background: true }, this.init());
	}

	init() {
		if (this.element.length == 0) {
			return;
		}
		// Reset Scroll
		window.scrollTo(0, 0);

		// Update body class
		document.body.classList.replace('is-loading', 'is-loaded');


		// Animations
		this.tlLoader.to(this.elementBg, 1.5, {
			yPercent: 100,
			force3D: true,
			rotation: 0.01,
			ease: Quart.easeInOut,
			onComplete: () => {
				// Update body class
				document.body.classList.add('is-loader-complete');
				// Hide loader
				this.element.classList.add('display-none');
			}
		});
		this.tlLoaderContent.to(this.elementContent, 0.8, {
			ease: Power3.easeOut,
			y: 65,
			opacity: 0
		});
	}
}
