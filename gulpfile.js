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
  mix.less('app.less', 'resources/css');
  mix.styles([
    'app.css'
  ], 'public/css', 'resources/css');
  mix.coffee('app.coffee', 'resources/js');
  mix.scripts([
    'libs/jquery-2.1.4.min.js',
    'libs/bootstrap.min.js',
    'app.js'
  ], 'public/js', 'resources/js');

  ////landing page
  //mix.styles('landing.css', 'public/css/landing.css');
  //mix.coffee('landing.coffee', 'resources/js');
  //mix.scripts([
  //  'libs/jquery.stellar.min.js',
  //  'landing.js'
  //], 'public/js/landing.js');
});
