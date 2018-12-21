let mix = require('laravel-mix');

mix.react('components/js/app.js', 'public/js')
   .sass('components/sass/app.scss', 'public/css');
