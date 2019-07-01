/**
 * Search module
 * @todo Add debounce
 * @todo Fix variables
 * @todo Add no product found
 */

import Utilities from '../utilities/utilities';

export default class Search {
	/**
	 * @param {string} element - Selector
	 */
	constructor(element) {
		this.element = element || 'js-ajax-search';
		this.$element = document.getElementById(this.element);
		//this.searchInput = '.js-ajax-search';
		this.searchResult = 'js-ajax-search-result';
		this.$searchResult = document.getElementById(this.searchResult);
		//this.searchSpinner = '.js-ajax-search';
		this.adminAjaxUrl = Utilities.getSiteUrl() + '/wp-admin/admin-ajax.php';

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			this.init();
		});
	}

	init() {
		if (this.$element.length == 0) {
			return;
		}
		var el = document.getElementById('js-ajax-search-input');
		el.addEventListener('keyup', () => this.search());
	}

	search() {
		if (document.getElementById('js-ajax-search-input').value == '') {
			$('#js-ajax-search-result').empty();
			return;
		}

		this.beforeSend();
		fetch(this.adminAjaxUrl, {
			method: 'post',
			headers: {
				'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
			},
			body: 'action=data_fetch&keyword=' + document.getElementById('js-ajax-search-input').value

		}).then(function(res) {
			return res.text();
		}).then(
			html => this.success(html)
		).catch(function(error) {
			console.log('Request failed', error);
		});
	}

	beforeSend() {
		this.$element.classList.add('is-search-loading');
		this.$searchResult.innerHTML = null;
	}

	success(html) {
		this.$element.classList.remove('is-search-loading');
		this.$searchResult.innerHTML = html;
	}
}