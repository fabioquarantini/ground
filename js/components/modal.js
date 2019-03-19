/**
 * Modal module
 * Lightbox library for presenting various types of media
 * @see http://fancyapps.com/fancybox/3
 * @todo Remove jQuery dependency
 */
import * as deepmerge from 'deepmerge';
require('@fancyapps/fancybox');

export default class Modal {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		this.element = element || '[href$=".jpg"], [href$=".png"], [href$=".gif"], [href$=".jpeg"], [href$=".webp"]';
		this.defaults = {
			closeExisting: false,
			loop: true,
			gutter: 50,
			keyboard: true,
			preventCaptionOverlap: true,
			arrows: true,
			infobar: true,
			smallBtn: 'auto',
			toolbar: 'auto',
			buttons: [
				//'zoom',
				//"share",
				//'slideShow',
				//"fullScreen",
				//"download",
				//'thumbs',
				'close'
			],
			idleTime: 3,
			protect: false,
			image: {
				preload: false
			},
			defaultType: 'image',
			animationEffect: 'zoom',
			animationDuration: 366,
			zoomOpacity: 'auto',
			transitionEffect: 'slide',
			transitionDuration: 366,
			slideClass: '',
			baseClass: '',
			parentEl: 'body',
			hideScrollbar: true,
			autoFocus: true,
			backFocus: true,
			trapFocus: true,
			fullScreen: {
				autoStart: false
			},
			touch: {
				vertical: true,
				momentum: true
			},
			hash: false,
			slideShow: {
				autoStart: false,
				speed: 3000
			},
			thumbs: {
				autoStart: false,
				hideOnClose: true,
				parentEl: '.fancybox-container',
				axis: 'y'
			},
			wheel: false,
			clickSlide: 'close',
			clickOutside: 'close',
			dblclickContent: false,
			dblclickSlide: false,
			dblclickOutside: false,
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_END', () => {
			this.init();
		});

		$(document).on('beforeShow.fb', (e, instance, slide) => {
			this.beforeShow();
		});

		$(document).on('beforeClose.fb', (e, instance, slide) => {
			this.beforeClose();
		});

		$(document).on('onActivate.fb', (e, instance, slide) => {
			this.onActivate();
		});

		window.addEventListener('NAVIGATE_OUT', () => {
			this.destroy();
		});
	}

	init() {
		if ($(this.element).length == 0) {
			return;
		}

		$(this.element).fancybox(this.options);
	}

	beforeShow(e, instance, slide) {
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

		setTimeout(function() {
			$navigationButtons.blur();
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

	beforeClose(e, instance, slide) {
		$('html').removeClass('overflow-hidden');
	}

	onActivate(e, instance, slide) {
		$('html').addClass('overflow-hidden');
	}

	destroy() {
		$.fancybox.destroy();
	}
}