const { copyDirectory } = require('laravel-mix');
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

mix.js('resources/js/app.js', 'public/js')
.sass('resources/css/app.scss', 'public/css')
.sass('resources/css/styles.scss', 'public/css');
// .sass('resources/css/test.scss', 'public/css')
    // .sass('resources/css/test.scss', 'public/css/testtest.css');

// mix.styles([
//     'resources/css/a.css',
//     'resources/css/b.css',
//     'resources/css/c.css',
// ], 'public/css/abc.min.css');
// mix.copyDirectory('resources/imgs', 'public/imgs');

