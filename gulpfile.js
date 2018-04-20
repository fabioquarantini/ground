'use strict';

// Dependency variables
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	browserSync = require('browser-sync').create(),
	cleanCSS = require('gulp-clean-css'),
	eslint = require('gulp-eslint'),
	uglify = require('gulp-uglify'),
	concat = require('gulp-concat'),
	notify = require('gulp-notify'),
	iconFont = require('gulp-iconfont'),
	iconFontCss = require('gulp-iconfont-css'),
	yargs = require('yargs'),
	pump = require('pump'),
	sourcemaps = require('gulp-sourcemaps'),
	reload = browserSync.reload;

// Project variables
var cssFolder = 'css',
	scssFolder = 'scss',
	scssFile = 'main.scss',
	scssFilePath = scssFolder + '/' + scssFile,
	jsFolder = 'js',
	jsSourcesFolder = jsFolder + '/sources',
	jsMainFile = 'main.js',
	jsMainMinFile = 'scripts.min.js',
	jsMainFilePath = jsSourcesFolder + '/' + jsMainFile,
	imgFolder = 'img',
	iconFolder = imgFolder + '/icons',
	icon = imgFolder + '/' + 'icon.png',
	fontFolder = 'fonts',
	fontIconsName = 'icons',
	runTimestamp = Math.round(Date.now() / 1000),
	staticServerPath = './',
	host = 'localhost', // Or use V-host like site.dev
	prettify = yargs.argv.prettify === undefined ? false : true,
	server = yargs.argv.server === undefined ? false : true;

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
		.pipe(sourcemaps.init())
		.pipe(
			sass({
				outputStyle: 'nested',
				precision: 10,
				sourceMap: true,
				errLogToConsole: false
			})
		)
		.on(
			'error',
			notify.onError({
				wait: true,
				title: 'Sass error',
				message: '<%= error.message %>'
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
			cleanCSS({
				level: { 1: { specialComments: 0 } }
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
				message: 'Task complete',
				icon: icon
			})
		);

});

// Scripts
gulp.task('scripts', function() {

	if (prettify) {

		pump([
			gulp.src([jsSourcesFolder + '/!(' + jsMainFile.slice(0, -3) + ')*.js', jsMainFilePath]),
			sourcemaps.init(),
			concat(jsMainMinFile),
			sourcemaps.write('.'),
			gulp.dest(jsFolder),
			notify({
				title: 'Scripts',
				message: 'Task complete',
				icon: icon
			})
		]);

	} else {

		pump([
			gulp.src([jsSourcesFolder + '/!(' + jsMainFile.slice(0, -3) + ')*.js', jsMainFilePath]),
			sourcemaps.init(),
			uglify(),
			concat(jsMainMinFile),
			sourcemaps.write('.'),
			gulp.dest(jsFolder),
			notify({
				title: 'Scripts',
				message: 'Task complete',
				icon: icon
			})
		]);

	}

});

// Lint
gulp.task('lint', function() {

	return gulp
		.src(jsMainFilePath)
		.pipe(eslint())
		.pipe(eslint.format())
		.pipe(eslint.failAfterError())
		.on(
			'error',
			notify.onError({
				title: 'Hint',
				message: '<%= error.message %>'
			})
		);

});

gulp.task('iconFont', function() {

	gulp
		.src([iconFolder + '/*.svg'])
		.pipe(
			iconFontCss({
				fontName: fontIconsName,
				cssClass: 'icon',
				path: 'node_modules/gulp-iconfont-css/templates/_icons.scss',
				targetPath: '../' + scssFolder + '/components/_icons.scss',
				fontPath: '../' + fontFolder + '/'
			})
		)
		.pipe(
			iconFont({
				fontName: fontIconsName,
				prependUnicode: true,
				normalize: true,
				fontHeight: 1001,
				timestamp: runTimestamp
			})
		)
		.pipe(gulp.dest('fonts/'))
		.pipe(
			notify({
				title: 'Icon font',
				message: 'Task complete',
				icon: icon
			})
		);

});

// Watch
gulp.task('watch', function() {

	gulp.watch(scssFolder + '/**/*.{scss,sass}', ['styles']);
	gulp.watch([jsSourcesFolder + '/**/*.js'], ['scripts']).on('change', reload);
	gulp.watch([jsMainFilePath], ['lint']);
	gulp.watch(iconFolder + '/**/*.svg', ['iconFont']);
	gulp.watch('**/*.{php,html}').on('change', reload);

});

// Default
gulp.task('default', ['iconFont', 'browser-sync'], function() {

	gulp.start('styles', 'lint', 'scripts', 'watch');

});
