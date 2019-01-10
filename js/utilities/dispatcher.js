import Debug from './debug.js';

export default class Dispatcher {
	static trigger(eventName, data) {
		let event = new window.CustomEvent(eventName, {
			detail: data
		});
		Debug.log('🚀 Triggered ' + eventName);
		window.dispatchEvent(event);
	}
}