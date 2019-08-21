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

		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroyEvents();
		});
	}

	init() {
		if (isMobile.any && document.querySelectorAll(this.element).length == 0) {
			return;
		}

		this.initEvents();
		//TODO: togliere il request animation frame alla chiusura  window.cancelAnimationFrame(this.requestId);
		requestAnimationFrame(() => this.render());

		let root = document;
		var that = this;
		// function bindedUpdateNode(mutationsList, observer) {
		// 	for(var mutation of mutationsList) {
		// 		if (mutation.type == 'childList') {
		// 			if (mutation.addedNodes) {
		// 				root = mutation.addedNodes;
		// 				that.initEvents(root);
		// 			}
		// 		}
		// 		else if (mutation.type == 'attributes') {
		// 			console.log('The ' + mutation.attributeName + ' attribute was modified.', mutation);
		// 		}
		// 	}
		// }

		// let bindedUpdateNode = (mutationsList, observer) => {
		// //function bindedUpdateNode(mutationsList, observer) {
		// 	for(var mutation of mutationsList) {
		// 		if (mutation.type == 'childList') {
		// 			if (mutation.addedNodes.length > 0) {
		// 				//console.log('A child node has been added.');
		// 				//console.log(mutation);
		// 				//console.log(mutation.addedNodes);
		// 				this.updateEvents(mutation.addedNodes);
		// 			}
		// 		}
		// 		else if (mutation.type == 'attributes') {
		// 			console.log('The ' + mutation.attributeName + ' attribute was modified.');
		// 		}
		// 	}
		// }

		// this.domObserver = new window.MutationObserver(bindedUpdateNode);
		// this.domObserver.observe(document.body, {
		// 	childList: true,
		// 	attributes: false,
		// 	characterData: false,
		// 	subtree: true
		// });
	}

	initEvents() {
		window.addEventListener('mousemove', event => this.mousePosition(event));
		document.addEventListener('click', event => this.click(event));
		[
			...document.querySelectorAll('a, .js-cursor-drag, .js-cursor-hover, .js-cursor-right, .js-cursor-left, .js-cursor-zoom, [data-fancybox-prev], [data-fancybox-next]')
		].forEach(link => {
			link.addEventListener('mouseenter', event => this.toggle(event));
			link.addEventListener('mouseleave', event => this.toggle(event));
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
		// this.outerCursor.style.transform = `scale(${this.lastScale})`;
		this.outerCursor.style.opacity = this.lastOpacity;
		requestAnimationFrame(() => this.render());
	}

	mousePosition(event) {
		this.mousePos = Utilities.getMousePosition(event);
	}

	click(event) {
		if (
			!event.target.classList.contains('js-cursor-drag')
		) {
			this.element.classList.add('is-cursor-clicked');
			setTimeout(() => {
				this.element.classList.remove('is-cursor-clicked');
			}, 100);
		}
	}

	toggle(event) {		

		if (
			!event.target.classList.contains('js-cursor-drag')
		) {
			this.element.classList.toggle('is-cursor-hover');
		}
	
		if (
			event.target.classList.contains('js-cursor-drag')
		) {
			this.element.classList.toggle('is-cursor-dragged');
		}

		if (
			event.target.classList.contains('js-cursor-zoom')
		) {
			this.element.classList.toggle('is-cursor-zoom');
		}

		if (
			event.target.classList.contains('js-cursor-right')
		) {
			this.element.classList.toggle('is-cursor-right');
		}

		if (
			event.target.classList.contains('js-cursor-left')
		) {
			this.element.classList.toggle('is-cursor-left');
		}

		if (
			 event.target.classList.contains('[data-fancybox-next]')
		) {
			this.element.classList.toggle('is-cursor-right');
		}

		if (
			 event.target.classList.contains('[data-fancybox-prev]')
		) {
			this.element.classList.toggle('is-cursor-left');
		}


		// if (
		// 	event.target.classList.contains('slider__navigation') ||
		// 	event.target.classList.contains('fancybox-button')
		// ) {
		// 	this.element.classList.toggle('is-cursor-navigation');
		// }

		// if (
		// 	event.target.classList.contains('slider__navigation--next') ||
		// 	event.target.classList.contains('fancybox-button--arrow_right')
		// ) {
		// 	this.icon.classList.toggle('icon-arrow-right');
		// }

		// if (
		// 	event.target.classList.contains('slider__navigation--prev') ||
		// 	event.target.classList.contains('fancybox-button--arrow_left')
		// ) {
		// 	this.icon.classList.toggle('icon-arrow-left');
		// }

		// if (event.target.classList.contains('fancybox-button--close')) {
		// 	this.icon.classList.toggle('icon-close');
		// }

		// if (event.target.hasAttribute('data-fancybox')) {
		// 	this.element.classList.toggle('is-cursor-zoom');
		// 	this.icon.classList.toggle('icon-plus');
		// }

		// if (event.target.classList.contains('js-cursor-hide')) {
		// 	this.element.classList.toggle('is-cursor-hide');
		// }
	}

	destroy() {}

	destroyEvents() {}
}
