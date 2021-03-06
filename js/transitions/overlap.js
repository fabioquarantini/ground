import Highway from '@dogstudio/highway';
import Tween from 'gsap';

class Overlap extends Highway.Transition {
	in({
		from, to, trigger, done,
	}) {
		// Reset Scroll
		window.scrollTo(0, 0);

		// Animation
		Tween.fromTo(to, 0.5,
			{ opacity: 0 },
			{
				opacity: 1,
				onComplete: done,
			});

		// Animation
		Tween.fromTo(from, 0.5,
			{ opacity: 1 },
			{
				opacity: 0,
				onComplete: () => {
					// Set New View in DOM Stream
					to.style.position = 'static';

					// Remove Old View
					from.remove();
				},
			});
	}

	out({ from, trigger, done }) {
		done();
	}
}

export default Overlap;
