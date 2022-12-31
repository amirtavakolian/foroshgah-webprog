const mix = require('laravel-mix');

/* mix.scripts([
    'resources/js/index/jquery-1.12.4.min.js',
    'resources/js/index/popper.min.js',
    'resources/js/index/bootstrap.min.js',
    'resources/js/index/plugins.js',
    'resources/js/index/ajax-mail.js',
    'resources/js/index/main.js',
    'resources/js/index/modernizr-2.8.3.min.js',
    'resources/js/persian-date.min.js',
    'resources/js/persian-datepicker.min.js'
], 'public/js/all1.js'); */

/* mix.js('resources/js/app.js', 'public/js/index'); */


mix.scripts([
    'resources/css/index/bootstrap.min.css',
    'resources/css/index/icons.min.css',
    'resources/css/index/plugins.css',
    'resources/css/index/style.css'

], 'public/css/all1.css');

