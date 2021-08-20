import * as deepmerge from 'deepmerge';
import isMobile from 'ismobilejs';

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
			closeOverviewPanel: document.querySelector('.js-close-overlay-panel'),
			closePanel: document.querySelector('.js-close-panel'),
			menuPanel: document.querySelector('.js-navigation-panel')
		};

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('resize', () => {
			if (!isMobile.any) {
				if (this.DOM.menuContainer) this.DOM.menuContainer.style.cssText += 'transform: none';

				if (this.DOM.menuPanel) this.DOM.menuPanel.style.cssText += 'transform: none';

				this.DOM.html.classList.remove('is-navigation-open');
				this.DOM.html.classList.remove('is-sub-navigation-open');
				this.DOM.html.classList.remove('is-overlay-panel-open');
				this.reset();
				this.init();
			}
		});
	}

	reset() {
		for (let i = 0; i <= this.defaults.level - 1; i++) {
			this.DOM.element.forEach((item) => {
				if (item.classList.contains('level' + i)) {
					item.classList.remove('level' + i);
					item.childNodes.forEach((t) =>
						t.classList && t.classList.contains('is-active') ? t.classList.remove('is-active') : null
					);
				}
			});
		}

		this.defaults.level = 0;
	}

	//Gestione dei submenu delle navigation @whichmenu serve per dirgli a quale menu faccio riferimento , @item quale bottone ho cliccato
	multiLevelMenu = (item, whichMenu) => {
		var subMenu = null;
		var subMenuImage = null;
		item.target.parentNode.childNodes.forEach((sub) => {
			sub.classList && sub.classList.contains('navigation__sub-menu') ? (subMenu = sub) : null;
			sub.classList && sub.classList.contains('navigation__image') ? (subMenuImage = sub) : null;
		});

		if (subMenu) {
			// console.log('multiLevelMenu click');
			// console.log('item', item);
			// console.log('whichMenu', whichMenu);
			// console.log('this.defaults.level', this.defaults.level);

			item.preventDefault();

			item.target.parentElement.classList.add('level' + this.defaults.level);
			this.DOM.html.classList.add('is-sub-navigation-open');

			subMenu.classList.add('is-active');
			subMenuImage && subMenuImage.classList.add('is-active');

			this.defaults.level++;
			let translation = -100 * this.defaults.level;
			whichMenu.style.cssText += 'transform: translateX(' + translation + '%);';

			this.DOM.menuBody.scrollTo({
				top: 0,
				left: 0,
				behavior: 'smooth'
			});
		}
	};

	//Gestione dei back
	multiLevelBack = (whichMenu) => {
		//console.log('multiLevelBack');
		//console.log('whichMenu', whichMenu);
		if (this.defaults.level > 0) {
			this.defaults.level--;
			this.DOM.element.forEach((item) => {
				if (item.classList.contains('level' + this.defaults.level)) {
					item.classList.remove('level' + this.defaults.level);
					item.childNodes.forEach((t) =>
						t.classList && t.classList.contains('is-active') ? t.classList.remove('is-active') : null
					);
				}
			});

			let translation = -100 * this.defaults.level;
			whichMenu.style.cssText += 'transform: translateX(' + translation + '%);';

			this.defaults.level == 0 ? this.DOM.html.classList.remove('is-sub-navigation-open') : null;
		}
	};

	init() {
		if (this.DOM.element.length === 0) {
			return;
		}

		//Gestione livelli delle navigation
		this.DOM.element.forEach((item) => {
			console.log(this.defaults.level, 'primadelclick');

			item.addEventListener('click', (t) => {
				t.stopImmediatePropagation();

				if (window.matchMedia('(max-width: 1024px)').matches) {
					//Attivo la transtion sul container dell'header per il mobile
					this.multiLevelMenu(t, this.DOM.menuContainer);
				} else {
					//Attivo la transtion sul panel-primary per il desk
					this.multiLevelMenu(t, this.DOM.menuPanel);
				}
			});
		});

		//Gestione livelli del back per le navigation
		this.DOM.back.forEach((b) => {
			b.addEventListener('click', (t) => {
				t.stopImmediatePropagation();

				if (window.matchMedia('(max-width: 1024px)').matches) {
					//Attivo il back transtion sul container dell'header per il mobile
					this.multiLevelBack(this.DOM.menuContainer);
				} else {
					//Attivo il back transtion sul panel-primary per il desk
					this.multiLevelBack(this.DOM.menuPanel);
				}
			});
		});

		//Attivo l'hover nella navigation header solo del desk
		if (window.matchMedia('(min-width: 1024px)').matches) {
			this.DOM.element.forEach((item) => {
				let timerHandle = null;
				item.addEventListener('mouseenter', () => {
					clearTimeout(timerHandle);
					this.DOM.html.classList.add('is-navigation-hover');
					timerHandle = setTimeout(() => {
						item.classList.add('is-hover');
					}, 200);
				});

				item.addEventListener('mouseleave', () => {
					clearTimeout(timerHandle);
					this.DOM.html.classList.remove('is-navigation-hover');
					if (item.classList.contains('is-hover')) {
						timerHandle = setTimeout(() => {
							item.classList.remove('is-hover');
						}, 200);
					}
				});
			});
		}

		//Se clicco la navicon resetto tutto
		this.DOM.navicon.addEventListener('click', (t) => {
			console.log('navicon');
			t.stopImmediatePropagation();

			this.DOM.html.classList.remove('is-sub-navigation-open');

			this.DOM.menuContainer.style.cssText += 'transform: none';
			if (this.DOM.menuPanel) this.DOM.menuPanel.style.cssText += 'transform: none';
			this.DOM.html.classList.remove('is-overlay-panel-open');

			this.reset();
		});

		//Se clicco il close di navigation panel resetto tutto
		if (this.DOM.closePanel) {
			this.DOM.closePanel.addEventListener('click', (t) => {
				console.log('closePanel');
				t.stopImmediatePropagation();

				this.DOM.html.classList.remove('is-sub-navigation-open');

				this.DOM.menuContainer.style.cssText += 'transform: none';
				if (this.DOM.menuPanel) this.DOM.menuPanel.style.cssText += 'transform: none';
				this.DOM.html.classList.remove('is-overlay-panel-open');

				this.reset();
			});
		}

		//Se clicco l'overlay-panel di navigation panel resetto tutto - da fare solo se non sono mobile
		if (!isMobile().any) {
			if (this.DOM.closeOverviewPanel) {
				this.DOM.closeOverviewPanel.addEventListener('click', (t) => {
					t.stopImmediatePropagation();

					this.DOM.html.classList.remove('is-sub-navigation-open');

					this.DOM.menuContainer.style.cssText += 'transform: none';
					if (this.DOM.menuPanel) this.DOM.menuPanel.style.cssText += 'transform: none';
					this.DOM.html.classList.remove('is-overlay-panel-open');

					this.reset();
				});
			}
		}
	}
}
