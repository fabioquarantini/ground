import AbstractComponent from './abstractComponent';

const imagesLoaded = require('imagesloaded');

export default class Billing extends AbstractComponent {
	constructor() {
		super();
		this.DOM = { element: document.querySelector('.woocommerce-cart')};
		this.DOM.html = document.documentElement;
		this.DOM.body = document.body;
		this.DOM.billingMethod = document.querySelector('#billing_method');
		imagesLoaded(this.DOM.body, { background: true }, this.init());
	}

	init() {

		var billingCheckbox = document.getElementById('billing_check');

		if (!billingCheckbox) {
			return;
		}

		if (billingCheckbox.checked == true) {
			this.toggleBillingField(this.DOM.billingMethod.value, true);
		}

		billingCheckbox.addEventListener('input', (event) => {
			if (event.target.checked == true) {
				this.toggleBillingField(this.DOM.billingMethod.value, true);
			} else {
				this.toggleBillingField(this.DOM.billingMethod.value, false);
			}
		});

		this.DOM.billingMethod.addEventListener("change", () => {
			this.toggleBillingField(this.DOM.billingMethod.value, true);
		});

	}

	toggleBillingField(billingMethod, show) {

		if (show) {
			$('#billing_method_field').attr('style', 'display:block!important;');
			$('#billing_company_field').attr('style', 'display:block!important;');
			$('#billing_vat_field').attr('style', 'display:block!important;');
			$('#billing_pec_field').attr('style', 'display:block!important;');
			$('#billing_receiver_field').attr('style', 'display:block!important;');

			if (billingMethod == 'privato') {
				$('#billing_company_field').attr('style', 'display:none!important;');
				//$('#billing_vat_field').attr('style', 'display:none!important;');
				$('#billing_pec_field').attr('style', 'display:none!important;');
				$('#billing_receiver_field').attr('style', 'display:none!important;');
			}
		} else {
			$('#billing_method_field').attr('style', 'display:none!important;');
			$('#billing_company_field').attr('style', 'display:none!important;');
			$('#billing_vat_field').attr('style', 'display:none!important;');
			$('#billing_pec_field').attr('style', 'display:none!important;');
			$('#billing_receiver_field').attr('style', 'display:none!important;');
		}


	}

}
