module.exports = (ctx) => ({
	map: ctx.options.map,
	syntax: 'postcss-scss',
	plugins: {
		'postcss-import': {},
		tailwindcss: {},
		'postcss-for': {},
		'postcss-calc': {
			mediaQueries: true
		},
		'postcss-simple-vars': {},
		'postcss-nested': {},
		'postcss-100vh-fix': ctx.env === 'production' ? {} : false,
		autoprefixer: ctx.env === 'production' ? {} : false,
		cssnano: ctx.env === 'production' ? {} : false
	}
});
