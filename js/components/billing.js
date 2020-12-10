

const imagesLoaded = require('imagesloaded');

export default class Billing {
	constructor() {
		this.DOM = {
			html: document.documentElement,
			body: document.body,
			element: document.querySelector('.woocommerce-cart'),
			billingMethod: document.querySelector('#billing_customer_type'),
		};
		imagesLoaded(this.DOM.body, { background: true }, () => {
			this.init();
		});
	}

	init() {
		const billingCheckbox = document.getElementById('billing_invoice');

		if (!billingCheckbox) {
			return;
		}

		if (billingCheckbox.checked === true) {
			this.toggleBillingField(this.DOM.billingMethod.value, true);
		} else {
			this.toggleBillingField('', false);
		}

		billingCheckbox.addEventListener('input', (event) => {
			if (event.target.checked === true) {
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
			document.querySelector('#billing_customer_type_field').style.display = 'inherit';
			document.querySelector('#billing_company_field').style.display = 'inherit';
			document.querySelector('#billing_vat_field').style.display = 'inherit';
			document.querySelector('#billing_fiscal_code_field').style.display = 'inherit';
			document.querySelector('#billing_pec_field').style.display = 'inherit';
			document.querySelector('#billing_sdi_field').style.display = 'inherit';

			if (billingMethod === 'privato') {
				document.querySelector('#billing_company_field').style.display = 'none';
				document.querySelector('#billing_vat_field').style.display = 'none';
				// document.querySelector('#billing_fiscal_code_field').style.display = 'none';
				document.querySelector('#billing_pec_field').style.display = 'none';
				document.querySelector('#billing_sdi_field').style.display = 'none';
			}
		} else {
			document.querySelector('#billing_customer_type_field').style.display = 'none';
			document.querySelector('#billing_company_field').style.display = 'none';
			document.querySelector('#billing_vat_field').style.display = 'none';
			document.querySelector('#billing_fiscal_code_field').style.display = 'none';
			document.querySelector('#billing_pec_field').style.display = 'none';
			document.querySelector('#billing_sdi_field').style.display = 'none';
		}
	}
}
