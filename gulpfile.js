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

elixir(function(mix) {
    mix.sass('app.scss')
        .sass('login.scss')
        .sass('forms.scss')
        .coffee('app.coffee')
        .styles([
            './bower_components/font-awesome/css/font-awesome.css',
            './bower_components/animate.css/animate.css',
            './bower_components/nanoscroller/bin/css/nanoscroller.css',
            './bower_components/bootstrap/dist/css/bootstrap.css',
            './bower_components/ekko-lightbox/dist/ekko-lightbox.css',
            './bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.css',
            './bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'
        ], 'public/css/vendor.css')
        .scripts([
            './bower_components/underscore/underscore.js',
            './bower_components/jquery/dist/jquery.js',
            './bower_components/nanoscroller/bin/javascripts/jquery.nanoscroller.js',
            './bower_components/ekko-lightbox/dist/ekko-lightbox.js',
            './bower_components/Chart.js/dist/Chart.js',
            './bower_components/bootstrap/dist/js/bootstrap.js',
            './bower_components/bs-confirmation/bootstrap-confirmation.js',
            './bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.js',
            './bower_components/moment/moment.js',
            './bower_components/moment-timezone/builds/moment-timezone-with-data.js',
            './bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js'
        ], 'public/js/vendor.js')
        .copy('./bower_components/bootstrap/dist/fonts', 'public/fonts')
        .copy('./bower_components/font-awesome/fonts', 'public/fonts')
        .copy('./bower_components/lightbox2/dist/images', 'public/images');
});
