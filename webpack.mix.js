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
        'public/js/alert.js',
        'public/js/jquery.goup.js',
        'public/js/bootstrap.min.js'
 	], 'public/js/all.js')
     .minify('public/js/all.js')

mix.js('resources/assets/js/app.js', 'public/js')
   .extract([
        'vue',
        'nprogress',
        'unfetch'
    ])
 	.minify('public/js/app.js')
    .minify('public/js/vendor.js')
	
   	.combine([
     	'public/css/vendor/bootstrap.min.css',
        'public/css/nprogress.css',
        'public/css/alert.css',
     	'public/css/vendor/font-awesome.min.css',
 	], 'public/css/all.css');
