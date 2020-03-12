import AbstractComponent from './abstractComponent';

const imagesLoaded = require('imagesloaded');

export default class Billing extends AbstractComponent {
	constructor() {
		super();
		this.DOM = { element: document.querySelector('.woocommerce-cart') };
		this.DOM.html = document.documentElement;
		this.DOM.body = document.body;
		this.DOM.billingMethod = document.querySelector('#billing_method');
		imagesLoaded(this.DOM.body, { background: true }, this.init());
	}

	init() {
		const billingCheckbox = document.getElementById('billing_check');

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

		this.DOM.billingMethod.addEventListener('change', () => {
			this.toggleBillingField(this.DOM.billingMethod.value, true);
		});
	}

	toggleBillingField(billingMethod, show) {
		if (show) {
			document.querySelector('#billing_method_field').style.display = 'inherit';
			document.querySelector('#billing_company_field').style.display = 'inherit';
			document.querySelector('#billing_vat_field').style.display = 'inherit';
			document.querySelector('#billing_pec_field').style.display = 'inherit';
			document.querySelector('#billing_receiver_field').style.display = 'inherit';

			if (billingMethod === 'privato') {
				document.querySelector('#billing_company_field').style.display = 'none';
				// document.querySelector('#billing_vat_field').style.display = 'none';
				document.querySelector('#billing_pec_field').style.display = 'none';
				document.querySelector('#billing_receiver_field').style.display = 'none';
			}
		} else {
			document.querySelector('#billing_method_field').style.display = 'none';
			document.querySelector('#billing_company_field').style.display = 'none';
			document.querySelector('#billing_vat_field').style.display = 'none';
			document.querySelector('#billing_pec_field').style.display = 'none';
			document.querySelector('#billing_receiver_field').style.display = 'none';
		}
	}
}
