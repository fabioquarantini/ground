/**
 * Loader module
 * Initial site loader
 */
import { gsap } from 'gsap';
import isMobile from 'ismobilejs';
import { trigger } from '../utilities/trigger';

const imagesLoaded = require('imagesloaded');
const Deepmerge = require('deepmerge');

export default class Loader {
	constructor(options) {
		this.defaults = {
			animation: false
		};
		this.DOM = {
			html: document.documentElement,
			body: document.body
		};

		this.options = options ? Deepmerge(this.defaults, options) : this.defaults;

		imagesLoaded(this.DOM.body, { background: true }, () => {
			this.init();
		});
	}

	init() {
		this.DOM.html.classList.remove('has-no-js');
		this.DOM.html.classList.add('has-js', 'is-loaded');

		// Reset Scroll
		// window.scrollTo(0, 0);

		// Update html class
		this.DOM.html.classList.remove('is-loading');
		this.DOM.html.classList.add('is-loaded');

		if (isMobile().any) {
			this.DOM.html.classList.add('is-mobile');
		}

		this.onLoaderComplete();
	}

	onLoaderComplete() {
		this.DOM.html.classList.add('is-loader-complete');
		trigger('LOADER_COMPLETE');
	}
}
