module.exports = function(grunt) {
    // Configuration de Grunt
    grunt.initConfig({
        autoprefixer: {
            options: {
                browsers: ['last 5 versions', '> 0.2%']
            },
            dist: {
                expand: true,
                flatten: true,
                cwd: "view/css/",
                src: ["*.css"],
                dest: "view/css/",
            },
        },
        compass: {
            dist: {
              options: {
                sassDir: 'sass',
                cssDir: 'view/css',
                outputStyle: 'compressed',
                force: true,
              }
            }
        },
    });

    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-compass');
  
    // Définition des tâches Grunt
    grunt.registerTask("dev", ['compass', 'autoprefixer']);
  };