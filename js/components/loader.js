import imagesLoaded from 'imagesLoaded';
import TweenMax from 'gsap/TweenMax';

export default class Loader {
	constructor() {
		this.DOM = { element: document.getElementById('js-loader')};
		this.DOM.body = document.body;
		this.DOM.background = document.getElementById('js-loader-bg');
		this.DOM.content = document.getElementById('js-loader-content');
		this.tlLoader = new TimelineLite();
		this.tlLoaderContent = new TimelineLite({
			delay: 0.2
		});

		new imagesLoaded(this.DOM.body, { background: true }, this.init());
	}

	init() {
		if (!this.DOM.element) {
			return;
		}
		// Reset Scroll
		window.scrollTo(0, 0);

		// Update body class
		this.DOM.body.classList.replace('is-loading', 'is-loaded');

		// Animations
		this.tlLoader.to(this.DOM.background, 1.5, {
			yPercent: 100,
			force3D: true,
			rotation: 0.01,
			ease: Quart.easeInOut,
			onComplete: () => {
				// Update body class
				this.DOM.body.classList.add('is-loader-complete');
				// Hide loader
				this.DOM.element.classList.add('display-none');
			}
		});
		this.tlLoaderContent.to(this.DOM.content, 0.8, {
			ease: Power3.easeOut,
			y: 65,
			opacity: 0
		});
	}
}
