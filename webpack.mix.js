const mix = require('laravel-mix');

mix.js('src/scripts/app.js', 'public/dist/scripts/main.js')
   .sass('src/styles/main.scss', 'public/dist/styles/main.css')
   .copy('src/img/', 'public/dist/assets/img')
   .copy('src/fonts/', 'public/dist/assets/fonts')
