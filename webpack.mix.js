const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.combine([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js'
    ], 'public/js/vendor.js')
    .combine([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
        'node_modules/dropzone/dist/min/dropzone.min.js'
    ], 'public/js/vendor-admin.js')
    .js('resources/assets/js/app-admin.js', 'public/js')
    .js('resources/assets/js/app.js', 'public/js')

    // Import css files from node_module
    .copy('node_modules/dropzone/dist/min/dropzone.min.css', 'public/css')

    // Style
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin/admin.scss', 'public/css')

    .browserSync();
