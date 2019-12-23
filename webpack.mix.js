const mix = require('laravel-mix');

mix.sass('resources/sass/app.sass', 'public/css')
  .sass('resources/sass/index.sass', 'public/css')
  .sass('resources/sass/lists.sass', 'public/css');