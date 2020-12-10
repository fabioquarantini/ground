/**
 * Modal module
 * Lightbox library for presenting various types of media
 */

import Utilities from '../utilities/utilities';
import * as PhotoSwipe from 'photoswipe';
import * as PhotoSwipeUIDefault from 'photoswipe/dist/photoswipe-ui-default';

const Deepmerge = require('deepmerge');

export default class Modal {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '[data-modal]';
		this.defaults = {
			triggers: this.element, // '[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]'
		};
		this.DOM = {
			html: document.documentElement,
			body: document.body,
		};
		this.options = options ? Deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);
		this.openPhotoSwipe = this.openPhotoSwipe.bind(this);
		this.clickedItem = this.clickedItem.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
			Utilities.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	init() {
		this.DOM.element = document.querySelectorAll(this.element);
		this.DOM.pswpElement = document.querySelectorAll('.pswp')[0];
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		const elements = document.querySelectorAll(triggers);
		for (let i = 0; i < elements.length; i++) {
			elements[i].addEventListener('click', this.clickedItem);
		}
	}

	/**
	 * Update events
	 * @param {string} target - New selector
	 */
	updateEvents(target) {
		target.addEventListener('click', this.clickedItem);
	}

	getItems(currentTarget) {
		this.items = [];
		let item;
		let size;
		const sel = document.querySelectorAll(`[data-modal="${event.currentTarget.dataset.modal}"]`);

		if (event.currentTarget.dataset.modal === '') {
			const element = event.currentTarget;
			size = element.getAttribute('data-modal-size').split('x');
			item = {
				src: element.getAttribute('href'),
				w: parseInt(size[0], 10),
				h: parseInt(size[1], 10),
				el: element,
			};
			if (element.getElementsByTagName('img')[0] !== undefined) {
				item.msrc = element.getElementsByTagName('img')[0].getAttribute('src');
			}
			if (element.getAttribute('data-modal-caption')) {
				item.title = element.getAttribute('data-modal-caption');
			}
			this.items.push(item);
		} else {
			for (let index = 0; index < sel.length; index++) {
				const element = sel[index];
				size = element.getAttribute('data-modal-size').split('x');
				item = {
					src: element.getAttribute('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10),
					firstSlide: currentTarget.isEqualNode(element),
					el: element,
				};

				if (element.getElementsByTagName('img')[0] !== undefined) {
					item.msrc = element.getElementsByTagName('img')[0].getAttribute('src');
				}
				if (element.getAttribute('data-modal-caption')) {
					item.title = element.getAttribute('data-modal-caption');
				}
				this.items.push(item);
			}
		}

		return this.items;
	}

	clickedItem(event) {
		this.openPhotoSwipe(event);
	}

	openPhotoSwipe(event) {
		event.preventDefault();

		let index;
		const items = this.getItems(event.currentTarget);

		if (items.length > 0) {
			for (let i = 0; i < items.length; i++) {
				const element = items[i];

				if (element.firstSlide) {
					index = i;
				}
			}
		}

		this.swiperOptions = {
			index,
			history: false,
			shareEl: false,
			getThumbBoundsFn(index) {
				const thumbnail = items[index].el.getElementsByTagName('img')[0];
				const pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
				const rect = thumbnail.getBoundingClientRect();
				return {
					x: rect.left,
					y: rect.top + pageYScroll,
					w: rect.width,
				};
			},
		};

		this.gallery = new PhotoSwipe(this.DOM.pswpElement, PhotoSwipeUIDefault, items, this.swiperOptions);
		this.gallery.init();
		this.onOpen();
		this.gallery.listen('close', () => {
			this.onClose();
		});
	}

	onOpen() {
		this.DOM.html.classList.add('is-modal-open');
	}

	onClose() {
		this.DOM.html.classList.remove('is-modal-open');
	}

	destroy() {
		this.gallery.destroy();
	}
}
