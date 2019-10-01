import TweenMax from 'gsap/TweenMax';
import AbstractComponent from './abstractComponent';

const imagesLoaded = require('imagesloaded');
const isMobile = require('ismobilejs');

export default class Loader extends AbstractComponent {
	constructor() {
		super();
		this.DOM = { element: document.getElementById('js-loader') };
		this.DOM.html = document.documentElement;
		this.DOM.body = document.body;
		this.DOM.background = document.getElementById('js-loader-bg');
		this.DOM.content = document.getElementById('js-loader-content');
		this.tlLoader = new TimelineLite();
		this.tlLoaderContent = new TimelineLite({
			delay: 0.2,
		});

		imagesLoaded(this.DOM.body, { background: true }, this.init());
	}

	init() {
		if (this.DOM.element.length === 0) {
			return;
		}

		// Reset Scroll
		window.scrollTo(0, 0);

		// Update body class
		this.DOM.html.classList.remove('is-loading');
		this.DOM.html.classList.add('is-loaded');

		if (isMobile.any) {
			this.DOM.html.classList.add('is-mobile');
		}

		// Animations
		this.tlLoader.to(this.DOM.background, 1.5, {
			yPercent: 100,
			force3D: true,
			rotation: 0.01,
			ease: Quart.easeInOut,
			onComplete: () => {
				// Update body class
				this.DOM.html.classList.add('is-loader-complete');
				// Hide loader
				this.DOM.element.classList.add('display-none');
			},
		});

		this.tlLoaderContent.to(this.DOM.content, 0.8, {
			ease: Power3.easeOut,
			y: 65,
			opacity: 0,
		});
	}
}
