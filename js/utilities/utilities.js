/**
 * Utilities module
 */

export default class Utilities {
	/**
	 * Get current language
	 * @returns {string}
	 */
	static getCurrentLanguage() {
		return document.documentElement.getAttribute('lang');
	}

	/**
	 * Get template url
	 * @returns {string}
	 */
	static getTemplateUrl() {
		return document.body.dataset.templateUrl;
	}

	/**
	 * Get site url
	 * @returns {string}
	 */
	static getSiteUrl() {
		return `${window.location.protocol}//${window.location.host}`;
	}

	/**
	 * Get current url
	 * @returns {string}
	 */
	static getCurrentUrl() {
		return `${window.location.protocol}//${window.location.host}${window.location.pathname}${window.location.search}`;
	}

	/**
	 * Get random number
	 * @param  {Number} min - Min value
	 * @param  {Number} max - Max value
	 * @param  {Number} decimal
	 * @returns {Number}
	 */
	static getRandomNumber(min, max, decimal) {
		const result = Math.random() * (max - min) + min;

		if (typeof decimal !== 'undefined') {
			return Number(result.toFixed(decimal));
		} return result;
	}

	/**
	 * Get random integer
	 * @param  {Number} min - Min value
	 * @param  {Number} max - Max value
	 * @returns {Number}
	 */
	static getRandomInt(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}

	/**
	 * Send a GA page view event when context is AJAX.
	 */
	static trackGoogleAnalytics() {
		if (typeof window.ga !== 'undefined') {
			window.ga('send', 'pageview', {
				page: window.location.pathname,
				title: document.title,
			});
		}
	}

	/**
	 * Match CSS media queries and JavaScript window width
	 * @see http://stackoverflow.com/a/11310353
	 * @returns {Object}
	 */
	static getViewportSize() {
		let e = window;
		let a = 'inner';
		if (!('innerWidth' in window)) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		return {
			width: e[`${a}Width`],
			height: e[`${a}Height`],
		};
	}

	/**
	 * Detect Touch Events
	 * @see http://www.stucox.com/blog/you-cant-detect-a-touchscreen/
	 * @returns {boolean}
	 */
	static isTouch() {
		// eslint-disable-next-line no-undef
		return ('ontouchstart' in window || (window.DocumentTouch && document instanceof DocumentTouch)) === true;
	}

	/**
	 * Get device orientation
	 * @returns {string}
	 */
	static getDeviceOrientation() {
		const mql = window.matchMedia('(orientation: portrait)');
		return (mql.matches) ? 'portrait' : 'landscape';
	}

	/**
	 * Returns a function, that, as long as it continues to be invoked, will not be triggered.
	 * The function will be called after it stops being called for N milliseconds.
	 * If 'immediate' is passed, trigger the function on the leading edge, instead of the trailing.
	 * @see https://davidwalsh.name/javascript-debounce-function
	 * @param {function} func - Function to wrap
	 * @param {number} wait - Timeout in ms (`100`)
	 * @param {boolean} immediate - Whether to execute at the beginning (`false`)
	 */
	static debounce(func, wait, immediate) {
		let timeout;

		// This is the function that is actually executed when
		// the DOM event is triggered.
		return function executedFunction() {
			// Store the context of this and any
			// parameters passed to executedFunction
			const context = this;
			// eslint-disable-next-line prefer-rest-params
			const args = arguments;

			// The function to be called after
			// the debounce time has elapsed
			const later = () => {
				// null timeout to indicate the debounce ended
				timeout = null;

				// Call function now if you did not on the leading end
				if (!immediate) func.apply(context, args);
			};

			// Determine if you should call the function
			// on the leading or trail end
			const callNow = immediate && !timeout;

			// This will reset the waiting every function execution.
			// This is the step that prevents the function from
			// being executed because it will never reach the
			// inside of the previous setTimeout
			clearTimeout(timeout);

			// Restart the debounce waiting period.
			// setTimeout returns a truthy value (it differs in web vs node)
			timeout = setTimeout(later, wait);

			// Call immediately if you're dong a leading
			// end execution
			if (callNow) func.apply(context, args);
		};
	}

	/**
	 * Create cookie
	 * @param {string} name - Cookie name
	 * @param {string} value - Cookie value
	 * @param {number} days - Expiry date in days (`7`)
	 */
	static setCookie(name, value, days) {
		let expires;

		if (days) {
			const date = new Date();
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
			expires = `; expires=${date.toGMTString()}`;
		} else {
			expires = '';
		}

		document.cookie = `${name}=${value}${expires}; path=/`;
	}

	/**
	 * Read cookie
	 * @param {string} name - Cookie name
	 */
	static getCookie(name) {
		const nameEQ = `${name}=`;
		const ca = document.cookie.split(';');
		for (let i = 0; i < ca.length; i++) {
			let c = ca[i];
			while (c.charAt(0) === ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	/**
	 * Delete cookie
	 * @param {string} name - Cookie name
	 */
	static deleteCookie(name) {
		this.setCookie(name, '', -1);
	}

	/**
	 * Normalize the value calculating the proportion between the actual range and the new one
	 * @param {number} value - The value to be normalized
	 * @param {number} actualMinRange - The minimum actual value of the range
	 * @param {number} actualMaxRange - The maximum actual value of the range
	 * @param {number} newMinRange - The minimum new value of the range
	 * @param {number} newMaxRange - The maximum new value of the range
	 * @returns {number} The value inside the new range's values
	 * @see https://github.com/yakudoo/TheAviator/blob/d19b8744e745f74fb70b4f255d700394aa6b3200/js/game.js#L965
	 */
	static normalize(value, actualMinRange, actualMaxRange, newMinRange, newMaxRange) {
		const sanitizedValue = Math.max(Math.min(value, actualMaxRange), actualMinRange);
		const actualRangeDelta = actualMaxRange - actualMinRange;
		const coefficent = (sanitizedValue - actualMinRange) / actualRangeDelta;
		const newRangeDelta = newMaxRange - newMinRange;
		const newValue = newMinRange + coefficent * newRangeDelta;
		return newValue;
	}

	/**
	 * Cross-browser mouse position
	 * @param {Object} event - Event
	 * @returns {Object}
	 * @see http://www.quirksmode.org/js/events_properties.html#position
	 */
	static getMousePosition(event) {
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
			y: posy,
		};
	}

	/**
	 * Linear interpolation - Calculates a number between two numbers at a specific increment
	 * @param {number} start - Start value
	 * @param {number} end - End value
	 * @param {float} amount - The amount to interpolate between the two values where 0.0 equal to the first point, 0.1 is very near the first point, 0.5 is half-way in between, etc.
	 */
	static lerp(start, end, amount) {
		return (1 - amount) * start + amount * end;
	}

	/**
	 * Observe DOM Node Changes
	 * @param {string} triggers - Selectors
	 * @param {requestCallback} cb - The callback that handles the response.
	 *
	 * @see https://stackoverflow.com/questions/56608748/how-to-use-queryselectorall-on-the-added-nodes-in-a-mutationobserver
	 */
	static initObserver(triggers, callback) {

		const filterSelector = (selector, mutationsList) => {
			// We can't create a NodeList; let's use a Set
			const result = new Set();
			// Loop through the mutationsList...
			for (const {
				addedNodes,
			} of mutationsList) {
				for (const node of addedNodes) {
					// console.log(node);

					// If it's an element...
					if (node.nodeType === 1) {
						// Add it if it's a match
						if (node.matches(selector)) {
							result.add(node);
						}
						// Add any children
						for (const entry of node.querySelectorAll(selector)) {
							result.add(entry);
						}
					}
				}
			}

			/* mutationsList.map((e) => e.addedNodes).forEach((n) => {
				if (n.nodeType === 1) {
					if (n.matches(selector)) {
						result.add(n);
					}
					// Add any children
					n.querySelectorAll(selector).forEach((c) => result.add(c));
				}
			}); */

			return [...result]; // Result is an array, or just return the set
		};

		const observerCallback = (mutationsList) => {
			const result = filterSelector(triggers, mutationsList);
			result.forEach((element) => {
				callback(element);
			});
		};

		const config = {
			childList: true,
			attributes: false,
			characterData: false,
			subtree: true,
		};
		const observer = new MutationObserver(observerCallback);
		observer.observe(document.documentElement, config);
		//observer.disconnect();
	}
}
