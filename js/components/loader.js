import imagesLoaded from 'imagesLoaded';
import TweenMax from 'gsap/TweenMax';
const isMobile = require('ismobilejs');


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
		if (this.element.length == 0) {
			return;
		}

		// Reset Scroll
		window.scrollTo(0, 0);

		// Update body class
		this.DOM.body.classList.replace('is-loading', 'is-loaded');

		if (isMobile.any) {
			document.body.classList.add('is-mobile');
		}

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
