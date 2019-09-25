/**
 * Modal module
 * Lightbox library for presenting various types of media
 */

import * as deepmerge from 'deepmerge';
import * as PhotoSwipe from 'photoswipe';
import AbstractComponent from '../components/abstractComponent';
import * as PhotoSwipeUI_Default from 'photoswipe/dist/photoswipe-ui-default';

export default class Modal extends AbstractComponent {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(element, options);
		this.element = element || '[data-modal]';
		this.defaults = {
			triggers: this.element // '[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]'
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.updateEvents = this.updateEvents.bind(this);
		this.openPhotoSwipe = this.openPhotoSwipe.bind(this);
		this.clickedItem = this.clickedItem.bind(this);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
			this.initEvents(this.options.triggers);
			super.initObserver(this.options.triggers, this.updateEvents);
		});
	}

	init() {
		this.DOM = {
			element: document.querySelectorAll(this.element),
			pswpElement: document.querySelectorAll('.pswp')[0],
			html: document.documentElement
		};

		if (this.DOM.element.length == 0 && this.DOM.pswpElement.length == 0) {
			return;
		}
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		var elements =document.querySelectorAll(triggers);
		for (var i = 0; i < elements.length; i++) {
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
		let sel = document.querySelectorAll('[data-modal="' + event.currentTarget.dataset.modal + '"]');

		if (event.currentTarget.dataset.modal == '') {
			let element = event.currentTarget;
			size = element.getAttribute('data-modal-size').split('x');
			item = {
				src: element.getAttribute('href'),
				w: parseInt(size[0], 10),
				h: parseInt(size[1], 10),
				el: element
			};
			if(element.getElementsByTagName('img')[0] !== undefined) {
				item.msrc = element.getElementsByTagName('img')[0].getAttribute('src');
			}
			if (element.getAttribute('data-modal-caption')) {
				item.title = element.getAttribute('data-modal-caption');
			}
			this.items.push(item);
		} else {
			for (let index = 0; index < sel.length; index++) {
				let element = sel[index];
				size = element.getAttribute('data-modal-size').split('x');
				item = {
					src: element.getAttribute('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10),
					firstSlide: currentTarget.isEqualNode(element),
					el: element
				};

				if(element.getElementsByTagName('img')[0] !== undefined) {
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
		event = event || window.event;
		event.preventDefault ? event.preventDefault() : event.returnValue = false;

		let index;
		let items = this.getItems(event.currentTarget);

		if(items.length > 0) {
			for (let i = 0; i < items.length; i++) {
				const element = items[i];

				if (element.firstSlide) {
					index = i;
				}
			}
		}

		this.swiperOptions = {
			index: index,
			history: false,
			shareEl: false,
			getThumbBoundsFn: function(index) {
				let thumbnail = items[index].el.getElementsByTagName('img')[0];
				let pageYScroll = window.pageYOffset || document.documentElement.scrollTop;
				let rect = thumbnail.getBoundingClientRect();
				return {
					x: rect.left,
					y: rect.top + pageYScroll,
					w: rect.width
				};
			}
		};

		this.gallery = new PhotoSwipe(this.DOM.pswpElement, PhotoSwipeUI_Default, items, this.swiperOptions);
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