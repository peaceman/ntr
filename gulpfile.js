var elixir = require('laravel-elixir');
require('laravel-elixir-bower');

elixir(function(mix) {
    mix.bower()
       .less('main.less')
       .version(['css/main.css', 'css/vendor.css', 'js/vendor.js'])
       .routes()
       .events();
});
