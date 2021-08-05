/**
 * Device
 */

/**
 * Match CSS media queries and JavaScript window width
 * @see http://stackoverflow.com/a/11310353
 * @returns {Object}
 */
export function getViewportSize() {
	let e = window;
	let a = 'inner';
	if (!('innerWidth' in window)) {
		a = 'client';
		e = document.documentElement || document.body;
	}
	return {
		width: e[`${a}Width`],
		height: e[`${a}Height`]
	};
}

/**
 * Detect Touch Events
 * @see http://www.stucox.com/blog/you-cant-detect-a-touchscreen/
 * @returns {boolean}
 */
export function isTouch() {
	// eslint-disable-next-line no-undef
	return ('ontouchstart' in window || (window.DocumentTouch && document instanceof DocumentTouch)) === true;
}

/**
 * Get device orientation
 * @returns {string}
 */
export function getDeviceOrientation() {
	const mql = window.matchMedia('(orientation: portrait)');
	return mql.matches ? 'portrait' : 'landscape';
}

/**
 * Cross-browser mouse position
 * @param {Object} event - Event
 * @returns {Object}
 * @see http://www.quirksmode.org/js/events_properties.html#position
 */
export function getMousePosition(event) {
	let posx = 0;
	let posy = 0;
	// eslint-disable-next-line no-param-reassign
	if (!event) event = window.event;
	if (event.pageX || event.pageY) {
		posx = event.pageX;
		posy = event.pageY;
	} else if (event.clientX || event.clientY) {
		posx = event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
		posy = event.clientY + document.body.scrollTop + document.documentElement.scrollTop;
	}
	return {
		x: posx,
		y: posy
	};
}
