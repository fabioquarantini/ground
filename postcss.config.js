module.exports = {
	syntax: 'postcss-scss',
	plugins: [
		require('postcss-import'),
		require('tailwindcss'),
		require('postcss-for'),
		require('postcss-simple-vars'),
		require('postcss-nested'),
		// require('postcss-100vh-fix'), // requires PostCSS 8
		require('autoprefixer'),
	]
}