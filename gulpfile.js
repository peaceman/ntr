var elixir = require('laravel-elixir');
require('laravel-elixir-bower');

elixir(function(mix) {
    mix.bower()
       .version(['css/vendor.css', 'js/vendor.js'])
       .routes()
       .events();
});
