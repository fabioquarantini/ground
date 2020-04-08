import { gsap } from 'gsap';
import isMobile from 'ismobilejs';
import AbstractComponent from './abstractComponent';

const imagesLoaded = require('imagesloaded');

export default class Loader extends AbstractComponent {
	constructor() {
		super();
		this.DOM = { element: document.getElementById('js-loader') };
		this.DOM.html = document.documentElement;
		this.DOM.body = document.body;
		this.DOM.background = document.getElementById('js-loader-bg');
		this.DOM.content = document.getElementById('js-loader-content');
		// If false disable loader animation: Remove HTML partials/loader.php
		this.animation = true;

		imagesLoaded(this.DOM.body, { background: true }, () => {
			this.init();
		});
	}

	init() {
		this.DOM.html.classList.remove('has-no-js');
		this.DOM.html.classList.add('has-js', 'is-loaded');

		if (this.DOM.element.length === 0) {
			return;
		}

		// Reset Scroll
		window.scrollTo(0, 0);

		// Update html class
		this.DOM.html.classList.remove('is-loading');
		this.DOM.html.classList.add('is-loaded');

		if (isMobile().any) {
			this.DOM.html.classList.add('is-mobile');
		}

		if (this.animation) {
			this.reveal();
		} else {
			this.DOM.html.classList.add('is-loader-complete');
		}
	}

	reveal() {
		this.tlLoader = gsap.timeline();
		this.tlLoaderContent = gsap.timeline({
			delay: 0.2,
		});

		// Animations
		this.tlLoader.to(this.DOM.background, {
			duration: 1.5,
			yPercent: 100,
			force3D: true,
			rotation: 0.01,
			ease: 'power3.inOut',
			onComplete: () => {
				// Update html class
				this.DOM.html.classList.add('is-loader-complete');
				// Hide loader
				this.DOM.element.classList.add('display-none');
			},
		});

		this.tlLoaderContent.to(this.DOM.content, {
			duration: 0.8,
			ease: 'power3.out',
			y: 65,
			opacity: 0,
		});
	}
}
