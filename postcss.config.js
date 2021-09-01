module.exports = (ctx) => ({
	map: ctx.options.map,
	plugins: {
		'postcss-import': {},
		'tailwindcss/nesting': {},
		tailwindcss: {},
		'postcss-for': {},
		// 'postcss-calc': {
		// 	mediaQueries: true
		// },
		'postcss-simple-vars': {},
		'postcss-100vh-fix': true,
		autoprefixer: ctx.env === 'production' ? {} : false,
		cssnano: ctx.env === 'production' ? {} : false
	}
});
