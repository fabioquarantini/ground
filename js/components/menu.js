import * as deepmerge from 'deepmerge';

export default class Menu {
	/**
	 * @param {string} element - Selector
	 */
	constructor(element) {
		this.element = element || '.navigation__item.has-children';
		this.defaults = {
			triggers: this.element,
			level: 0
		};

		this.DOM = {
			element: document.querySelectorAll(this.element),
			html: document.querySelector('html'),
			back: document.querySelectorAll('.js-back'),
			navicon: document.querySelector('.js-navicon'),
			menuBody: document.querySelector('.js-menu-body'),
			menuContainer: document.querySelector('.js-menu-container'),
			closePanelAllProducts: document.querySelector('.js-close-panel-all-products'),
			closeAllProducts: document.querySelector('.js-close-all-products'),
			menuAllProducts: document.querySelector('.js-navigation-all-products')
		};

		window.addEventListener('DOMContentLoaded', () => {
			this.init(this.defaults.triggers, this.defaults.level);
		});

		window.addEventListener('resize', () => {
			this.DOM.menuContainer.style.cssText += 'transform: none';

			if (this.DOM.menuAllProducts) this.DOM.menuAllProducts.style.cssText += 'transform: none';

			this.DOM.html.classList.remove('is-navigation-open');
			this.DOM.html.classList.remove('is-sub-navigation-open');
			this.DOM.html.classList.remove('is-all-products-open');

			this.reset(this.defaults.triggers, this.defaults.level);
			this.init(this.defaults.triggers, 0);
		});
	}

	/**
	 * Reset
	 *  @param {string} triggers - Selectors
	 * @param {num} level - Selectors
	 */
	reset(triggers, level) {
		console.log(level, 'level');

		for (let i = 0; i <= level; i++) {
			[...document.querySelectorAll(triggers)].forEach((item) => {
				console.log(item, 'item');
				console.log(item.classList.contains('level' + i));
				if (item.classList.contains('level' + i)) {
					item.classList.remove('level' + i);
					item.childNodes.forEach((t) =>
						t.classList && t.classList.contains('is-active') ? t.classList.remove('is-active') : null
					);
				}
			});
		}
		this.init(this.defaults.triggers, 0);
		console.log('done');
	}
	/**
	 * Init
	 * @param {string} triggers - Selectors
	 * @param {num} level - Selectors
	 */
	init(triggers, level) {
		console.log('init');

		let translation = 0;

		let multiLevelMenu = (item, whichMenu) => {
			item.addEventListener('click', (t, i) => {
				console.log('click' + i);
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
					this.defaults.level = level;
					translation = -100 * level;

					if (whichMenu == this.DOM.menuContainer) {
						if (window.matchMedia('(max-width: 1024px)').matches) {
							this.DOM.menuContainer.style.cssText += 'transform: translateX(' + translation + 'vw);';
						} else {
							this.DOM.menuContainer.style.cssText += 'transform: none';
						}
					} else if (whichMenu == this.DOM.menuAllProducts) {
						this.DOM.menuContainer.style.cssText += 'transform: none';
						if (this.DOM.menuAllProducts)
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
				this.defaults.level = level;
				let translation = -100 * level;

				if (whichMenu == this.DOM.menuContainer) {
					if (window.matchMedia('(max-width: 1024px)').matches) {
						this.DOM.menuContainer.style.cssText += 'transform: translateX(' + translation + 'vw);';
					} else {
						this.DOM.menuContainer.style.cssText += 'transform: none';
					}
				} else if (whichMenu == this.DOM.menuAllProducts) {
					this.DOM.menuContainer.style.cssText += 'transform: none';
					if (this.DOM.menuAllProducts)
						this.DOM.menuAllProducts.style.cssText += 'transform: translateX(' + translation + '%);';
				}

				level == 0 ? this.DOM.html.classList.remove('is-sub-navigation-open') : null;
			}
		};

		if (window.matchMedia('(max-width: 1024px)').matches) {
			console.log('matchMedia mobile');
			[...document.querySelectorAll(triggers)].forEach((item) => {
				multiLevelMenu(item, this.DOM.menuContainer);
			});

			this.DOM.back.forEach((b) => {
				b.addEventListener('click', () => {
					multiLevelBack(this.DOM.menuContainer);
				});
			});
		} else {
			console.log('matchMedia desk');
			if (this.DOM.menuAllProducts) {
				[...document.querySelectorAll(triggers)].forEach((item) => {
					if (item.classList.contains('navigation__item--all-products')) {
						multiLevelMenu(item, this.DOM.menuAllProducts);
					}
				});

				this.DOM.back.forEach((b) => {
					b.addEventListener('click', () => {
						multiLevelBack(this.DOM.menuAllProducts);
					});
				});
			}

			[...document.querySelectorAll(triggers)].forEach((item) => {
				let timerHandle = null;
				item.addEventListener('mouseenter', () => {
					clearTimeout(timerHandle);
					this.DOM.html.classList.add('is-navigation-hover');
					timerHandle = setTimeout(() => {
						item.classList.add('is-hover');
					}, 300);
				});

				item.addEventListener('mouseleave', () => {
					clearTimeout(timerHandle);
					this.DOM.html.classList.remove('is-navigation-hover');
					if (item.classList.contains('is-hover')) {
						timerHandle = setTimeout(() => {
							item.classList.remove('is-hover');
						}, 300);
					}
				});
			});
		}

		this.DOM.navicon.addEventListener('click', () => {
			this.DOM.html.classList.remove('is-sub-navigation-open');
			setTimeout(() => {
				this.DOM.menuContainer.style.cssText += 'transform: none';
				if (this.DOM.menuAllProducts) this.DOM.menuAllProducts.style.cssText += 'transform: none';
				this.DOM.html.classList.remove('is-all-products-open');

				this.reset(this.defaults.triggers, this.defaults.level);
				this.init(this.defaults.triggers, 0);
			}, 350);
		});

		if (this.DOM.closeAllProducts) {
			this.DOM.closeAllProducts.addEventListener('click', () => {
				this.DOM.html.classList.remove('is-sub-navigation-open');
				setTimeout(() => {
					this.DOM.menuContainer.style.cssText += 'transform: none';
					if (this.DOM.menuAllProducts) this.DOM.menuAllProducts.style.cssText += 'transform: none';
					this.DOM.html.classList.remove('is-all-products-open');

					this.reset(this.defaults.triggers, this.defaults.level);
					this.init(this.defaults.triggers, 0);
				}, 350);
			});
		}

		if (this.DOM.closePanelAllProducts) {
			this.DOM.closePanelAllProducts.addEventListener('click', () => {
				this.DOM.html.classList.remove('is-sub-navigation-open');
				setTimeout(() => {
					this.DOM.menuContainer.style.cssText += 'transform: none';
					if (this.DOM.menuAllProducts) this.DOM.menuAllProducts.style.cssText += 'transform: none';
					this.DOM.html.classList.remove('is-all-products-open');

					this.reset(this.defaults.triggers, this.defaults.level);
					this.init(this.defaults.triggers, 0);
				}, 350);
			});
		}
	}
}
