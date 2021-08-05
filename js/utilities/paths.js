/**
 * Paths
 */

/**
 * Get template url
 * @returns {string}
 */
export function getTemplateUrl() {
	return document.body.dataset.templateUrl;
}

/**
 * Get site url
 * @returns {string}
 */
export function getSiteUrl() {
	return `${window.location.protocol}//${window.location.host}`;
}

/**
 * Get current url
 * @returns {string}
 */
export function getCurrentUrl() {
	return `${window.location.protocol}//${window.location.host}${window.location.pathname}${window.location.search}`;
}
