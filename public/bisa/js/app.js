require('./bootstrap');
mix.sass('resources/sass/app.scss', 'public/css');
elixir(function(mix) {
    mix.sass('app.scss')
       .webpack('app.js');
});
