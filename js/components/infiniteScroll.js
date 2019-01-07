var InfiniteScroll = require('infinite-scroll');

$(document).ready(function() {

	var classSelector = '.js-infinite-container';
	var $el = $(classSelector);

	if ($el.length == 0) {

		return;

	}

	var infScroll = new InfiniteScroll(classSelector, {
		path: '.js-next-page',
		append: '.js-infinite-post',
		history: false,
		scrollThreshold: 400,
		hideNav: '.pagination',
		status: '.js-infinite-status'
	});

});
