var gulp = require("gulp");
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

  mix
    .less('*.less', 'resources/css/built')
    .styles([
      'built/app.css',
    ], 'public/css', 'resources/css')
    .coffee('*.coffee', 'resources/js/built')
    .scripts([
      'libs/jquery-2.1.4.min.js',
      'libs/bootstrap.min.js',
      'libs/vue.min.js',
      'libs/vue-resource.min.js',
      'libs/moment.js',
      'libs/moment-timezone-with-data-2010-2020.min.js',
      'timepunch.js',
      'built/app.js'
    ], 'public/js', 'resources/js');

  //landing page
  mix.styles([
      'built/landing.css'
    ], 'public/css/landing.css', 'resources/css')
    .scripts([
      'built/landing.js'
    ], 'public/js/landing.js', 'resources/js');
});
