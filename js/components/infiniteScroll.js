var InfiniteScrollPlugin = require('infinite-scroll');

export default class InfiniteScroll {
	constructor() {
		this.el = '.js-infinite-container';
		window.addEventListener('DOMContentLoaded', this.init());
		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});
	}

	init() {
		if (document.querySelectorAll(this.el).length == 0) {
			Debug.error('DOM node does not exist');
			return;
		}

		var infScroll = new InfiniteScrollPlugin(this.el, {
			path: '.js-next-page',
			append: '.js-infinite-post',
			history: false,
			scrollThreshold: 400,
			hideNav: '.pagination',
			status: '.js-infinite-status'
		});
	}
}
