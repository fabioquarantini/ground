import imagesLoaded from 'imagesLoaded';
import TweenMax from 'gsap/TweenMax';
import AbstractComponent from '../components/abstractComponent';

export default class Magnet extends AbstractComponent {
	/**
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		super(element, options);
		this.element = element || '.js-magnet';
		this.triggers = this.element;
		this.DOM = {
			element: document.querySelectorAll(this.element)
		};
		this.DOM.body = document.body;
		this.updateEvents = this.updateEvents.bind(this);

		new imagesLoaded(this.DOM.body, { background: true }, this.init());
	}

	init() {
		if (this.DOM.element.length == 0) {
			return;
		}
		super.initObserver(this.triggers, this.updateEvents);
		this.initEvents(this.triggers);
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents(triggers) {
		this.DOM.element.forEach((magnet) => {
			magnet.addEventListener('mousemove', event => this.moveMagnet(event));
			magnet.addEventListener('mouseout', event => this.removeMagnet(event));
		});
	}

	/**
	 * Update events
	 * @param {Object} target - Selector
	 */
	updateEvents(target) {
		target.addEventListener('mousemove', event => this.moveMagnet(event));
		target.addEventListener('mouseout', event => this.removeMagnet(event));
	}

	/**
	 * moveMagnet
	*/
	moveMagnet(event) {
		let magnetButton = event.currentTarget;
		let bounding = magnetButton.getBoundingClientRect();
		this.toggle(magnetButton);
		TweenMax.to(magnetButton, 1, {
			x: (((event.clientX - bounding.left)/magnetButton.offsetWidth) - 0.5) * 70,
			y: (((event.clientY - bounding.top)/magnetButton.offsetHeight) - 0.5) * 70,
			ease: Power4.easeOut
		});

		// magnetButton.style.transform = 'translate(' + (((( event.clientX - bounding.left)/(magnetButton.offsetWidth))) - 0.5) * strength + 'px,'+ (((( event.clientY - bounding.top)/(magnetButton.offsetHeight))) - 0.5) * strength + 'px)';
	}

	removeMagnet(event) {
		let magnetButton = event.currentTarget;
		this.toggle(magnetButton);
		TweenMax.to(magnetButton, 0.4, {x: 0, y: 0, ease: Back.easeOut});
	}

	toggle(target) {
		target.classList.toggle('is-magnet');
	}
}