/**
 * Cursor module
 * Mouse interactions
 */
import * as deepmerge from 'deepmerge';
import TweenMax from 'gsap/TweenMax';
import Utilities from '../utilities/utilities';
import {
	log
} from 'util';

export default class Cursor {
	constructor(el) {
		this.element = document.getElementById('js-cursor');
		this.innerCursor = document.querySelector('.cursor__circle--inner');
		this.outerCursor = document.querySelector('.cursor__circle--outer');
		this.icon = document.querySelector('.cursor__icon');
		this.bounds = {
			dot: this.innerCursor.getBoundingClientRect(),
			circle: this.outerCursor.getBoundingClientRect()
		};
		this.scale = 1;
		this.opacity = 1;
		this.mousePos = {
			x: -100,
			y: -100
		};
		this.lastMousePos = {
			dot: {
				x: 0,
				y: 0
			},
			circle: {
				x: 0,
				y: 0
			}
		};
		this.lastScale = 1;
		this.lastOpacity = 1;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_END', () => {
			this.init();
		});
	}

	init() {
		this.initEvents();
		requestAnimationFrame(() => this.render());
	}

	initEvents() {
		window.addEventListener('mousemove', event => this.mousePos = Utilities.getMousePosition(event));

		// TODO: non aggiorna i nuovi selettori ajax
		// Custom cursor chnages state when hovering on elements with 'data-hover'.
		[...document.querySelectorAll('a, .slider__navigation, .button, [data-fancybox="gallery"]')].forEach((link) => {
			//[...document.querySelectorAll('[data-hover]')].forEach((link) => {
			link.addEventListener('mouseenter', (event) => this.enter(event));
			link.addEventListener('mouseleave', (event) => this.leave(event));
			link.addEventListener('click', (event) => this.click(event));
		});
	}

	render() {
		this.lastMousePos.dot.x = Utilities.lerp(this.lastMousePos.dot.x, this.mousePos.x - this.bounds.dot.width / 2, 1);
		this.lastMousePos.dot.y = Utilities.lerp(this.lastMousePos.dot.y, this.mousePos.y - this.bounds.dot.height / 2, 1);
		this.lastMousePos.circle.x = Utilities.lerp(this.lastMousePos.circle.x, this.mousePos.x - this.bounds.circle.width / 2, 0.15);
		this.lastMousePos.circle.y = Utilities.lerp(this.lastMousePos.circle.y, this.mousePos.y - this.bounds.circle.height / 2, 0.15);
		this.lastScale = Utilities.lerp(this.lastScale, this.scale, 0.15);
		this.lastOpacity = Utilities.lerp(this.lastOpacity, this.opacity, 0.1);
		this.innerCursor.style.transform = `translateX(${(this.lastMousePos.dot.x)}px) translateY(${this.lastMousePos.dot.y}px)`;
		this.outerCursor.style.transform = `translateX(${(this.lastMousePos.circle.x)}px) translateY(${this.lastMousePos.circle.y}px) scale(${this.lastScale})`;
		this.outerCursor.style.opacity = this.lastOpacity;
		requestAnimationFrame(() => this.render());
	}

	enter(event) {
		this.element.classList.toggle('is-enter');
		this.scale = 2;

		if (event.target.classList.contains('slider__navigation')) {
			this.scale = 1.5;
			this.element.classList.toggle('is-navigation');
		}

		if (event.target.classList.contains('slider__navigation--next')) {
			this.icon.classList.toggle('icon-arrow-right');
		}

		if (event.target.classList.contains('slider__navigation--prev')) {
			this.icon.classList.toggle('icon-arrow-left');
		}

		if (event.target.hasAttribute('data-fancybox')) {
			this.scale = 1.5;
			this.element.classList.toggle('is-zoom');
			this.icon.classList.toggle('icon-plus');
		}
	}

	leave(event) {
		this.element.classList.toggle('is-enter');
		this.scale = 1;
		if (event.target.classList.contains('slider__navigation')) {
			this.element.classList.toggle('is-navigation');
		}
		if (event.target.classList.contains('slider__navigation--next')) {
			this.icon.classList.toggle('icon-arrow-right');
		}

		if (event.target.classList.contains('slider__navigation--prev')) {
			this.icon.classList.toggle('icon-arrow-left');
		}

		if (event.target.hasAttribute('data-fancybox')) {
			this.element.classList.toggle('is-zoom');
			this.icon.classList.toggle('icon-plus');
		}
	}

	click(event) {
		this.lastScale = 1;
		this.lastOpacity = 0;
	}
}