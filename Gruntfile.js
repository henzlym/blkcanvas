const Fiber = require( 'fibers' );
const sass = require( 'node-sass' );
/**
 * Youtube Tutorial: GRUNT TUTORIAL - Grunt makes your web development better!
 * @see https://www.youtube.com/watch?v=TMKj0BxzVgw
 */
module.exports = function ( grunt ) {
	require( 'load-grunt-tasks' )( grunt );

	grunt.initConfig( {
		pkg: grunt.file.readJSON( 'package.json' ),

		/**
		 * Configuration / task definitions
		 */

		autoprefixer: {
			options: {
				browsers: [ 'last 3 versions', 'ie >= 8' ],
			},
			dist: {
				files: {
					'dist/style.min.css': 'style.min.css',
				},
			},
		},
		concat: {
			css: {
				src: [ 'src/scss/**/*' ],
				dest: 'dist/style.css',
			},
		},
		sass: {
			options: {
				implementation: sass,
				fiber: Fiber,
				sourceMap: true,
			},
			dist: {
				files: [
					{
						'src/css/style.css': 'src/scss/style.scss',
					},
					{
						expand: true,
						cwd: 'src/scss',
						src: [ '**/*.scss' ],
						dest: 'src/css',
						ext: '.css',
					},
					{
						expand: true,
						cwd: 'src/scss/critical',
						src: [ '*.scss' ],
						dest: 'src/css/critical',
						ext: '.css',
					},
				],
			},
		},
		uglify: {
			production: {
				options: {
					ie8: true,
					beautify: false,
					preserveComments: false,
					mangle: false,
				},
				files: {
					'dist/scripts.min.js': [ 'src/js/scripts.js' ],
				},
			},
		},
		cssmin: {
			target: {
				options: {
					level: {
						1: {
							all: true, // set all values to `true`
							roundingPrecision: false, // rounds pixel values to `N` decimal places; `false` disables rounding; defaults to `false`
						},
						2: {
							all: false, // sets all values to `false`
							removeEmpty: true, // controls removing empty rules and nested blocks; defaults to `true`
							removeDuplicateRules: true, // controls duplicate rules removing; defaults to true
						},
					},
				},
				files: {
					'dist/style.min.css': [ 'src/css/style.css' ],
				},
			},
			critical: {
				options: {
					level: {
						1: {
							all: true, // set all values to `true`
							roundingPrecision: false, // rounds pixel values to `N` decimal places; `false` disables rounding; defaults to `false`
						},
						2: {
							all: false, // sets all values to `false`
							removeEmpty: true, // controls removing empty rules and nested blocks; defaults to `true`
							removeDuplicateRules: true, // controls duplicate rules removing; defaults to true
						},
					},
				},
				files: [
					{
						expand: true,
						cwd: 'src/css/critical',
						src: [ '*.css', '!*.min.css' ],
						dest: 'dist/critical',
						ext: '.min.css',
					},
				],
			},
		},

		watch: {
			options: {
				livereload: true,
			},
			scripts: {
				files: [ 'src/js/**/*' ],
				tasks: [ 'uglify' ],
			},
			styles: {
				files: [ 'src/scss/**/*' ],
				tasks: [ 'sass', 'cssmin' ],
			},
		},
	} );

	/**
	 * CLI commands - run with "grunt ${command}" from root
	 */

	grunt.registerTask( 'css', [ 'sass', 'cssmin' ] );
	grunt.registerTask( 'js', [ 'uglify' ] );
	grunt.registerTask( 'build', [ 'sass', 'cssmin', 'uglify' ] );
	grunt.registerTask( 'default', [ 'sass', 'cssmin', 'uglify' ] );
};
