/**
 * Cookies
 */

/**
 * Create cookie
 * @param {string} name - Cookie name
 * @param {string} value - Cookie value
 * @param {number} days - Expiry date in days (`7`)
 */
export function setCookie(name, value, days) {
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
export function getCookie(name) {
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
export function deleteCookie(name) {
	this.setCookie(name, '', -1);
}
