var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', 'public/css', {
    	paths: __dirname + '/vendor/bower_components/bootstrap/less'
    });
    mix.copy('vendor/bower_components/bootstrap/fonts/', 'public/fonts');
    mix.copy([
    	'vendor/bower_components/bootstrap/dist/js/bootstrap.min.js',
    	'vendor/bower_components/jquery/dist/jquery.min.js'
    	], 'public/js/');
});
