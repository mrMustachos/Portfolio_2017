module.exports = function(grunt) {

	// Load grunt plugins.
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
 
	grunt.initConfig({
		sass: {
			dist: {
				options: {
					style: 'expanded'
				},
				files: [{
					expand: true,
					cwd: 'src/sass/',
					src: ['**/**/*.scss'],
					dest: 'src/css/',
					ext: '.css'
				}]
			}
		},
		postcss: {
			options: {
				processors: [
					require('autoprefixer')({
						browsers: ['> 1%', 'last 10 versions', 'ie 8', 'ie 9', 'ie 10']
					})
				]
			},
			dist: {
				src: 'src/css/style.css',
				dest: 'dist/css/style.css',
			}
		},
		cssmin: {
			minify: {
				src: 'dist/css/style.css',
				dest: 'dist/css/style.min.css'
			}
		},
		uglify: {
			my_target: {
				files: {
					'dist/js/siteScript.min.js': [
						'src/js/site/lib/*.js',
						'src/js/site/*.js'
					],
					'dist/js/formScript.min.js': [
						'src/js/form/lib/*.js',
						'src/js/form/*.js'
					]
				}
			}
		},
		watch: {
			options: { livereload: true },
			css: {
				files: ['src/sass/*.scss', 'src/sass/**/*.scss', 'src/sass/**/**/*.scss'],
				tasks: ['sass', 'postcss', 'cssmin']
			},
			script: {
				files: ['src/js/site/*.js', 'src/js/site/lib/*.js', 'src/js/form/*.js', 'src/js/form/lib/*.js'],
				tasks: ['uglify']
			},
			html: {
				files: ['*.html', 'design/*.html', 'web/*.html']
			}
		}
	});
 
	grunt.registerTask('default', ['watch']); 
};