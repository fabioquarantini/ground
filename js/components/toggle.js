/**
 * Toggle module
 */
import * as deepmerge from 'deepmerge';

export default class Toggle {
	/**
	 * @param {Object} options - User options
	 */
	constructor(options) {
		this.defaults = {
			element: '.js-toggle',
			toggleClassName: 'is-active'
		};
		this.options = options ? deepmerge(this.defaults, options) : this.defaults;
		this.element = document.querySelectorAll(this.options.element);

		window.addEventListener('DOMContentLoaded', () => {
			this.init();
		});

		window.addEventListener('NAVIGATE_END', () => {
			this.init();
		});

		window.addEventListener('infiniteScrollAppended', () => {
			this.init();
		});
	}

	init() {
		if (this.element.length == 0) {
			return;
		}

		this.element.forEach(el => {
			el.addEventListener('click', (event) => {
				event.preventDefault();

				// Add data-toggle-class-name="customclass" to change the default class name
				if (el.hasAttribute('data-toggle-class-name')) {
					this.options.toggleClassName = el.dataset.toggleClassName;
				}

				// Add data-toggle-target=".selector1 #selector2" to toggle different target
				if (el.hasAttribute('data-toggle-target')) {
					let targetList = el.dataset.toggleTarget.split(' ');

					targetList.forEach(element => {
						let target = document.querySelectorAll(element);
						target.forEach(element => {
							element.classList.toggle(this.options.toggleClassName);
						}, this);
					}, this);
				} else {
					el.classList.toggle(this.options.toggleClassName);
				}
			});
		}, this);
	}
}