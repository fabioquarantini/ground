/**
 * Event dispatcher
 */
import { DEBUG_MODE } from './environment';

/**
 * Event trigger
 * @param {DOMString} eventName - Representing the name of the event.
 * @param {*} detail - Additional parameters to pass along to the event handler.
 */
export function trigger(eventName, detail) {
	const event = new window.CustomEvent(eventName, { detail });
	window.dispatchEvent(event);
	if (DEBUG_MODE) {
		// eslint-disable-next-line no-console
		console.log('🚀 Triggered:', eventName);
	}
}
