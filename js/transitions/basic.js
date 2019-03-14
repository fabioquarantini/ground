import Highway from '@dogstudio/highway';
import Tween from 'gsap';

// Basic
class Basic extends Highway.Transition {
	in({ from, to, trigger, done }) {
		// Reset Scroll
		window.scrollTo(0, 0);

		// Remove Old View
		from.remove();

		// Update body class
		document.body.classList.remove('is-loading');
		document.body.classList.add('is-loaded');

		// Animation
		Tween.set(to, { opacity: 1 });

		// Done
		done();
	}

	out({ from, trigger, done }) {
		// Update body class
		document.body.classList.add('is-loading');
		document.body.classList.remove('is-loaded');

		// Animation
		Tween.set(from, { opacity: 0 });

		// Done
		done();
	}
}

export default Basic;

