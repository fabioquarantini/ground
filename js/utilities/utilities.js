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
		return window.location.protocol + '//' + window.location.host;
	}

	/**
	 * Get current url
	 * @returns {string}
	 */
	static getCurrentUrl() {
		return window.location.protocol + '//' +
			window.location.host +
			window.location.pathname +
			window.location.search;
	}

	/**
	 * Get random number
	 * @param  {Number} min - Min value
	 * @param  {Number} max - Max value
	 * @param  {Number} decimal
	 * @return {Number}
	 */
	static getRandomNumber(min, max, decimal) {
		const result = Math.random() * (max - min) + min;

		if (typeof decimal !== 'undefined') {
			return Number(result.toFixed(decimal));
		} else return result;
	}

	/**
	 * Get random integer
	 * @param  {Number} min - Min value
	 * @param  {Number} max - Max value
	 * @return {Number}
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
				'page': window.location.pathname,
				'title': document.title
			});
		}
	}

	/**
	 * Match CSS media queries and JavaScript window width
	 * @see http://stackoverflow.com/a/11310353
	 * @return {Object}
	 */
	static getViewportSize() {
		let e = window;
		let a = 'inner';
		if (!('innerWidth' in window)) {
			a = 'client';
			e = document.documentElement || document.body;
		}
		return {
			width: e[a + 'Width'],
			height: e[a + 'Height']
		};
	}

	/**
	 * Detect Touch Events
	 * @see http://www.stucox.com/blog/you-cant-detect-a-touchscreen/
	 * @return {boolean}
	 */
	static isTouch() {
		return true === ('ontouchstart' in window || (window.DocumentTouch && document instanceof DocumentTouch));
	}

	/**
	 * Get device orientation
	 * @return {string}
	 */
	static getDeviceOrientation() {
		let mql = window.matchMedia('(orientation: portrait)');
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
		var timeout;

		// This is the function that is actually executed when
		// the DOM event is triggered.
		return function executedFunction() {
			// Store the context of this and any
			// parameters passed to executedFunction
			var context = this;
			var args = arguments;

			// The function to be called after
			// the debounce time has elapsed
			var later = function() {
				// null timeout to indicate the debounce ended
				timeout = null;

				// Call function now if you did not on the leading end
				if (!immediate) func.apply(context, args);
			};

			// Determine if you should call the function
			// on the leading or trail end
			var callNow = immediate && !timeout;

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
		var expires;

		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
			expires = '; expires=' + date.toGMTString();
		} else {
			expires = '';
		}

		document.cookie = name + '=' + value + expires + '; path=/';
	}

	/**
	 * Read cookie
	 * @param {string} name - Cookie name
	 */
	static getCookie(name) {
		var nameEQ = name + '=';
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
		}
		return null;
	}

	/**
	 * Delete cookie
	 * @param {string} name - Cookie name
	 */
	static deleteCookie(name) {
		createCookie(name, '', -1);
	}

	// TODO: add description
	/**
	 *  Normalize
	 * @param {number} v
	 * @param {number} vmin
	 * @param {number} vmax
	 * @param {number} tmin
	 * @param {number} tmax
	 */
	static normalize(v, vmin, vmax, tmin, tmax) {
		var nv = Math.max(Math.min(v, vmax), vmin);
		var dv = vmax - vmin;
		var pc = (nv - vmin) / dv;
		var dt = tmax - tmin;
		var tv = tmin + pc * dt;
		return tv;
	}

	/**
	 * Cross-browser mouse position
	 * @param {Object} e - Event
	 * @return {Object}
	 * @see http://www.quirksmode.org/js/events_properties.html#position
	 */
	static getMousePosition(e) {
		let posx = 0;
		let posy = 0;
		if (!e) e = window.event;
		if (e.pageX || e.pageY) {
			posx = e.pageX;
			posy = e.pageY;
		} else if (e.clientX || e.clientY) {
			posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
			posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
		}
		return {
			x: posx,
			y: posy
		};
	}
}