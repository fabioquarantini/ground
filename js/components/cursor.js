/**
 * Cursor module
 * Mouse interactions
 */
import Utilities from '../utilities/utilities';
import AbstractComponent from '../components/abstractComponent';

const isMobile = require('ismobilejs');

export default class Cursor extends AbstractComponent {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(element, options);
		this.element = element || 'js-cursor';
		this.triggers = 'a, .js-cursor-drag, .js-cursor-hover, .js-cursor-right, .js-cursor-left, .js-cursor-zoom, .fancybox-button';
		this.DOM = {
			element: document.getElementById(this.element)
		};
		this.DOM.outerCursor = document.getElementById('js-cursor-outer');
		this.DOM.icon = document.getElementById('js-cursor-icon');

		this.updateEvents = this.updateEvents.bind(this);
		this.bounds = this.DOM.element.getBoundingClientRect();
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

		// TODO: Fix listener
		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});
	}

	/**
	 * Initialize
	 */
	init() {
		if (isMobile.any && !this.DOM.element) {
			return;
		}
		requestAnimationFrame(() => this.render());
		this.initEvents(this.triggers);
		super.initObserver(this.triggers, this.updateEvents);
	}


	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		window.addEventListener('mousemove', event => {
			this.mousePos = Utilities.getMousePosition(event);
		});
		document.addEventListener('click', event => this.click(event));
		[...document.querySelectorAll(triggers)].forEach(link => {
			link.addEventListener('mouseenter', event => this.toggle(event));
			link.addEventListener('mouseleave', event => this.toggle(event));
		});
	}

	/**
	 * Update events
	 * @param {Object} target - Selector
	 */
	updateEvents(target) {
		console.log('update', target);

		target.addEventListener('mouseenter', event => this.toggle(event));
		target.addEventListener('mouseleave', event => this.toggle(event));
	}

	/**
	 * Render cursor animation
	 */
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
		this.DOM.element.style.transform = `translateX(${this.lastMousePos.x}px) translateY(${this.lastMousePos.y}px)`;
		// this.DOM.outerCursor.style.transform = `scale(${this.lastScale})`;
		this.DOM.outerCursor.style.opacity = this.lastOpacity;
		requestAnimationFrame(() => this.render());
	}

	/**
	 * On click
	 * @param {Object} event
	 */
	click(event) {
		if (!event.target.classList.contains('js-cursor-drag')) {
			this.DOM.element.classList.add('is-cursor-clicked');
			setTimeout(() => {
				this.DOM.element.classList.remove('is-cursor-clicked');
			}, 100);
		}
	}

	/**
	 * Toggle classes
	 * @param {Object} event
	 */
	toggle(event) {
		if (!event.target.classList.contains('js-cursor-drag')) {
			this.DOM.element.classList.toggle('is-cursor-hover');
		}

		if (event.target.classList.contains('js-cursor-drag')) {
			this.DOM.element.classList.toggle('is-cursor-dragged');
		}

		if (event.target.classList.contains('js-cursor-zoom')) {
			this.DOM.element.classList.toggle('is-cursor-zoom');
		}

		if (event.target.classList.contains('js-cursor-right')) {
			this.DOM.element.classList.toggle('is-cursor-right');
		}

		if (event.target.classList.contains('js-cursor-left')) {
			this.DOM.element.classList.toggle('is-cursor-left');
		}

		if (event.target.classList.contains('fancybox-button--arrow_right')) {
			this.DOM.element.classList.toggle('is-cursor-right');
		}

		if (event.target.classList.contains('fancybox-button--arrow_left')) {
			this.DOM.element.classList.toggle('is-cursor-left');
		}

		if (event.target.classList.contains('fancybox-button--close')) {
			this.DOM.element.classList.toggle('is-cursor-close');
		}

		if (event.target.classList.contains('js-cursor-hide')) {
			this.DOM.element.classList.toggle('is-cursor-hide');
		}
	}
}