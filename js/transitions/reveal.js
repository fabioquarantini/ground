import Highway from '@dogstudio/highway';
import TweenMax from 'gsap/TweenMax';

class Reveal extends Highway.Transition {
	/**
	 * @param {object} wrap - [data-router-wrapper] node
	 * @param {object} name - Transition name
	 */
	constructor(wrap, name) {
		super(wrap, name);

		this.element = document.getElementById('js-loader');
		this.elementBg = document.getElementById('js-loader-bg');
		this.elementContent = document.getElementById('js-loader-content');
	}

	in({
		from, to, trigger, done,
	}) {
		const tlLoaderBg = new TimelineLite();
		const tlLoaderContent = new TimelineLite({
			delay: 0.2,
		});
		// Reset Scroll
		window.scrollTo(0, 0);

		// Remove Old View
		from.remove();

		// Update body class
		document.documentElement.classList.replace('is-loading', 'is-loaded');

		// Animations
		tlLoaderBg.to(this.elementBg, 1, {
			yPercent: -100,
			ease: Quart.easeInOut,
			force3D: true,
			rotation: 0.01,
			onComplete: () => {
				// Update body class
				document.documentElement.classList.add('is-loader-complete');
				// Hide loader
				this.element.classList.add('display-none');
				// Done
				done();
			},
		}, 0.1);

		tlLoaderContent.to(this.elementContent, 0.8, {
			ease: Power3.easeOut,
			y: -65,
			opacity: 0,
		});
	}

	out({ from, trigger, done }) {
		const tlLoaderBg = new TimelineLite();
		const tlLoaderContent = new TimelineLite({
			delay: 0.6,
		});

		// Update body class
		document.documentElement.classList.replace('is-loaded', 'is-loading');
		document.documentElement.classList.remove('is-loader-complete');

		// Show loader
		this.element.classList.remove('display-none');

		// Animations
		tlLoaderBg.fromTo(this.elementBg, 1.5, {
			yPercent: 100,
		}, {
			yPercent: 0,
			ease: Quart.easeOut,
			force3D: true,
			rotation: 0.01,
			onComplete: () => {
				// Done
				done();
			},
		}, 0);

		tlLoaderContent.fromTo(this.elementContent, 0.8, {
			y: 65,
			opacity: 0,
		}, {
			ease: Power3.easeOut,
			y: 0,
			opacity: 1,
		});
	}
}

export default Reveal;
