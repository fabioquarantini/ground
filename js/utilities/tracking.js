/**
 * Tracking
 */

/**
 * Send a GA page view event when context is AJAX.
 */
export function trackGoogleAnalytics() {
	if (typeof window.ga !== 'undefined') {
		window.ga('send', 'pageview', {
			page: window.location.pathname,
			title: document.title
		});
	}
}
