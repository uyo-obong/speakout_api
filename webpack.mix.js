let mix = require('laravel-mix');

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
mix.js([
    'resources/js/app.js',
], 'public/js/app.js');
// mix.sass('resources/assets/sass/app.scss', 'public/css/all.css');
mix.styles([
    // 'public/css/all.css',
    'resources/css/bootstrap.css',
    'resources/css/font-awesome.css',
    'resources/css/style.css'
], 'public/css/app.css');
// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');