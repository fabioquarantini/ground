import * as deepmerge from 'deepmerge';

export default class Menu {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '.navigation__item.has-children';
		this.defaults = {
			triggers: this.element
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
		});
	}

	/**
	 * Init
	 */
	init() {
		this.DOM = {
			element: document.querySelectorAll(this.element)
		};
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		let html = document.querySelector('html');
		let back = document.querySelector('.js-back');
		let navicon = document.querySelector('.js-navicon');
		let menuBody = document.querySelector('.js-menu-body');
		let menuContainer = document.querySelector('.js-menu-container');
		let level = 0;
		let translation = 0;

		[...document.querySelectorAll(triggers)].forEach((item) => {
			if (window.matchMedia('(max-width: 1024px)').matches) {
				item.addEventListener('click', (t) => {
					if (html.classList.contains('is-navigation-open')) {
						t.preventDefault();
						t.stopPropagation();

						t.target.parentElement.classList.add('level' + level);
						html.classList.add('is-sub-navigation-open');
						t.target.nextElementSibling.classList.add('is-active');

						level++;

						translation = -100 * level;
						menuContainer.style.cssText += 'transform: translateX(' + translation + 'vw);';
						menuBody.scrollTo({
							top: 0,
							left: 0,
							behavior: 'smooth'
						});
					}
				});
			}
		});

		back.addEventListener('click', () => {
			if (level > 0) {
				level--;

				[...document.querySelectorAll(triggers)].forEach((item) => {
					if (item.classList.contains('level' + level)) {
						item.classList.remove('level' + level);
						item.childNodes.forEach((t) =>
							t.classList && t.classList.contains('is-active') ? t.classList.remove('is-active') : null
						);
					}
				});

				let translation = -100 * level;

				menuContainer.style.cssText += 'transform: translateX(' + translation + 'vw);';

				level == 0 ? html.classList.remove('is-sub-navigation-open') : null;
			}
		});

		navicon.addEventListener('click', () => {
			console.log('cliccato', [...document.querySelectorAll(triggers)].length);
			let i = 0;
			html.classList.remove('is-sub-navigation-open');

			[...document.querySelectorAll(triggers)].forEach((item) => {
				console.log(item, 'item');

				if (item.classList.contains('level' + i)) {
					item.classList.remove('level' + i);
					item.childNodes.forEach((t) =>
						t.classList && t.classList.contains('is-active') ? t.classList.remove('is-active') : null
					);
				}

				i++;

				[...document.querySelectorAll(triggers)].length == i
					? ((menuContainer.style.cssText += 'transform: translateX(0);'), (level = 0))
					: null;
			});
		});
	}
}
