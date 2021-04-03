/**
 * Math module
 */

export default class Math {
	/**
	 * Get random number
	 * @param  {Number} min - Min value
	 * @param  {Number} max - Max value
	 * @param  {Number} decimal
	 * @returns {Number}
	 */
	static getRandomNumber(min, max, decimal) {
		const result = Math.random() * (max - min) + min

		if (typeof decimal !== 'undefined') {
			return Number(result.toFixed(decimal))
		}
		return result
	}

	/**
	 * Get random integer
	 * @param  {Number} min - Min value
	 * @param  {Number} max - Max value
	 * @returns {Number}
	 */
	static getRandomInt(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min
	}

	/**
	 * Normalize the value calculating the proportion between the actual range and the new one
	 * @param {number} value - The value to be normalized
	 * @param {number} actualMinRange - The minimum actual value of the range
	 * @param {number} actualMaxRange - The maximum actual value of the range
	 * @param {number} newMinRange - The minimum new value of the range
	 * @param {number} newMaxRange - The maximum new value of the range
	 * @returns {number} The value inside the new range's values
	 * @see https://github.com/yakudoo/TheAviator/blob/d19b8744e745f74fb70b4f255d700394aa6b3200/js/game.js#L965
	 */
	static normalize(
		value,
		actualMinRange,
		actualMaxRange,
		newMinRange,
		newMaxRange
	) {
		const sanitizedValue = Math.max(
			Math.min(value, actualMaxRange),
			actualMinRange
		)
		const actualRangeDelta = actualMaxRange - actualMinRange
		const coefficent = (sanitizedValue - actualMinRange) / actualRangeDelta
		const newRangeDelta = newMaxRange - newMinRange
		const newValue = newMinRange + coefficent * newRangeDelta
		return newValue
	}

	/**
	 * Linear interpolation - Calculates a number between two numbers at a specific increment
	 * @param {number} start - Start value
	 * @param {number} end - End value
	 * @param {float} amount - The amount to interpolate between the two values where 0.0 equal to the first point, 0.1 is very near the first point, 0.5 is half-way in between, etc.
	 */
	static lerp(start, end, amount) {
		return (1 - amount) * start + amount * end
	}
}
