'use strict';

// Dependency variables
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	browserSync = require('browser-sync').create(),
	cssnano = require('gulp-cssnano'),
	babel = require('gulp-babel'),
	consolidate = require('gulp-consolidate'),
	notify = require('gulp-notify'),
	iconFont = require('gulp-iconfont'),
	yargs = require('yargs'),
	rename = require('gulp-rename'),
	sourcemaps = require('gulp-sourcemaps'),
	reload = browserSync.reload,
	plumber = require('gulp-plumber'),
	compiler = require('webpack'),
	webpack = require('webpack-stream');

// Project variables
var cssFolder = 'css',
	scssFolder = 'scss',
	scssFile = 'main.scss',
	scssFilePath = scssFolder + '/' + scssFile,
	jsFolder = 'js',
	jsMainFile = 'app.js',
	jsMainMinFile = 'scripts.min.js',
	jsMainFilePath = jsFolder + '/' + jsMainFile,
	imgFolder = 'img',
	iconFolder = imgFolder + '/icons',
	icon = imgFolder + '/' + 'icon.png',
	fontFolder = 'fonts',
	fontIconsName = 'icons',
	runTimestamp = Math.round(Date.now() / 1000),
	staticServerPath = './',
	host = 'ground.develop',
	server = yargs.argv.server === undefined ? false : true,
	enviroments = yargs.argv.development === undefined ? 'production' : 'development';

// Browser Sync
gulp.task('browser-sync', function() {
	if (server) {
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
});

// Style
gulp.task('styles', function() {
	gulp
		.src(scssFilePath)
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
		.pipe(sourcemaps.init())
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
				browsers: ['last 2 versions', 'ie >= 9', '> 1%'],
				cascade: false,
				remove: true
			})
		)
		.pipe(
			cssnano({
				discardComments: { removeAll: true }
			})
		)
		.pipe(
			sourcemaps.write('.', {
				includeContent: false,
				sourceRoot: '../scss'
			})
		)
		.pipe(gulp.dest(cssFolder))
		.pipe(browserSync.stream({ match: '**/*.css' }))
		.pipe(
			notify({
				title: 'Styles',
				message: '👍 Task complete!',
				icon: icon
			})
		);
});

// Scripts
gulp.task('scripts', function() {
	return gulp
		.src(jsMainFilePath)
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
			babel({
				presets: ['@babel/env']
			})
		)
		.pipe(
			webpack(
				{
					mode: enviroments,
					devtool: 'source-map',
					output: {
						path: __dirname + 'dist',
						filename: jsMainMinFile
					},
					performance: {
						hints: false
					}
				},
				compiler
			)
		)
		.pipe(gulp.dest(jsFolder))
		.pipe(
			notify({
				title: 'Scripts',
				message: '👍 Task complete!',
				icon: icon
			})
		);
});

gulp.task('iconFont', function() {
	return gulp
		.src([iconFolder + '/*.svg'])
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
			gulp
				.src('data/icons/iconfont-template.lodash')
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
				.pipe(gulp.dest(scssFolder + '/components'));
		})
		.pipe(gulp.dest(fontFolder))
		.pipe(
			notify({
				title: 'Icon font',
				message: '👍 Task complete!',
				icon: icon
			})
		);
});

// Watch
gulp.task('watch', function() {
	gulp.watch(scssFolder + '/**/*.scss', ['styles']);
	gulp.watch([jsFolder + '/**/*.js', '!js/**/*.min.js', '!js/**/*.map'], ['scripts']).on('change', reload);
	gulp.watch(iconFolder + '/**/*.svg', ['iconFont']);
	gulp.watch('**/*.{php,html}').on('change', reload);
});

// Default
gulp.task('default', ['iconFont', 'browser-sync'], function() {
	gulp.start('styles', 'scripts', 'watch');
});
