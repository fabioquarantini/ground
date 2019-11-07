/**
 * Ajax navigation module
 * A Modern Javascript Transitions Manager
 * @see https://highway.js.org
 */
import 'promise-polyfill/src/polyfill';
import 'whatwg-fetch';
import Highway from '@dogstudio/highway';
import Reveal from '../transitions/reveal';
import Fade from '../transitions/fade';
import Dispatcher from '../utilities/dispatcher';
import AbstractComponent from './abstractComponent';
import ContactForm from './contactForm';

// eslint-disable-next-line no-unused-vars
const contactForm = new ContactForm();

export default class AjaxNavigation extends AbstractComponent {
	constructor() {
		super();
		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});
	}

	init() {
		this.H = new Highway.Core({
			transitions: {
				default: Reveal,
				contextual: {
					fade: Fade,
				},
			},
		});

		this.H.on('NAVIGATE_IN', (data) => {
			this.navigateIn(data);
		});

		this.H.on('NAVIGATE_OUT', (data) => {
			this.navigateOut(data);
		});

		this.H.on('NAVIGATE_END', (data) => {
			this.navigateEnd(data);
		});

		document.documentElement.classList.add('is-ajax');
	}

	/**
	 * This event is sent everytime a data-router-view is added to the DOM Tree
	 */
	navigateIn(data) {
		const links = document.querySelectorAll('.navigation__item');
		// Clean class
		document.body.className = data.to.page.body.className;
		Dispatcher.trigger('NAVIGATE_IN', data);

		for (let i = 0; i < links.length; i++) {
			const item = links[i];
			const link = item.firstElementChild;

			// Clean class
			item.classList.remove('is-active');

			// Active link
			if (link.href === location.href) {
				item.classList.add('is-active');
			}
		}
	}

	/**
	 * This event is sent everytime the out() method of a transition is run to hide a data-router-view
	 */
	navigateOut(data) {
		Dispatcher.trigger('NAVIGATE_OUT', data);
	}

	/**
	 * This event is sent everytime the done() method is called in the in() method of a transition
	 */
	navigateEnd(data) {
		Dispatcher.trigger('NAVIGATE_END', data);
	}
}
