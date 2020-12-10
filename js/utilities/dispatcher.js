/**
 * Event dispatcher
 */
import { DEBUG_MODE } from './environment';

export default class Dispatcher {
	/**
	 * Event trigger
	 * @param {DOMString} eventName - Representing the name of the event.
	 * @param {*} detail - Additional parameters to pass along to the event handler.
	 */
	static trigger(eventName, detail) {
		const event = new window.CustomEvent(eventName, { detail });
		window.dispatchEvent(event);
		if (DEBUG_MODE) {
			// eslint-disable-next-line no-console
			console.log('🚀 Triggered:', eventName);
		}
	}
}
