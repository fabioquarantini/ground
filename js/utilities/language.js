/**
 * Language
 */

/**
 * Get current language
 * @returns {string}
 */
export function getCurrentLanguage() {
	return document.documentElement.getAttribute('lang');
}
