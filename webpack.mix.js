const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync('http://localhost'); // Remplacez "http://localhost" par l'URL de développement de votre projet
