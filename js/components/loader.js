/**
 * Loader module
 * Initial site loader
 */

import { gsap } from 'gsap';
import isMobile from 'ismobilejs';
import Dispatcher from '../utilities/dispatcher';

const imagesLoaded = require('imagesloaded');
const Deepmerge = require('deepmerge');

export default class Loader {
	constructor(options) {
		this.defaults = {
			animation: true
		};

		this.DOM = {
			html: document.documentElement,
			body: document.body,
			element: document.getElementById('js-loader'),
			background: document.getElementById('js-loader-bg'),
			content: document.getElementById('js-loader-content'),
		};

		this.options = options ? Deepmerge(this.defaults, options) : this.defaults;

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

		if (this.options.animation) {
			this.reveal();
		} else {
			this.onLoaderComplete();
		}
	}

	reveal() {
		this.tlLoader = gsap.timeline();
		this.tlLoaderContent = gsap.timeline({
			delay: 0.2,
		});

		this.tlLoader.to(this.DOM.background, {
			duration: 1.5,
			yPercent: 100,
			force3D: true,
			rotation: 0.01,
			ease: 'power3.inOut',
			onComplete: () => {
				this.onLoaderComplete();
			},
		});

		this.tlLoaderContent.to(this.DOM.content, {
			duration: 0.8,
			ease: 'power3.out',
			y: 65,
			opacity: 0,
		});
	}

	onLoaderComplete() {
		this.DOM.html.classList.add('is-loader-complete');
		if ( this.DOM.scrollProgress !== null ) {
			this.DOM.element.classList.add('display-none');
		}
		Dispatcher.trigger('LOADER_COMPLETE');
	}
}
