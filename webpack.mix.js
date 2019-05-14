const mix = require('laravel-mix');

mix.js('src/scripts/app.js', 'dist/scripts/main.js')
   .sass('src/styles/main.scss', 'dist/styles/main.css');