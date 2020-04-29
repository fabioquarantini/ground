export default class gdprCompliance {
	constructor() {
		this.init();
	}

	init() {
		Yacc.configure({
			culture: 'it',
			cookiePageUrl: '/privacy-cookies/',
		});
	}
}
