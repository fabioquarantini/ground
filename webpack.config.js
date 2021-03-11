const path = require('path')
const WebpackBuildNotifierPlugin = require('webpack-build-notifier')
const mode = process.env.WEBPACK_MODE

module.exports = {
	// The point or points where to start the application bundling process.
	entry: './js/app.js',

	output: {
		// This option determines the name of each output bundle.
		filename: 'scripts.min.js',
		// The bundle is written to the directory specified by the output.path option.
		path: path.resolve(__dirname, 'js'),
	},

	// This option controls if and how source maps are generated.
	devtool: 'source-map',

	// Turn on watch mode.
	// This means that after the initial build, webpack will continue to watch for changes in any of the resolved files.
	watch: mode === 'production' ? false : true,

	watchOptions: {
		ignored: ['node_modules/**'],
	},

	plugins: [
		// Display OS-level notifications for Webpack build errors and warnings.
		new WebpackBuildNotifierPlugin({
			//title: 'Ground',
			//message: 'Hello, there!',
			sound: false,
			failureSound: 'Bottle',
			logo: path.join(__dirname, 'img/icon.png'),
			contentImage: path.join(__dirname, 'img/icon.png'),
		}),
	],

	module: {
		rules: [
			{
				test: /\.m?js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
				},
			},
		],
	},
}
