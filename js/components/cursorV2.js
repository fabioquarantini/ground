import * as deepmerge from 'deepmerge';
import isMobile from 'ismobilejs';
import { gsap } from 'gsap';

export default class Cursor {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.js-cursor';
		this.defaults = {
			triggers: this.element
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		// window.addEventListener('load', () => {
		// 	this.init();
		// })

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});
	}

	/**
	 * Init
	 */
	init() {
		if (isMobile.any) {
			return;
		}

		const cursor = document.querySelector('.js-cursor');
		const cursorCircle = cursor.querySelector('.js-cursor-outer');

		const mouse = { x: -100, y: -100 }; // mouse pointer's coordinates
		const pos = { x: 0, y: 0 }; // cursor's coordinates
		const speed = 0.1; // between 0 and 1

		const updateCoordinates = (e) => {
			mouse.x = e.clientX;
			mouse.y = e.clientY;
		};

		window.addEventListener('mousemove', updateCoordinates);

		function getAngle(diffX, diffY) {
			return (Math.atan2(diffY, diffX) * 180) / Math.PI;
		}

		function getSqueeze(diffX, diffY) {
			const distance = Math.sqrt(Math.pow(diffX, 2) + Math.pow(diffY, 2));
			const maxSqueeze = 0.15;
			const accelerator = 1500;
			return Math.min(distance / accelerator, maxSqueeze);
		}

		const updateCursor = () => {
			const diffX = Math.round(mouse.x - pos.x);
			const diffY = Math.round(mouse.y - pos.y);

			pos.x += diffX * speed;
			pos.y += diffY * speed;

			const angle = getAngle(diffX, diffY);
			const squeeze = getSqueeze(diffX, diffY);

			const scale = 'scale(' + (1 + squeeze) + ', ' + (1 - squeeze) + ')';
			const rotate = 'rotate(' + angle + 'deg)';
			const translate = 'translate3d(' + pos.x + 'px ,' + pos.y + 'px, 0)';

			cursor.style.transform = translate;
			cursorCircle.style.transform = rotate + scale;
		};

		function loop() {
			updateCursor();
			requestAnimationFrame(loop);
		}

		requestAnimationFrame(loop);

		const cursorModifiers = document.querySelectorAll('[cursor-class]');

		cursorModifiers.forEach((cursorModifier) => {
			cursorModifier.addEventListener('mouseenter', function () {
				const className = this.getAttribute('cursor-class');
				cursor.classList.add(className);
			});

			cursorModifier.addEventListener('mouseleave', function () {
				const className = this.getAttribute('cursor-class');
				cursor.classList.remove(className);
			});
		});

		const cursorModifiersDefaultHover = document.querySelectorAll('a, button, input, .js-cursor-hover');

		cursorModifiersDefaultHover.forEach((cursorModifierDefaultHover) => {
			cursorModifierDefaultHover.addEventListener('mouseenter', function () {
				const className = 'hover';
				cursor.classList.add(className);
			});

			cursorModifierDefaultHover.addEventListener('mouseleave', function () {
				const className = 'hover';
				cursor.classList.remove(className);
			});
		});
	}
}
