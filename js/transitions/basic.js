import Highway from '@dogstudio/highway';
import Tween from 'gsap';

// Basic
class Basic extends Highway.Transition {
	in({ from, to, trigger, done }) {
		// Reset Scroll
		window.scrollTo(0, 0);

		// Remove Old View
		from.remove();

		// Animation
		Tween.set(to, { opacity: 1 });

		// Done
		done();
	}

	out({ from, trigger, done }) {
		// Animation
		Tween.set(from, { opacity: 0 });

		// Done
		done();
	}
}

export default Basic;

