require('@fancyapps/fancybox');

$(document).ready(function() {
	// TODO: Sistemare case insensitive
	var $el = $('[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]');

	if ($el.length == 0) {
		return;
	}

	$el.fancybox({
		loop: true,
		keyboard: true,
		arrows: true,
		infobar: true,
		clickOutside: 'close',
		transitionEffect: 'slide',
		hash: false,
		wheel: false,
		buttons: [
			//"zoom",
			//"share",
			//"slideShow",
			//"fullScreen",
			//"download",
			//"thumbs",
			'close'
		],
		clickContent: false,
		clickSlide: false,
		onActivate: function() {
			$('html').addClass('overflow-hidden');
		},
		beforeClose: function() {
			$('html').removeClass('overflow-hidden');
		},
		beforeShow: function(instance, slide) {
			var $navigation = $('.fancybox-navigation');
			var $navigationButtons = $navigation.find('.fancybox-button');
			var $navigationButtonLeft = $navigation.find('.fancybox-button--arrow_left');
			var $navigationButtonRight = $navigation.find('.fancybox-button--arrow_right');
			var navigationHeight = $navigationButtons.height();
			var $toolbar = $('.fancybox-toolbar');
			var toolbarHeight = $toolbar.height();
			var toolbarWidth = $toolbar.width();
			var $container = $('.fancybox-container');
			var containerHeight = $container.height();
			var containerWidth = $container.width();
			var scrollTop = $(window).scrollTop();

			$container.addClass('modal--follow-mouse');
			$navigationButtons.removeAttr('title');
			$navigationButtons.addClass('is-active');

			setTimeout(function() {
				$navigationButtons.removeClass('is-active');
			}, 400);

			$container.on('mousemove', function(e) {
				$navigationButtons.each(function() {
					$(this).css({
						left: e.pageX,
						top: e.pageY - scrollTop
					});
				});

				if (e.pageY - scrollTop < toolbarHeight && e.pageX > containerWidth - toolbarWidth) {
					$navigationButtons.hide();
				} else if (e.pageX < containerWidth / 2) {
					$navigationButtonLeft.show();
					$navigationButtonRight.hide();
				} else {
					$navigationButtonLeft.hide();
					$navigationButtonRight.show();
				}
			});
		}
	});
});
