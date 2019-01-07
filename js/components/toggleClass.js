$(document).ready(function() {
	var elName = '.js-toggle-class';
	var $el = $(elName);

	if ($el.length == 0) {
		return;
	}

	$('body').on('click', elName, function(event) {
		event.preventDefault();
		var $elCliked = $(this);
		var toggleClassName = 'is-active';

		// Add data-toggle-class-name="customclass" to change the default class name
		if ($elCliked.attr('data-toggle-class-name')) {
			toggleClassName = $elCliked.data('toggle-class-name');
		}

		// Add data-toggle-class-selector="selector1 selector2" to toggle class on different tag
		if ($elCliked.attr('data-toggle-class-selector')) {
			var toggleClassSelector = $elCliked.data('toggle-class-selector');
			var obj = toggleClassSelector.split(' ');

			$.each(obj, function(index, value) {
				$('.' + value).toggleClass(toggleClassName);
			});
		} else {
			$elCliked.toggleClass(toggleClassName);
		}
	});
});
