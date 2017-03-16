module.exports = function(grunt) {

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');

    grunt.initConfig({
        uglify: {
            my_target: {
                files: {
                    'public/assets/js/script.js': ['development/javascript/*.js']
                } //files
            } //my_target
        }, //uglify

        compass: {
            dev: {
                options: {
                    config: 'config.rb'
                } //options
            } //dev
        }, //compass

        watch : {
            scripts: {
                files: ['development/javascript/*.js'],
                tasks: ['uglify']
            }, //scripts

            sass: {
                files: ['development/sass/*.scss'],
                tasks: ['compass']
            } //sass
        } //watch
    }) //grunt.initConfig

    grunt.registerTask('default', 'watch');


} //module.exports = function(grunt)