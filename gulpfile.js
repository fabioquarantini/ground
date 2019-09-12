const { watch, series, src, dest } = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const cssnano = require('gulp-cssnano');
const consolidate = require('gulp-consolidate');
const notify = require('gulp-notify');
const iconFont = require('gulp-iconfont');
const yargs = require('yargs');
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');
const webpack = require('webpack');
const webpackStream = require('webpack-stream');

// Project
const cssFolder = 'css';
const scssFolder = 'scss';
const scssFile = 'main.scss';
const scssFilePath = scssFolder + '/' + scssFile;
const jsFolder = 'js';
const jsMainFile = 'app.js';
const jsMainMinFile = 'scripts.min.js';
const jsMainFilePath = jsFolder + '/' + jsMainFile;
const imgFolder = 'img';
const iconFolder = imgFolder + '/icons';
const icon = imgFolder + '/' + 'icon.png';
const fontFolder = 'fonts';
const fontIconsName = 'icons';
const runTimestamp = Math.round(Date.now() / 1000);
const staticServerPath = './';
const host = 'ground.develop';
const servermode = yargs.argv.server === undefined ? false : true;
const enviroments = yargs.argv.development === undefined ? 'production' : 'development';

function server(cb) {
	if (servermode) {
		browserSync.init({
			proxy: host,
			// server: { baseDir: staticServerPath }, // Static HTML/JS/CSS server
			ghostMode: {
				clicks: true,
				forms: true,
				scroll: true
			},
			open: true,
			notify: true,
			scrollProportionally: true,
			injectChanges: true,
			port: 3000
		});
	}
	cb();
}

function serverReload(cb) {
	if (servermode) {
		browserSync.reload();
	}
	cb();
}

function styles(cb) {
	return src(scssFilePath, { sourcemaps: true })
		.pipe(
			plumber({
				errorHandler: function(err) {
					notify.onError({
						title: 'Styles error',
						message: '⛔ ' + err.plugin + ': ' + err.toString(),
						icon: icon
					})(err);
				}
			})
		)
		.pipe(
			sass({
				outputStyle: 'nested',
				precision: 10,
				sourceMap: true,
				errLogToConsole: false
			})
		)
		.pipe(
			autoprefixer({
				cascade: false,
				remove: true
			})
		)
		.pipe(
			cssnano({
				discardComments: { removeAll: true }
			})
		)
		.pipe(dest(cssFolder, { sourcemaps: '.' }))
		.pipe(
			browserSync.stream({ match: '**/*.css' })
		)
		.pipe(
			notify({
				title: 'Styles',
				message: '👍 Task complete!',
				icon: icon,
				onLast: true
			})
		);
}

function svgToFont(cb) {
	return src([iconFolder + '/*.svg'])
		.pipe(
			plumber({
				errorHandler: function(err) {
					notify.onError({
						title: 'Icon error',
						message: '⛔ ' + err.plugin + ': ' + err.toString(),
						icon: icon
					})(err);
				}
			})
		)
		.pipe(
			iconFont({
				fontName: fontIconsName,
				fontHeight: 1001,
				normalize: true,
				formats: ['ttf', 'eot', 'woff'], // default, 'woff2' and 'svg' are available
				timestamp: runTimestamp // recommended to get consistent builds when watching files
			})
		)
		.on('glyphs', function(glyphs, options) {
			src('data/icons/iconfont-template.lodash')
				.pipe(
					consolidate('lodash', {
						glyphs: glyphs,
						fontName: fontIconsName,
						fontPath: '../' + fontFolder + '/',
						className: 'icon',
						cssClass: 'icon'
					})
				)
				.pipe(rename('_icons-generated.scss'))
				.pipe(dest(scssFolder + '/components'));
		})
		.pipe(dest(fontFolder))
		.pipe(
			notify({
				title: 'Icon font',
				message: '👍 Task complete!',
				icon: icon,
				onLast: true
			})
		);
}

function scripts(cb) {
	return src(jsMainFilePath)
		.pipe(
			plumber({
				errorHandler: function(err) {
					notify.onError({
						title: 'Scripts error',
						message: '⛔ ' + err.plugin + ': ' + err.toString(),
						icon: icon
					})(err);
				}
			})
		)
		.pipe(
			webpackStream({
				mode: enviroments,
				output: {
					filename: jsMainMinFile
				},
				performance: {
					hints: false,
				},
				devtool: 'source-map',
				module: {
					rules: [
						{
							test: /\.m?js$/,
							exclude: /(node_modules|bower_components)/,
							use: {
								loader: 'babel-loader',
								options: {
									'presets': [
										[
											'@babel/preset-env',
											{
												'useBuiltIns': 'entry',
												'corejs': '3'
											}
										]
									]
								}
							}
						}
					]
				}
			}, webpack)
		)
		.pipe(dest(jsFolder))
		.pipe(
			notify({
				title: 'Scripts',
				message: '👍 Task complete!',
				icon: icon
			})
		);
}

function watchFiles() {
	watch(scssFolder + '/**/*.scss', styles);
	watch('**/*.{php,html}', serverReload);
	watch(iconFolder + '/**/*.svg', series(svgToFont, serverReload));
	watch([jsFolder + '/**/*.js', '!js/**/*.min.js', '!js/**/*.map'], series(scripts, serverReload));
}

exports.default = series(svgToFont, styles, scripts, server, watchFiles);