/**
 * Cursor module
 * Mouse interactions
 */
import * as deepmerge from 'deepmerge';
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
		this.defaults = {
			triggers: 'a, .js-cursor-drag, .js-cursor-hover, .js-cursor-right, .js-cursor-left, .js-cursor-zoom, .js-cursor-close',
			alwaysVisible: true,
			cursorVisible: false,
			interpolationAmount: {
				inner: 0.15,
				outer: 0.02
			}
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);
		this.getMousePosition = this.getMousePosition.bind(this);
		this.click = this.click.bind(this);
		this.toggle = this.toggle.bind(this);
		this.render = this.render.bind(this);
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
			this.initEvents(this.options.triggers);
			super.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	/**
	 * Initialize
	 */
	init() {
		this.DOM = {
			element: document.getElementById(this.element)
		};

		if (!isMobile.any && this.DOM.element === null) {
			return;
		}

		if (this.options.alwaysVisible) {
			this.DOM.element.classList.add('is-cursor-always-visible');
		}
		this.DOM.body = document.body;

		if (!this.options.cursorVisible) {
			this.DOM.body.style.cursor = 'none';
		}
		this.DOM.outerCursor = document.getElementById('js-cursor-outer');
		this.DOM.innerCursor = document.getElementById('js-cursor-inner');
		this.DOM.icon = document.getElementById('js-cursor-icon');
		this.bounds = this.DOM.element.getBoundingClientRect();

		this.renderID = window.requestAnimationFrame(this.render);
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		window.addEventListener('mousemove', this.getMousePosition);
		document.addEventListener('click', this.click);
		[...document.querySelectorAll(triggers)].forEach(link => {
			link.addEventListener('mouseenter', this.toggle);
			link.addEventListener('mouseleave', this.toggle);
		});
	}

	/**
	 * Update events
	 * @param {Object} target - New selector
	 */
	updateEvents(target) {
		this.init();
		target.addEventListener('mouseenter', this.toggle);
		target.addEventListener('mouseleave', this.toggle);
	}

	/**
	 * Render cursor animation
	 */
	render() {
		if (!isMobile.any && this.DOM.element === null) {
			return;
		}
		this.lastMousePos.x = Utilities.lerp(
			this.lastMousePos.x,
			this.mousePos.x - this.bounds.width / 2,
			this.options.interpolationAmount.outer
		);
		this.lastMousePos.y = Utilities.lerp(
			this.lastMousePos.y,
			this.mousePos.y - this.bounds.height / 2,
			this.options.interpolationAmount.outer
		);
		this.lastScale = Utilities.lerp(this.lastScale, this.scale, 0.15);
		this.lastOpacity = Utilities.lerp(this.lastOpacity, this.opacity, 0.1);
		this.DOM.element.style.transform = `translateX(${this.lastMousePos.x}px) translateY(${this.lastMousePos.y}px)`;
		// this.DOM.outerCursor.style.transform = `scale(${this.lastScale})`;
		this.DOM.outerCursor.style.opacity = this.lastOpacity;
		this.renderID = window.requestAnimationFrame(() => this.render());
	}

	/**
	 * On click
	 * @param {Object} event
	 */
	click(event) {
		if (!isMobile.any && this.DOM.element === null) {
			return;
		}
		if (!event.target.classList.contains('js-cursor-drag')) {
			this.DOM.element.classList.add('is-cursor-clicked');
			setTimeout(() => {
				this.DOM.element.classList.remove('is-cursor-clicked');
			}, 100);
		}
	}

	getMousePosition(event) {
		this.mousePos = Utilities.getMousePosition(event);
	}

	/**
	 * Toggle classes
	 * @param {Object} event
	 */
	toggle(event) {
		if (!isMobile.any && this.DOM.element === null) {
			return;
		}

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

		if (event.target.classList.contains('js-cursor-close')) {
			this.DOM.element.classList.toggle('is-cursor-close');
		}

		if (event.target.classList.contains('js-cursor-hide')) {
			this.DOM.element.classList.toggle('is-cursor-hide');
		}
	}

	destroy() {
		if (!this.options.cursorVisible) {
			this.DOM.body.style.cursor = '';
		}
		this.mousePos = {
			x: -100,
			y: -100
		};
		window.cancelAnimationFrame(this.renderID);
		window.removeEventListener('mousemove', this.getMousePosition);
		document.removeEventListener('click', this.click);
		[...document.querySelectorAll(this.options.triggers)].forEach(link => {
			link.removeEventListener('mouseenter', this.toggle);
			link.removeEventListener('mouseleave', this.toggle);
		});
	}
}