import {
	DEBUG_MODE
} from './environment.js';

export default class Debug {
	static log(...args) {
		if (DEBUG_MODE) {
			console.log('log:', ...args);
		}
	}

	static warn(...args) {
		if (DEBUG_MODE) {
			console.warn('warn:', ...args);
		}
	}

	static error(...args) {
		if (DEBUG_MODE) {
			console.error('error:', ...args);
		}
	}
}