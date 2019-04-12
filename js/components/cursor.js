/**
 * Cursor module
 * Mouse interactions
 */
import * as deepmerge from 'deepmerge';
import Utilities from '../utilities/utilities';
const isMobile = require('ismobilejs');

export default class Cursor {
	constructor(el) {
		this.element = document.getElementById('js-cursor');
		this.outerCursor = document.getElementById('js-cursor-outer');
		this.icon = document.getElementById('js-cursor-icon');
		this.bounds = this.element.getBoundingClientRect();
		this.amount = {
			inner: 0.15,
			outer: 0.15
		};
		this.scale = 1;
		this.opacity = 1;
		this.mousePos = {
			x: -100,
			y: -100
		};
		this.lastMousePos = {
			x: 0,
			y: 0
		};
		this.lastScale = 1;
		this.lastOpacity = 1;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_IN', () => {
			console.log('in');
		});


		window.addEventListener('NAVIGATE_END', () => {
			console.log('end');
			this.init();
		});

		window.addEventListener('fancyboxOnActivate', () => {
			this.init();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			// Alla seconda chiamata vengono doppiati gli eventi
			this.init();
		});

		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroyEvents();
			console.log('out');
		});
	}

	init() {
		if (isMobile.any && document.querySelectorAll(this.element).length == 0) {
			return;
		}

		this.initEvents();
		//TODO: togliere il request animation frame alla chiusura  window.cancelAnimationFrame(this.requestId);
		requestAnimationFrame(() => this.render());


		/*let root = document;
		var that = this;
		function bindedUpdateNode(mutationsList, observer) {
			for(var mutation of mutationsList) {
				if (mutation.type == 'childList') {
					if (mutation.addedNodes) {
						root = mutation.addedNodes;
						that.initEvents(root);
					}
				}
				else if (mutation.type == 'attributes') {
					console.log('The ' + mutation.attributeName + ' attribute was modified.', mutation);
				}
			}
		}*/

		function bindedUpdateNode(mutationsList, observer) {
			for(var mutation of mutationsList) {
				if (mutation.type == 'childList') {
					if (mutation.addedNodes.length > 0) {
						console.log('A child node has been added.');
						//console.log(mutation);
						console.log(mutation.addedNodes);
					}
				}
				else if (mutation.type == 'attributes') {
					console.log('The ' + mutation.attributeName + ' attribute was modified.');
				}
			}
		}

		this.domObserver = new window.MutationObserver(bindedUpdateNode);
		this.domObserver.observe(document.body, {
			childList: true,
			attributes: false,
			characterData: false,
			subtree: true
		});
	}

	initEvents() {
		window.addEventListener('mousemove', event => this.mousePosition(event));

		// TODO: non aggiorna i nuovi selettori ajax
		[
			...document.querySelectorAll('a, .slider__navigation, .button, [data-fancybox="gallery"], .fancybox-button')
		].forEach(link => {
			//console.log("links", link);
			link.addEventListener('mouseenter', event => this.enter(event));
			link.addEventListener('mouseleave', event => this.leave(event));
			link.addEventListener('click', event => this.click(event));
		});
	}

	render() {
		this.lastMousePos.x = Utilities.lerp(
			this.lastMousePos.x,
			this.mousePos.x - this.bounds.width / 2,
			this.amount.outer
		);
		this.lastMousePos.y = Utilities.lerp(
			this.lastMousePos.y,
			this.mousePos.y - this.bounds.height / 2,
			this.amount.outer
		);
		this.lastScale = Utilities.lerp(this.lastScale, this.scale, 0.15);
		this.lastOpacity = Utilities.lerp(this.lastOpacity, this.opacity, 0.1);
		this.element.style.transform = `translateX(${this.lastMousePos.x}px) translateY(${this.lastMousePos.y}px)`;
		this.outerCursor.style.transform = `scale(${this.lastScale})`;
		this.outerCursor.style.opacity = this.lastOpacity;
		requestAnimationFrame(() => this.render());
	}

	mousePosition(event) {
		this.mousePos = Utilities.getMousePosition(event);
	}

	enter(event) {
		this.scale = 2;
		this.toggle(event);
	}

	leave(event) {
		this.scale = 1;
		this.toggle(event);
	}

	toggle(event) {
		this.element.classList.toggle('is-cursor-hover');

		if (
			event.target.classList.contains('slider__navigation') ||
			event.target.classList.contains('fancybox-button')
		) {
			this.element.classList.toggle('is-cursor-navigation');
		}

		if (
			event.target.classList.contains('slider__navigation--next') ||
			event.target.classList.contains('fancybox-button--arrow_right')
		) {
			this.icon.classList.toggle('icon-arrow-right');
		}

		if (
			event.target.classList.contains('slider__navigation--prev') ||
			event.target.classList.contains('fancybox-button--arrow_left')
		) {
			this.icon.classList.toggle('icon-arrow-left');
		}

		if (event.target.classList.contains('fancybox-button--close')) {
			this.icon.classList.toggle('icon-close');
		}

		if (event.target.hasAttribute('data-fancybox')) {
			this.element.classList.toggle('is-cursor-zoom');
			this.icon.classList.toggle('icon-plus');
		}

		if (event.target.classList.contains('js-cursor-hide')) {
			this.element.classList.toggle('is-cursor-hide');
		}
	}

	click(event) {
		this.lastScale = 1;
		this.lastOpacity = 0;
	}

	destroy() {}

	destroyEvents() {
		//this.domObserver.disconnect();

		// TODO detroy events
		window.removeEventListener('mousemove', event => this.mousePosition(event));

		[
			...document.querySelectorAll('a, .slider__navigation, .button, [data-fancybox="gallery"], .fancybox-button')
		].forEach(link => {
			link.removeEventListener('mouseenter', event => this.enter(event));
			link.removeEventListener('mouseleave', event => this.leave(event));
			link.removeEventListener('click', event => this.click(event));
		});
	}
}
