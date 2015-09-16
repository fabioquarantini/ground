'use strict';

// Tools variables
var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	browserSync = require('browser-sync'),
	minifycss = require('gulp-minify-css'),
	jshint = require('gulp-jshint'),
	stylish = require('jshint-stylish'),
	uglify = require('gulp-uglify'),
	imagemin = require('gulp-imagemin'),
	filter = require('gulp-filter'),
	concat = require('gulp-concat'),
	newer = require('gulp-newer'),
	notify = require('gulp-notify'),
	reload = browserSync.reload,
	plumber = require('gulp-plumber'),
	sourcemaps = require('gulp-sourcemaps');


// Project variables
var cssFolder = 'css',
	scssFolder = 'scss',
	scssFile = scssFolder +'/main.scss',
	jsFolder = 'js',
	jsSourceFolder = jsFolder + '/source',
	jsMainFile = jsSourceFolder + '/main.js',
	jsMinFile = 'scripts.min.js',
	imgFolder = 'img',
	imgOriginalsFolder = imgFolder + '/originals',
	host = 'localhost';


// Browser Sync task
gulp.task('browser-sync', function() {

	browserSync({
		proxy: host,
		//port: 3000,
		ghostMode: {
			clicks: true,
			forms: true,
			scroll: true
		},
		open: true,
		notify: true,
		scrollProportionally: true,
		injectChanges: false,
	});

});


// Style task
gulp.task('styles', function() {

	gulp.src( scssFile )
		.pipe(sourcemaps.init())
		.pipe(sass({
			outputStyle: 'nested',
			precision: 10,
			sourceMap: true,
			errLogToConsole: false,
		}))
		.on("error", notify.onError({
			wait: true,
        	title: "Sass error",
        	message: "<%= error.message %>"
      	}))
		.pipe(gulp.dest('./css'))
		.pipe(autoprefixer({
			browsers: ['last 4 version', 'Firefox ESR', 'Opera 12.1', '> 1%', 'ie 8', 'ie 7'],
			cascade: false,
			remove: true
		}))
		.pipe(minifycss({
			keepSpecialComments: '*'
		}))
		.pipe(sourcemaps.write( '.', {
			includeContent: false,
			sourceRoot: '../scss'
		}))
		.pipe(gulp.dest(cssFolder))
		.pipe(filter('**/*.css'))
		.pipe(reload({stream: true}))
		.pipe(notify({
			title: 'Styles',
			message: 'Task complete',
			icon: 'apple-touch-icon.png',
			onLast: true
		}));

});


// Scripts task
gulp.task('scripts', function() {

	var onError = function(err) {
		notify.onError({
			title: "Scripts error",
			message: "<%= error.message %>",
			wait: true
		})(err);
		this.emit('end');
	};

	return gulp.src([ jsSourceFolder + '/!(' + jsMainFile.slice(0, -3).split('/').pop() + ')*.js', jsMainFile ])
		.pipe(plumber({errorHandler: onError}))
		.pipe(sourcemaps.init())
			.pipe(uglify())
			.pipe(concat( jsMinFile ))
		.pipe(sourcemaps.write('.'))
		.pipe(gulp.dest( jsFolder ))
		.pipe(notify({
			title: 'Scripts',
			message: 'Task complete',
			icon: 'apple-touch-icon.png',
			onLast: true
		}));

});


// Hint task
gulp.task('hint', function() {

	return gulp.src( jsMainFile )
		.pipe(jshint('.jshintrc'))
		.pipe(jshint.reporter('fail'))
			.on('error', notify.onError({
				title: 'Hint',
				message: "<%= error.message %>",
				onLast: true
			})
		)
		.pipe(jshint.reporter(stylish));

});


// Images task
gulp.task('images', function() {

	return gulp.src( imgOriginalsFolder + '/*' )
		.pipe(newer( imgFolder ))
		.pipe(imagemin({
			optimizationLevel: 4,
			progressive: true,
			interlaced: true
		}))
		.pipe(gulp.dest( imgFolder ))
		.pipe(reload({stream: true}))
		.pipe(notify({
			title: 'Images',
			message: 'Task complete',
			icon: 'apple-touch-icon.png',
			onLast: true
		}));

});


// Watch task
gulp.task('watch', function() {

	gulp.watch( scssFolder + '/**/*.{scss,sass}', ['styles']);

	gulp.watch([ jsSourceFolder + '/**/*.js'], ['scripts' , reload ]);

	gulp.watch([ jsMainFile ], ['hint']);

	gulp.watch( imgOriginalsFolder + '/*', ['images' , reload ]);

	gulp.watch('**/*.php', reload );

});


// Default task
gulp.task('default', ['browser-sync'], function() {

	gulp.start('styles', 'hint', 'scripts', 'images', 'watch');

});
