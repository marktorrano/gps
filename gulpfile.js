var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('app.scss');

    mix.styles([
        'app.css',
        'vendor/bootstrap.css',
        'vendor/framework7.ios.css',
        'vendor/framework7.ios.colors.css',
        'vendor/kitchen-sink.css'
    ], null, 'public/css');

    mix.scripts([
        'vendor/jquery.js',
        'vendor/bootstrap.js',
        'vendor/jQuery.scrollSpeed.js',
        'vendor/framework7.js',
        'vendor/kitchen-sink.js',
        'vendor/dropzone.js'
    ], null, 'public/js');

    mix.version('css/all.css');

    //mix.phpUnit();
});
