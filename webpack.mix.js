const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/external_static.css', 'public/css', []).vue();  
