const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');

mix.js('src/scripts/app.js', 'public/dist/scripts/main.js')
   .sass('src/styles/main.scss', 'public/dist/styles/main.css')
   .webpackConfig({
   plugins: [
      new CopyWebpackPlugin([{
         from: 'src/assets/img',
         to: 'public/dist/assets/img',
      }]),
      new ImageminPlugin({
         test: /\.(jpe?g|png|gif|svg)$/i,
         plugins: [
            imageminMozjpeg({
               quality: 80,
            })
         ]
      })
   ]
});