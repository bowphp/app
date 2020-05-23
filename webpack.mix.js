let mix = require('laravel-mix');

mix.react('frontend/js/app.js', 'public/js')
   .sass('frontend/sass/app.scss', 'public/css');
