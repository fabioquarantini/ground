import Highway from '@dogstudio/highway';
import TweenMax from 'gsap/TweenMax';

class Reveal extends Highway.Transition {
	constructor(wrap, name) {
		super(wrap, name);
		this.$el = $('.js-loader');
		this.$elBg = this.$el.find('.loader__bg');
		this.$elContent = this.$el.find('.loader__content');
	}

	in({ from, to, trigger, done }) {
		const tlLoaderBg = new TimelineLite();
		const tlLoaderContent = new TimelineLite({
			delay: 0.2
		});

		window.scrollTo(0, 0);
		from.remove();

		tlLoaderBg.to(this.$elBg, 1, {
			yPercent: -100,
			ease: Quart.easeInOut,
			force3D: true,
			rotation: 0.01,
			onComplete: () => {
				document.body.classList.remove('is-loading');
				document.body.classList.add('is-loaded');
				this.$el.hide();
				done();
			}
		}, 0.1);

		tlLoaderContent.to(this.$elContent, 0.8, {
			ease: Power3.easeOut,
			y: -65,
			opacity: 0
		});
	}

	out({ from, trigger, done }) {
		const tlLoaderBg = new TimelineLite();
		const tlLoaderContent = new TimelineLite({
			delay: 0.6
		});

		document.body.classList.add('is-loading');
		document.body.classList.remove('is-loaded');
		this.$el.show();

		tlLoaderBg.fromTo(this.$elBg, 1.5, {
			yPercent: 100
		}, {
			yPercent: 0,
			ease: Quart.easeOut,
			force3D: true,
			rotation: 0.01,
			onComplete: () => {
				done();
			}
		}, 0);

		tlLoaderContent.fromTo(this.$elContent, 0.8, {
			y: 65,
			opacity: 0
		}, {
			ease: Power3.easeOut,
			y: 0,
			opacity: 1
		});
	}
}

export default Reveal;
