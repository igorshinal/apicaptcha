var elixir = require('laravel-elixir');
require('es6-promise').polyfill();

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
    mix.sass(['common.scss'], 'public/assets/css/commom.css')
        .sass( ['ccc.scss'], 'public/assets/css/ccc.scss');
});

elixir(function(mix) {
    mix.scripts(['common.js'], 'public/js/common.js');
});


