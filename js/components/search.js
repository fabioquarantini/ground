/**
 * Search module
 */

import { getSiteUrl } from '../utilities/paths';
import { debounce } from '../utilities/debounce';
import { DEBUG_MODE } from '../utilities/environment';
export default class Search {
	/**
	 * @param {string} element - Selector
	 */
	constructor(element) {
		this.element = element || 'js-ajax-search';
		this.DOM = {
			html: document.documentElement,
			body: document.body,
			element: document.getElementById(this.element),
			searchForm: document.getElementById('js-search-form'),
			searchResult: document.getElementById('js-ajax-search-result'),
			searchInput: document.getElementById('js-ajax-search-input')
		};
		this.adminAjaxUrl = `${getSiteUrl()}/wp-admin/admin-ajax.php`;
		this.searchLoadingClass = 'is-search-loading';

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});
	}

	init() {
		if (this.DOM.element.length === 0) {
			return;
		}

		const debounceInput = debounce(() => {
			this.search();
		}, 250);

		console.log('component', this.DOM.searchForm);
		console.log('content', this.DOM.searchFormContent);
		this.DOM.searchInput.addEventListener('focus', () => {
			this.DOM.html.classList.add('is-search-focus');
			this.DOM.html.classList.add('is-search-open');
			this.DOM.searchForm.classList.add('is-search-open');
		});
		this.DOM.searchInput.addEventListener('input', debounceInput);
	}

	search() {
		const searchValue = this.DOM.searchInput.value;
		if (searchValue === '') {
			this.DOM.searchResult.innerHTML = '';
			return;
		}
		this.beforeSend();

		window
			.fetch(this.adminAjaxUrl, {
				method: 'post',
				headers: {
					'content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
				},
				body: `action=data_fetch&keyword=${searchValue}`
			})
			.then((res) => res.text())
			.then((html) => this.success(html))
			.catch((error) => {
				if (DEBUG_MODE) {
					// eslint-disable-next-line no-console
					console.error('🔥Error:', error);
				}
			});
	}

	beforeSend() {
		this.DOM.element.classList.add(this.searchLoadingClass);
		this.DOM.searchResult.innerHTML = '';
	}

	success(html) {
		this.DOM.element.classList.remove(this.searchLoadingClass);
		this.DOM.searchResult.innerHTML = html;
	}
}
