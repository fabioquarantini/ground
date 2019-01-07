$(document).ready(function() {
	var $el = $('.js-parallax');

	if ($el.length == 0) {
		return;
	}

	var scene;
	var controller = new ScrollMagic.Controller();

	$el.each(function(index, el) {
		var $selector = $(el);
		var from = $selector.data('parallax-from') || '0';
		var to = $selector.data('parallax-to') || '0';
		var duration = $selector.data('parallax-duration') || '200%';
		var triggerHook = $selector.data('parallax-trigger-hook') || 'onEnter';
		var timeLine = new TimelineMax();

		scene = new ScrollMagic.Scene({
			duration: duration,
			triggerElement: el,
			triggerHook: triggerHook,
			reverse: true,
			loglevel: 2
		}).addTo(controller);

		// Timeline GSAP
		timeLine.fromTo(
			$selector,
			1,
			{
				y: from,
				force3D: true
			},
			{
				y: to,
				force3D: true,
				ease: Linear.easeNone
			}
		);
		scene.setTween(timeLine);

		// Add "class" to an element during a scene
		scene.setClassToggle(el, 'is-in-scene');

		// Pin element for the duration of scene
		//scene.setPin('.js-parallax-pin');

		// Class will remain on element outside of scene
		//scene.removeClassToggle(false);

		// Debug (enable script in head-output.php)
		// scene.addIndicators({
		// 	name: "Indicator"
		// })
	});
});
