import Splitting from 'splitting';

export default class Split {
	constructor() {
		window.addEventListener('DOMContentLoaded', this.init());
		window.addEventListener('NAVIGATE_IN', () => {
			this.init();
		});
		window.addEventListener('NAVIGATE_OUT', () => {
			//this.destroy();
		});
	}

	init() {
		Splitting();
	}
}