import imagesLoaded from 'imagesLoaded';
import Debug from '../utilities/debug.js';

export default class Preloader {
	constructor() {
		this.$el = $('.js-preloader');
		$('body').imagesLoaded({ background: true }, () => {
			this.init();
		});
	}

	init() {
		if (this.$el.length == 0) {
			Debug.error('DOM node does not exist');
			return;
		}
		window.scrollTo(0, 0);
		document.body.classList.add('is-loaded');
		this.$el.fadeOut();
	}

	destroy() {
		this.$el.remove();
	}
}
