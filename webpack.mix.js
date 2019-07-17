const mix = require('laravel-mix');

mix.js('src/scripts/app.js', 'public/dist/scripts/main.js')
   .sass('src/styles/main.scss', 'public/dist/styles/main.css')
   .copyDirectory('src/assets/fonts', 'public/dist/assets/fonts')
   .copyDirectory('src/assets/img', 'public/dist/assets/img')
   .options({
      processCssUrls: false
   });
