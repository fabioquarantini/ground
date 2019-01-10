require('@fancyapps/fancybox');
import Debug from '../utilities/debug.js';

export default class Modal {
	constructor(classToAttach, options) {
		//this.el = (classToAttach) ? $('[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"], ' + classToAttach) : $('[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]');
		this.el = (classToAttach) ? document.querySelectorAll(classToAttach) : document.querySelectorAll('[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]');
		console.log(this.el);
		this.options = options || {};
		window.addEventListener('DOMContentLoaded', this.init());
		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});
		window.addEventListener('NAVIGATE_OUT', () => {
			//this.destroy();
		});
	}

	init() {
		if (this.el.length == 0) {
			Debug.error('DOM node does not exist');
			return;
		}

		$(this.el).fancybox();
	}
}