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
        concat: {
            dist: {
                src: ["javascript/choixContact.js", "javascript/contact.js", "javascript/cookie.js", "javascript/header_stop_and_start_anim.js", "javascript/nav_hidden.js", "javascript/nav_menuburger.js", "javascript/portfolio_backgroud.js", "javascript/portfolio_focus.js", "javascript/scrollAnim.js", "javascript/siteInfoHover.js"], // la source
                dest: "view/js/compiler.js", // la destination finale
            },
        },
        file_minify: {
            default: {
                files: {
                // Target-specific file lists and/or options go here.
                'view/js/min.': ["view/js/compiler.js"]
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks("grunt-contrib-concat");
    grunt.loadNpmTasks('grunt-file-minify');
  
    // Définition des tâches Grunt
    grunt.registerTask("dev", ['compass', 'autoprefixer', "concat:dist"]);
    grunt.registerTask("test", ["concat:dist", "file_minify"]);
    grunt.registerTask("instal", ['compass', 'autoprefixer', "concat:dist", "file_minify"]);
  };