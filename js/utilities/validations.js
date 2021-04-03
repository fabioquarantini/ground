/**
 * Validations
 */

/**
 * Check if the value is a valid email address
 * @param {string} value
 * @returns {boolean}
 */
export function isEmail(value) {
	// eslint-disable-next-line max-len
	return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/.test(
		value
	)
}

/**
 * Check if the value is a valid url
 * @param {string} value
 * @returns {boolean}
 */
export function isUrl(value) {
	// eslint-disable-next-line max-len
	return /^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})).?)(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(
		value
	)
}

/**
 * Check if the value is an integer
 * @param {string} value
 * @returns {boolean}
 */
export function isInteger(value) {
	return /^-?\d+$/.test(value)
}

/**
 * Check if the value is a JavaScript number.
 * @param {string} value
 * @returns {boolean}
 */
export function isNumeric(value) {
	return !isNaN(parseFloat(value)) && isFinite(value)
}

/**
 * Check if the value is float
 * @param {string} value
 * @returns {boolean}
 */
export function isFloat(value) {
	return /-?\d+\.\d+/.test(value)
}

/**
 * Check if the value is empty
 * @param {string} value
 * @returns {boolean}
 */
export function isEmpty(value, ignoreWhiteSpace) {
	return (ignoreWhiteSpace ? value.trim().length : value.length) === 0
}
