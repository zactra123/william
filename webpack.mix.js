const mix = require('laravel-mix');

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

mix.autoload({
    jQuery: 'jquery',
    $: 'jquery',
    jquery: 'jquery'
    })
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/affiliate.js', 'public/js/')
    .js('resources/js/registration.js', 'public/js/')
    .js('resources/js/registration_steps.js', 'public/js/')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/new_style.scss', 'public/css/new_style.min.css');
