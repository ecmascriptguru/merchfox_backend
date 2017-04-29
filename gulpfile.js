var elixir = require('laravel-elixir');
    
    require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.browserify('fabric.js');
    mix.browserify('app.js');
    mix.browserify('magic.js');
});