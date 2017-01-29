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
	'public/js/vendor/jquery.js',
	'public/js/vendor/bootstrap.min.js'
	], 'public/js/all.js')
	.minify('public/js/all.js')
	
   	.combine([
    	'public/css/vendor/bootstrap.min.css',
    	'public/css/vendor/font-awesome.min.css',
	], 'public/css/all.css');
