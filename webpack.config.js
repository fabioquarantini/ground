const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WebpackBuildNotifierPlugin = require('webpack-build-notifier');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

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
	watch: true,

	watchOptions: {
		ignored: ['node_modules/**']
	},

	plugins: [
		// This plugin extracts CSS into separate files.
		// It creates a CSS file per JS file which contains CSS.
		new MiniCssExtractPlugin({
			filename: '../css/main.css',
		}),
		// Display OS-level notifications for Webpack build errors and warnings.
		new WebpackBuildNotifierPlugin({
			//title: 'Ground',
			//message: 'Hello, there!',
			sound: false,
			failureSound: 'Bottle',
			logo: path.join(__dirname, 'img/icon.png'),
			contentImage: path.join(__dirname, 'img/icon.png')
		}),
		// BrowserSync
		new BrowserSyncPlugin({
			proxy: 'https://ground.develop',
			// server: { baseDir: [path.join(__dirname, '.')] }
			// host: 'localhost',
			files: ["**/*.{php,html}"],
			ghostMode: {
				clicks: true,
				forms: true,
				scroll: true,
			},
			open: true,
			notify: true,
			scrollProportionally: true,
			injectChanges: true,
			port: 3000,
		},{
			reload: true,
			injectCss: true
		}),
	],

	module: {
		rules: [
			{
				test: /\.s[ac]ss$/i,
				use: [
					{
						loader: MiniCssExtractPlugin.loader
					},
					{
						loader: 'css-loader',
						options: {
							sourceMap: true,
							url: false,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							plugins: () => [
								require('postcss-100vh-fix'),
								require('autoprefixer')
							],
							sourceMap: true
						}
					},
					{
						loader: 'sass-loader',
						options: {
							sourceMap: true,
							sassOptions: {
								precision: 10
							},
						},
					},
				],
			},
			{
				test: /\.m?js$/,
				exclude: /(node_modules|bower_components)/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env'],
						presets: [
							[
								"@babel/preset-env",
								{
									useBuiltIns: "entry",
									corejs: '3'
								}
							]
						]
					}
				}
			}
		],
	},
};
