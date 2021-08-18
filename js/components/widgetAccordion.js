export default class WidgetAccordion {
	/**
	 * @param {string} element - Selector
	 * @param {Object} options - User options
	 */
	constructor(element, options) {
		window.addEventListener('DOMContentLoaded', () => {
			this.initEvents();
		});
	}

	/**
	 * Initialize events
	 * @param {string} triggers - Selectors
	 */
	initEvents() {
		const elName = '.woocommerce-widget-layered-nav';
		const $el = jQuery(elName);

		if ($el.length == 0) {
			return;
		}

		jQuery(elName).each((key, value) => {
			const currentWidget = value;
			const currentWidgetTitle = jQuery(currentWidget).find('.woocommerce-widget-layered-nav__title');

			jQuery(currentWidgetTitle).click(() => {
				jQuery(currentWidget).toggleClass('widget-is-open');
			});
		});
	}
}
