var mix = require('laravel-mix');
mix.autoload({
    jquery: ['$', 'window.jQuery']
});

var $PATH_TO_ASSETS_STEKLOPAKET5 = 'public/steklopaket5/assets/'; //steklopaket5.by
var $PATH_TO_ASSETS_STEKLOPAKET5_M = 'public/steklopaket5/m/';  // steklopaket5.by/m
var $PATH_TO_ASSETS_UJUTNIISHKAF = 'public/ujutnii-shkaf/assets/'; // уютный-шкаф.бел
var $PATH_TO_ASSETS_UJUTNAJAKUHNYA = 'public/ujutnaja-kuhnya/assets/';// уютная-кухня.бел
var $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 = 'public/ujutnaja-kuhnya/v2/assets/';// уютная-кухня.бел/v2

// var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

/**
 * Админка
 */

mix.sass('node_modules/font-awesome/scss/font-awesome.scss', 'public/compiled/css/font-awesome.css')
    .combine([
        'node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.css',
        'node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap-theme.css',
        'node_modules/gentelella/vendors/nprogress/nprogress.css',
        'node_modules/gentelella/vendors/iCheck/skins/flat/green.css',
        'node_modules/gentelella/build/css/custom.min.css',
        'public/compiled/css/font-awesome.css',
        'resources/assets/admin/css/custom.css'
    ], 'public/admin/assets/css/all.css');


mix.scripts([
    'node_modules/jquery.2/node_modules/jquery/dist/jquery.js', // jQuery 2
    'node_modules/gentelella/vendors/bootstrap/dist/js/bootstrap.js',
    'node_modules/gentelella/vendors/fastclick/lib/fastclick.js',
    'node_modules/gentelella/vendors/nprogress/nprogress.js',
    'node_modules/gentelella/vendors/iCheck/icheck.js',
    'node_modules/gentelella/build/js/custom.js',
    'resources/assets/admin/js/custom.js'
], 'public/admin/assets/js/all.js');

/**
 * Steklopaket5.by
 */

mix.combine([
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'css/index.css',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'css/tracker_phoneicon.css',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'css/style_new-19052016.css',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/fancybox/jquery.fancybox.css',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'css/custom.css',
], $PATH_TO_ASSETS_STEKLOPAKET5 + 'css/all.css');

mix.scripts([
    'node_modules/jquery/dist/jquery.js', // jQuery 3
    // 'node_modules/jquery.1/node_modules/jquery/dist/jquery.js', // jQuery 1
    // 'node_modules/jquery.2/node_modules/jquery/dist/jquery.js', // jQuery 2
    'node_modules/jquery-migrate/dist/jquery-migrate.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery.once.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/drupal.js',
    'node_modules/jquery-ui-dist/jquery-ui.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/ajax.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery.colorbox-min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/colorbox.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/colorbox_style.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/dacha.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/progress.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/autodialog.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/calculator.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/data.js',
    'node_modules/jquery-validation/dist/jquery.validate.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/jquery.jcarousel.min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/fancybox/jquery.fancybox.pack.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/jquery.slimscroll.min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/countdown.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/jquery.maskinput.min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'components/jquery-form-validator/form-validator/jquery.form-validator.min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'components/jquery-scrollspy-thesmart/scrollspy.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/compile_new-19112015.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/send/js/init-19112015.js',
], $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/all.js');

/**
 * Steklopaket5.by MOBILE
 */

mix.combine([
    $PATH_TO_ASSETS_STEKLOPAKET5_M + 'css/normalize.css',
    $PATH_TO_ASSETS_STEKLOPAKET5_M + 'css/webflow.css',
    $PATH_TO_ASSETS_STEKLOPAKET5_M + 'css/steklopaket5.webflow.css',
], $PATH_TO_ASSETS_STEKLOPAKET5_M + 'css/all.css');


mix.scripts([
    'node_modules/jquery.2/node_modules/jquery/dist/jquery.js', // jQuery 2
    $PATH_TO_ASSETS_STEKLOPAKET5_M + 'js/webflow.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/jquery.maskinput.min.js',
    'node_modules/jquery-validation/dist/jquery.validate.js',
    'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/jquery.jcarousel.min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/fancybox/jquery.fancybox.pack.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/jquery.slimscroll.min.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/jquery/countdown.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'components/jquery-scrollspy-thesmart/scrollspy.js',
    $PATH_TO_ASSETS_STEKLOPAKET5 + 'js/compile_new-19112015.js',
    $PATH_TO_ASSETS_STEKLOPAKET5_M + 'js/custom.js',
], $PATH_TO_ASSETS_STEKLOPAKET5_M + 'js/all.js');


/**
 * Уютный-шкаф.бел
 */

mix.combine([
    $PATH_TO_ASSETS_UJUTNIISHKAF + 'css/styles.css',
    $PATH_TO_ASSETS_UJUTNIISHKAF + 'css/ex.css',
    $PATH_TO_ASSETS_UJUTNIISHKAF + 'css/mobile.css',
], $PATH_TO_ASSETS_UJUTNIISHKAF + 'css/all.css');

mix.scripts([
    'node_modules/jquery/dist/jquery.js', // jQuery 3
    'node_modules/jquery-migrate/dist/jquery-migrate.js',
    $PATH_TO_ASSETS_UJUTNIISHKAF + 'js/main.js',
    $PATH_TO_ASSETS_UJUTNIISHKAF + 'js/jquery.maskedinput.min.js',
    'node_modules/jquery-validation/dist/jquery.validate.js',
    $PATH_TO_ASSETS_UJUTNIISHKAF + 'js/imgLiquid-min.js',
    $PATH_TO_ASSETS_UJUTNIISHKAF + 'js/custom.js',
], $PATH_TO_ASSETS_UJUTNIISHKAF + 'js/all.js');

/**
 * Уютная-кухня.бел
 */

mix.combine([
    $PATH_TO_ASSETS_UJUTNAJAKUHNYA + 'css/all.min.css',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYA + 'css/custom.css',
], $PATH_TO_ASSETS_UJUTNAJAKUHNYA + 'css/all.css');

mix.scripts([
    $PATH_TO_ASSETS_UJUTNAJAKUHNYA + 'js/libs.min.js',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYA + 'js/main.js',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYA + 'js/custom.js',
], $PATH_TO_ASSETS_UJUTNAJAKUHNYA + 'js/all.js');

/**
 * Уютная-кухня.бел/v2
 */
mix.combine([
    $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'css/normalize.css',
    'node_modules/ion-rangeslider/css/ion.rangeSlider.css',
    'node_modules/ion-rangeslider/css/ion.rangeSlider.skinHTML5.css',
    'node_modules/slick-carousel/slick/slick.css',
    'node_modules/slick-carousel/slick/slick-theme.css',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'css/webflow.css',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'css/kuhni-of-by.webflow.css',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'css/custom.css',
], $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'css/all.css');

mix.scripts([
    'node_modules/jquery.2/node_modules/jquery/dist/jquery.js',
    'node_modules/jquery.maskedinput/src/jquery.maskedinput.js',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'js/webflow.js',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'js/webflow-ix-min.js',
    'node_modules/slick-carousel/slick/slick.js',
    'node_modules/ion-rangeslider/js/ion.rangeSlider.min.js',
    'node_modules/jquery-validation/dist/jquery.validate.min.js',
    $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'js/custom.js',
], $PATH_TO_ASSETS_UJUTNAJAKUHNYAV2 + 'js/all.js');

/*
mix.js('resources/assets/js/app.js', 'public/js')
   //Landing page
   .js('resources/assets/js/app-landing.js', 'public/js/app-landing.js')
   .less('node_modules/bootstrap-less/bootstrap/bootstrap.less', 'public/css/bootstrap.css')
   .combine([
       'public/css/bootstrap.css',
       'resources/assets/css/landing.css'
   ], 'public/css/all-landing.css')
   //AdminLTE
   .less('resources/assets/less/adminlte-app.less','public/css/adminlte-app.css')
   .less('node_modules/toastr/toastr.less','public/css/toastr.css')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .combine([
       'public/css/app.css',
       'node_modules/admin-lte/dist/css/skins/_all-skins.css',
       'public/css/bootstrap.css',
       'public/css/adminlte-app.css',
       'node_modules/icheck/skins/square/blue.css',
       'public/css/toastr.css'
   ], 'public/css/all.css')
   //APP RESOURCES
   .copy('resources/assets/img/*.*','public/img')
   //VENDOR RESOURCES
   .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
   .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
   .copy('node_modules/admin-lte/bootstrap/fonts/*.*','public/fonts/bootstrap')
   .copy('node_modules/admin-lte/dist/css/skins/*.*','public/css/skins')
   .copy('node_modules/admin-lte/dist/img','public/img')
   .copy('node_modules/admin-lte/plugins','public/plugins')
   .copy('node_modules/icheck/skins/square/blue.png','public/css')
   .copy('node_modules/icheck/skins/square/blue@2x.png','public/css');
 */