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

		window.addEventListener('resize', () => {
			this.DOM.menuContainer.style.cssText += 'transform: none';
			this.DOM.menuAllProducts.style.cssText += 'transform: none';

			this.DOM.html.classList.remove('is-navigation-open');
			this.DOM.html.classList.remove('is-sub-navigation-open');
			this.DOM.html.classList.remove('is-all-products-open');

			this.init();
			this.initEvents(this.options.triggers);
		});
	}

	/**
	 * Init
	 */
	init() {
		this.DOM = {
			element: document.querySelectorAll(this.element),
			html: document.querySelector('html'),
			back: document.querySelectorAll('.js-back'),
			navicon: document.querySelector('.js-navicon'),
			menuBody: document.querySelector('.js-menu-body'),
			menuContainer: document.querySelector('.js-menu-container'),
			closePanelAllProducts: document.querySelector('.js-close-panel-all-products'),
			closeAllProducts: document.querySelector('.js-close-all-products'),
			buttonAllProducts: document.querySelector('.js-button-all-products'),
			menuAllProducts: document.querySelector('.js-navigation-all-products')
		};
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		let level = 0;
		let translation = 0;

		[...document.querySelectorAll(triggers)].forEach((item) => {
			let multiLevelMenu = (whichMenu) => {
				item.addEventListener('click', (t) => {
					var subMenu = null;
					var subMenuImage = null;
					t.target.parentNode.childNodes.forEach((sub) => {
						sub.classList && sub.classList.contains('navigation__sub-menu') ? (subMenu = sub) : null;
						sub.classList && sub.classList.contains('navigation__image') ? (subMenuImage = sub) : null;
					});

					if (subMenu) {
						t.preventDefault();
						t.stopPropagation();

						t.target.parentElement.classList.add('level' + level);
						this.DOM.html.classList.add('is-sub-navigation-open');

						subMenu.classList.add('is-active');
						subMenuImage && subMenuImage.classList.add('is-active');

						level++;
						translation = -100 * level;

						if (whichMenu == this.DOM.menuContainer) {
							this.DOM.menuContainer.style.cssText += 'transform: translateX(' + translation + 'vw);';
						} else if (whichMenu == this.DOM.menuAllProducts) {
							this.DOM.menuAllProducts.style.cssText += 'transform: translateX(' + translation + '%);';
						}

						this.DOM.menuBody.scrollTo({
							top: 0,
							left: 0,
							behavior: 'smooth'
						});
					}
				});
			};

			if (window.matchMedia('(max-width: 1024px)').matches) {
				multiLevelMenu(this.DOM.menuContainer);
			} else {
				multiLevelMenu(this.DOM.menuAllProducts);

				let timerHandle = null;
				item.addEventListener('mouseenter', () => {
					clearTimeout(timerHandle);
					timerHandle = setTimeout(() => {
						item.classList.add('is-hover');
					}, 300);
				});

				item.addEventListener('mouseleave', () => {
					clearTimeout(timerHandle);
					if (item.classList.contains('is-hover')) {
						timerHandle = setTimeout(() => {
							item.classList.remove('is-hover');
						}, 300);
					}
				});
			}
		});

		let multiLevelBack = (whichMenu) => {
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

				if (whichMenu == this.DOM.menuContainer) {
					this.DOM.menuContainer.style.cssText += 'transform: translateX(' + translation + 'vw);';
				} else if (whichMenu == this.DOM.menuAllProducts) {
					this.DOM.menuAllProducts.style.cssText += 'transform: translateX(' + translation + '%);';
				}

				level == 0 ? this.DOM.html.classList.remove('is-sub-navigation-open') : null;
			}
		};

		this.DOM.back &&
			this.DOM.back.forEach((b) => {
				b.addEventListener('click', () => {
					if (window.matchMedia('(max-width: 1024px)').matches) {
						multiLevelBack(this.DOM.menuContainer);
					} else {
						multiLevelBack(this.DOM.menuAllProducts);
					}
				});
			});

		this.DOM.navicon &&
			this.DOM.navicon.addEventListener('click', () => {
				this.DOM.html.classList.remove('is-sub-navigation-open');
				setTimeout(() => {
					this.DOM.menuAllProducts.style.cssText += 'transform: none';
					this.DOM.menuContainer.style.cssText += 'transform: none';
				}, 350);
				level = 0;
			});

		this.DOM.closeAllProducts &&
			this.DOM.closeAllProducts.addEventListener('click', () => {
				this.DOM.html.classList.remove('is-sub-navigation-open');
				setTimeout(() => {
					this.DOM.menuAllProducts.style.cssText += 'transform: none';
					this.DOM.menuContainer.style.cssText += 'transform: none';
				}, 350);
				level = 0;
			});

		this.DOM.closePanelAllProducts &&
			this.DOM.closePanelAllProducts.addEventListener('click', () => {
				this.DOM.html.classList.remove('is-sub-navigation-open');
				setTimeout(() => {
					this.DOM.menuAllProducts.style.cssText += 'transform: none';
					this.DOM.menuContainer.style.cssText += 'transform: none';
				}, 350);
				level = 0;
			});
	}
}
