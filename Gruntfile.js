'use strict';
module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jshint: {
            options: {
                jshintrc: '.jshintrc'
            },
            all: [
                'Gruntfile.js',
                'assets/js/*.js',
                '!assets/js/app.min.js'
            ]
        },
        sass: {
            dist: {
                files: {
                    'assets/css/app.scss.css': 'assets/scss/app.scss'
                },
                options: {
                    style: 'compressed',
                    lineNumbers: true,
                    quiet: true
                }
            }
        },
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer-core')()
                ]
            },
            dist: {
                files: {
                    'assets/css/app.min.css': 'assets/css/app.scss.css'
                }
            }
        },
        uglify: {
            dist: {
                files: {
                    'assets/js/app.min.js': [
                        'assets/js/_*.js'
                    ]
                },
                options: {
                    sourceMap: 'assets/js/app.min.js.map',
                    sourceMappingURL: '/wp-content/themes/vg-twig/assets/js/app.min.js.map'
                }
            }
        },
        watch: {
            sass: {
                files: ['assets/scss/*.scss'],
                tasks: ['sass', 'postcss']
            },
            js: {
                files: ['<%= jshint.all %>'],
                tasks: ['jshint', 'uglify']
            }
        },
        clean: {
            dist: [
                '.DS_Store',
                '.sass-cache',
                'assets/css/*.min.css',
                'assets/css/*.min.css.map',
                'assets/css/*.scss.css',
                'assets/css/*.scss.css.map',
                'assets/js/*.min.js',
                'assets/js/*.min.js.map',
            ],
            node: ['node_modules']
        }
    });
    grunt.registerTask('default', ['watch']);
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-postcss');
};
