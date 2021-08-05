import Highway from '@dogstudio/highway';
import { gsap } from 'gsap';

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

	in({ from, to, trigger, done }) {
		const tlLoaderBg = gsap.timeline();
		const tlLoaderContent = gsap.timeline({
			delay: 0.2
		});
		// Reset Scroll
		window.scrollTo(0, 0);

		// Remove Old View
		from.remove();

		// Update body class
		document.documentElement.classList.replace('is-loading', 'is-loaded');

		// Animations
		tlLoaderBg.to(
			this.elementBg,
			{
				duration: 1,
				yPercent: -100,
				ease: 'power3.inOut',
				force3D: true,
				rotation: 0.01,
				onComplete: () => {
					// Update body class
					document.documentElement.classList.add('is-loader-complete');
					// Hide loader
					this.element.classList.add('display-none');
					// Done
					done();
				}
			},
			0.1
		);

		tlLoaderContent.to(this.elementContent, {
			duration: 0.8,
			ease: 'power3.out',
			y: -65,
			opacity: 0
		});
	}

	out({ from, trigger, done }) {
		const tlLoaderBg = gsap.timeline();
		const tlLoaderContent = gsap.timeline({
			delay: 0.6
		});

		// Update body class
		document.documentElement.classList.replace('is-loaded', 'is-loading');
		document.documentElement.classList.remove('is-loader-complete');

		// Show loader
		this.element.classList.remove('display-none');

		// Animations
		tlLoaderBg.fromTo(
			this.elementBg,
			{
				yPercent: 100
			},
			{
				duration: 1.5,
				yPercent: 0,
				ease: 'power3.out',
				force3D: true,
				rotation: 0.01,
				onComplete: () => {
					done();
				}
			},
			0
		);

		tlLoaderContent.fromTo(
			this.elementContent,
			{
				y: 65,
				opacity: 0
			},
			{
				duration: 0.8,
				ease: 'power3.out',
				y: 0,
				opacity: 1
			}
		);
	}
}

export default Reveal;
