/*  ==========================================================================
	Grunt configuration
	==========================================================================  */

'use strict';

var bannerCss = '/* \n' +
				'Theme Name: <%= pkg.name %> \n' +
				'Theme URI: <%= pkg.homepage %> \n' +
				'Author: <%= pkg.author.name %> \n' +
				'Author URI: <%= pkg.author.url %> \n' +
				'Description: <%= pkg.description %> \n' +
				'Version: <%= pkg.version %> \n' +
				'License: <%= pkg.licenses.type %> \n' +
				'License URI: <%= pkg.licenses.url %> \n' +
				'\n' +
				'<%= pkg.comments %> \n' +
				'*/ \n';


module.exports = function(grunt) {

	// Load all grunt task in package.json

	require('jit-grunt')(grunt);


	grunt.initConfig({

		// Reads dependencies from package.json

		pkg: grunt.file.readJSON('package.json'),


		// ground config

		ground: {
			scssFolder: 'scss',
			jsFolder: 'js',
			host: 'localhost',
			banner: bannerCss
		},


		// [ grunt autoprefixer ] Prefixes css3 propreties (https://github.com/nDmitry/grunt-autoprefixer)

		autoprefixer: {
			options: {
				browsers: [
					'last 3 version',
					'Firefox ESR',
					'Opera 12.1',
					'> 1%',
					'ie 8',
					'ie 7'
				],
				map: false,
				cascade: false,
				diff: false,
				mapInline: false,
			},
			dev: {
				src: 'style.css'
			},
		},


		// [ browser sync ] Keep multiple browsers & devices in sync when building websites ( https://github.com/shakyShane/grunt-browser-sync )

		browserSync: {
			options: {
				watchTask: true,
				injectChanges: false,
				ghostMode: {
					clicks: true,
					scroll: true,
					links: true,
					forms: true
				},
				proxy: {
					host: '<%= ground.host %>'
				},
			},
			dev: {
				files: {
					src : [
						'style.css',
						'**/*.php',
						'{,*/}*.js',
						'img/{,*/}*.{png,jpg,jpeg,gif,webp,svg}'
					],
				},
			},
		},


		// [ grunt concat ] Concatenate javascript files (https://github.com/gruntjs/grunt-contrib-concat)

		concat: {
			options: {
				separator: ';'
			},
			dev: {
				src: ['<%= ground.jsFolder %>/plugins/*.js'],
				dest: '<%= ground.jsFolder %>/plugins.js'
			}
		},


		// [ grunt cssmin ] Combines and minifies css (https://github.com/gruntjs/grunt-contrib-cssmin)

		cssmin: {
			options: {
				banner: '<%= ground.banner %>',
				keepSpecialComments: '0',
			},
			deploy: {
				files: {
					'style.css': ['style.css']
				}
			}
		},


		// [ grunt jshint ] Validate files with JSHint (https://github.com/gruntjs/grunt-contrib-jshint)

		jshint: {
			options: {
				jshintrc: '.jshintrc',
				errorsOnly: true, // only display errors
				failOnError: false, // defaults to true
				reporter: require('jshint-stylish')
			},
			dev: {
				files: {
					src: ['<%= ground.jsFolder %>/main.js']
				},
			}
		},


		// [grunt notify ] Desktop notifications for Grunt errors and warnings using Growl for OS X or Windows, Mountain Lion Notification Center, Snarl, and Notify-Send (https://github.com/dylang/grunt-notify)

		notify: {
			autoprefixer: {
				options: {
					title: 'Autoprefixer',
					message: 'Autoprefixer done successfully',
				}
			},
			concat: {
				options: {
					title: 'Concat',
					message: 'Concatenation done successfully',
				}
			},
			cssmin: {
				options: {
					title: 'Cssmin',
					message: 'Css minification done successfully',
				}
			},
			jshint: {
				options: {
					title: 'JSHint',
					message: 'Js validation done successfully',
					max_jshint_notifications: 5
				}
			},
			sass: {
				options: {
					title: 'Sass',
					message: 'SASS Compilation done successfully',
				}
			},
			uglify: {
				options: {
					title: 'Uglify',
					message: 'Js minification done successfully',
				}
			}
		},


		// [ grunt sass ] Compiles sass files (https://github.com/gruntjs/grunt-contrib-sass)

		sass: {
			options: {
				banner: '<%= ground.banner %>',
				precision: 8,
				compass: false,
				noCache: false,
				sourcemap: true,			// Requires Sass 3.3.0
			},
			dev: {
				options: {
					debugInfo: false,		// enable if you want to use FireSass
					trace: false,
					check: false,
					quiet: false,
					lineNumbers: false,
					style: 'expanded'		// Can be nested, compact, compressed, expanded.
				},
				files: {
					'style.css': '<%= ground.scssFolder %>/main.scss'
				},
			},
			deploy: {
				options: {
					style: 'compressed'
				},
				files: {
					'style.css': '<%= ground.scssFolder %>/main.scss'
				},
			}
		},


		// [ grunt uglify ] Javascript plugins compressor (https://github.com/gruntjs/grunt-contrib-uglify)

		uglify: {
			options: {
				sourceMap: true,
			},
			deploy: {
				files: {
					'<%= ground.jsFolder %>/plugins.js': ['<%= ground.jsFolder %>/plugins.js'],
				}
			}
		},


		// [ grunt watch ] Watches for file changes and run tasks (https://github.com/gruntjs/grunt-contrib-watch)

		watch: {
			css: {
				files: '<%= ground.scssFolder %>/{,*/}*.{scss,sass}',
				tasks: [
					'sass:dev',
					'notify:sass',
					'autoprefixer',
					'notify:autoprefixer'
				]
			},
			plugins: {
				files: '<%= ground.jsFolder %>/plugins/*.js',
				tasks: [
					'concat',
					'notify:concat'
				]
			},
			jshint: {
				files: '<%= ground.jsFolder %>/main.js',
				tasks: [
					'jshint',
					'notify:jshint',
				]
			}
		},
	});


	// Registered default tasks

	grunt.registerTask('default', [
		'sass:dev',
		'notify:sass',
		'autoprefixer',
		'notify:autoprefixer',
		'concat',
		'notify:concat',
		'jshint',
		'notify:jshint',
		'browserSync',
		'watch'
	]);


	// Registered deploy tasks

	grunt.registerTask('deploy', [
		'sass:deploy',
		'notify:sass',
		'autoprefixer',
		'notify:autoprefixer',
		'cssmin',
		'notify:cssmin',
		'concat',
		'notify:concat',
		'jshint',
		'notify:jshint',
		'uglify',
		'notify:uglify'
	]);

};
