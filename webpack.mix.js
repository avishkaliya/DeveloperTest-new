const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
.js('resources/js/app.js', 'public/js')
.css('resources/css/ckeditor.css', 'public/css')
.copy('resources/js/windmill.js','public/js')
.copyDirectory('resources/images','public/images')
.copyDirectory('node_modules/lodash','public/packages/lodash')
.postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]);
