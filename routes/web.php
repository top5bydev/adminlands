<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

// Login Routes...
Route::get( 'login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm' ] );
Route::post( 'login', [ 'as' => 'login.post', 'uses' => 'Auth\LoginController@login' ] );
Route::post( 'logout', [ 'as' => 'logout', 'uses' => 'Auth\LoginController@logout' ] );

// Registration Routes...
//    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
//    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
//Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
//Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
//Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
//Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);
//Route::get( '/change', 'HomeController@changepw' );

Route::group( [ 'middleware' => 'auth' ], function () {

    Route::group( [ 'prefix' => 'a' ], function () {

        Route::get( '', 'AdminController@index' )->name( 'admin.index' );
        Route::get( '/profile', 'UserController@profile' )->name( 'admin.profile' );
        Route::post( '/profile', 'UserController@postCredentials' )->name( 'admin.profile.store' );

        Route::group( [ 'prefix' => 'sites' ], function () {

            // Сайты
            Route::get( '', 'SitesController@index' )->name( 'sites.index' );
            Route::get( 'create', 'SitesController@create' )->name( 'sites.create' );
            Route::post( 'create', 'SitesController@store' )->name( 'sites.store' );
            Route::get( 'edit/{id}', 'SitesController@edit' )->name( 'sites.edit' );
            Route::get( 'delete/{id}', 'SitesController@delete' )->name( 'sites.delete' );

            // Страницы
            Route::group( [ 'prefix' => '{id}' ], function () {
                Route::group( [ 'prefix' => 'pages' ], function () {
                    Route::get( '', 'PagesController@index' )->name( 'pages.index' );

                    Route::get( 'create', 'PagesController@create' )->name( 'pages.create' );
                    Route::post( 'create', 'PagesController@store' )->name( 'pages.store' );
                    Route::get( 'edit/{pid}', 'PagesController@edit' )->name( 'pages.edit' );
                    Route::get( 'delete/{pid}', 'PagesController@delete' )->name( 'pages.delete' );
                } );
            } );

        } );

    } );

} );

/**
 * Кроссдоменные страницы
 */

Route::get( '/thank', 'DomainsController@thank' )->name( 'domains.thank' );
Route::get( '/newyear', 'DomainsController@newyear' )->name( 'domains.newyear' );


/**
 * Домены
 */

/**
 * st.уютный-шкаф.бел
 */
Route::group( [ 'domain' => 'st.xn----8sbzfm3ago7a1a4a.xn--90ais' ], function () {
    Route::get( 'get_cupboards', function () {
        ?>

        <?php
        /**
        * Категории
        */
        $picsPath = '/ujutnii-shkaf/assets/gallary/';

        $categories = [];
        $categories[] = [
        'title' => 'Тип шкафа',
        'items' => [
        'gostinaya' => 'гостиная',
        'spalnya' => 'спальня',
        'prihojaya' => 'прихожая',
        'garderobnaya' => 'гардеробная',
        'detskaja' => 'детская',
        ]
        ];
        $categories[] = [
        'title' => 'Цвет',
        'items' => [
        'svetlii' => 'светлый',
        'temnii' => 'темный',
        ]
        ];
        $categories[] = [
        'title' => 'Вид фасада',
        'items' => [
        'lakobel' => 'лакобель',
        'lakomat' => 'лакомат',
        'dsp' => 'дсп',
        'zerkalnie' => 'зеркальные',
        'peskostrui' => 'пескоструй',
        'fotopechat' => 'фотопечать',
        'kombinir' => 'комбинир.',
        'gravirovka' => 'гравировка',
        'koja' => 'кожа',
        ]
        ];

        /**
        * Товары
        */

        $cupboards = [];

        $cupboards[] = [

        'art' => '3-002', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gs_s_01.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gs_b_01.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,svetlii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];

        $cupboards[] = [
        'art' => '3-002', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gs_s_02.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gs_b_02.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,svetlii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-003', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gs_s_03.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gs_b_03.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,svetlii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-004', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gs_s_04.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gs_b_04.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,svetlii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-005', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gs_s_05.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gs_b_05.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,svetlii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];

        $cupboards[] = [
        'art' => '3-006', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gt_s_01.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gt_b_01.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,svetlii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-007', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gt_s_02.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gt_b_02.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,temnii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [

        'art' => '3-008', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gt_s_03.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gt_b_03.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,temnii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-009', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gt_s_04.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gt_b_04.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,temnii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-010', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gt_s_05.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gt_b_05.jpg',//только название картинки
        ]
        ],
        'filter' => 'garderobnaya,temnii', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-011', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_g_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_g_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-012', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_g_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_g_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-013', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_g_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_g_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-014', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_g_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_g_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [

        'art' => '3-015', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_dsp_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_dsp_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-016', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_dsp_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_dsp_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-017', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_dsp_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_dsp_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-018', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_dsp_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_dsp_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-019', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_dsp_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_dsp_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-020', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_z_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_z_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-021', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_z_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_z_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-022', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_z_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_z_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-023', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_z_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_z_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-024', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_z_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_z_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];

        $cupboards[] = [
        'art' => '3-025', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_koz_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_koz_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-026', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_koz_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_koz_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-027', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_koz_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_koz_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-028', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_koz_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_koz_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-029', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_koz_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_koz_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-030', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_komb_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_komb_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-031', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_komb_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_komb_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-033', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_komb_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_komb_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-034', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_komb_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_komb_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-035', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_komb_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_komb_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-036', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lak_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lak_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-037', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lak_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lak_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-037', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lak_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lak_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-038', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lak_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lak_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-039', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lak_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lak_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-040', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lm_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lm_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-041', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lm_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lm_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-042', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lm_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lm_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-043', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lm_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lm_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-044', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_lm_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_lm_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-045', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_psk_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_psk_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-046', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_psk_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_psk_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-047', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_psk_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_psk_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-048', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_psk_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_psk_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-049', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_psk_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_psk_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-050', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_photo_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_photo_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-051', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_photo_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_photo_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-052', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_photo_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_photo_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-053', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_photo_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_photo_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-054', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'gost_photo_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'gost_photo_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gostinaya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-055', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-056', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-057', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-058', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-059', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-060', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_6_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_6_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-061', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_7_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_7_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-062', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_8_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_8_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-063', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_9_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_9_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-064', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_10_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_10_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-065', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_11_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_11_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-066', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_12_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_12_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-067', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_13_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_13_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-068', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_14_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_14_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-069', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'detsk_15_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'detsk_15_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'detskaja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-070', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_gr_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_gr_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gravirovka,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-071', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_gr_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_gr_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gravirovka,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-072', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_gr_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_gr_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gravirovka,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-073', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_gr_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_gr_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gravirovka,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-074', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_gr_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_gr_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'gravirovka,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-075', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_dsp_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_dsp_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'dsp,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-076', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_dsp_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_dsp_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'dsp,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-077', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_dsp_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_dsp_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'dsp,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-078', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_dsp_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_dsp_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'dsp,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-079', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_dsp_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_dsp_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'dsp,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-080', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_zerk_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_zerk_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'zerkalnie,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-081', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_zerk_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_zerk_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'zerkalnie,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-082', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_zerk_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_zerk_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'zerkalnie,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-083', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_zerk_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_zerk_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'zerkalnie,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-084', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_zerk_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_zerk_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'zerkalnie,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-085', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_kozh_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_kozh_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'koja,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-086', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_kozh_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_kozh_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'koja,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-087', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_kozh_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_kozh_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'koja,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-088', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_kozh_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_kozh_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'koja,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-089', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_kozh_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_kozh_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'koja,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-090', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_komb_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_komb_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'kombinir,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-091', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_komb_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_komb_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'kombinir,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-092', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_komb_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_komb_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'kombinir,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-093', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_komb_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_komb_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'kombinir,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-094', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_komb_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_komb_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'kombinir,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-095', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lak_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lak_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakobel,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-096', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lak_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lak_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakobel,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-097', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lak_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lak_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakobel,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-098', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселв
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lak_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lak_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakobel,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-099', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lak_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lak_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakobel,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-100', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lm_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lm_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakomat,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-101', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lm_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lm_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakomat,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-102', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселовв
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lm_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lm_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakomat,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-103', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lm_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lm_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakomat,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-104', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_lm_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_lm_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'lakomat,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-105', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_psk_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_psk_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-106', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_psk_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_psk_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-107', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_psk_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_psk_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-108', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_psk_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_psk_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-109', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_psk_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_psk_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-110', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_photo_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_photo_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-111', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_photo_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_photo_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-112', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'pr_photo_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'pr_photo_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'peskostrui,prihojaya', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-113', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_gr_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_gr_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-114', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_gr_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_gr_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-115', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_gr_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_gr_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-116', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_gr_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_gr_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-117', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_gr_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_gr_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-118', // Артикул
        'price' => '700', // Цена
        'priceForNew' => '670', // Цена для новоселовов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_gr_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_gr_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,gravirovka', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-119', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_dsp_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_dsp_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-120', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_dsp_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_dsp_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-121', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_dsp_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_dsp_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-122', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_dsp_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_dsp_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-123', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_dsp_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_dsp_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-124', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_dsp_6_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_dsp_6_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-123', // Артикул
        'price' => '314', // Цена
        'priceForNew' => '297', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_dsp_7_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_dsp_7_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,dsp', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-124', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_zerk_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_zerk_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-125', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_zerk_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_zerk_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-126', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_zerk_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_zerk_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-127', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_zerk_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_zerk_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-128', // Артикул
        'price' => '320', // Цена
        'priceForNew' => '300', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_zerk_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_zerk_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,zerkalnie', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-129', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_koz_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_koz_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-130', // Артикул
        'price' => '100', // Цена
        'priceForNew' => '95', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_koz_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_koz_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-131', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_koz_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_koz_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-132', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_koz_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_koz_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-133', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселовв
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_koz_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_koz_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,koja', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-134', // Артикул
        'price' => '680', // Цена
        'priceForNew' => '655', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_kom_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_kom_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-135', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_kom_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_kom_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-136', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_kom_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_kom_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-137', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_kom_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_kom_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-138', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_kom_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_kom_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,kombinir', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-139', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lak_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lak_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-140', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lak_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lak_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-141', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lak_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lak_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-142', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lak_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lak_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-143', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новосел
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lak_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lak_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakobel', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-144', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lm_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lm_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'sticky' => true,
        'art' => '3-145', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lm_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lm_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-145', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lm_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lm_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-146', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lm_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lm_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-147', // Артикул
        'price' => '360', // Цена
        'priceForNew' => '340', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_lm_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_lm_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,lakomat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-148', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_psk_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_psk_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-149', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_psk_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_psk_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-150', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_psk_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_psk_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-151', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_psk_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_psk_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-152', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '367', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_psk_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_psk_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,peskostrui', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-153', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_photo_1_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_photo_1_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-154', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_photo_2_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_photo_2_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-155', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_photo_3_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_photo_3_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-156', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_photo_4_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_photo_4_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        $cupboards[] = [
        'art' => '3-157', // Артикул
        'price' => '390', // Цена
        'priceForNew' => '370', // Цена для новоселов
        'pics' => [ //Картинки
        'small' => [ //Малая картинка
        'link' => $picsPath . 'sp_photo_5_s.jpg',//только название картинки
        'alt' => '',
        ],//Большая картинка
        'big' => [
        'link' => $picsPath . 'sp_photo_5_b.jpg',//только название картинки
        ]
        ],
        'filter' => 'spalnya,fotopechat', //$categories -> items и выбираешь только на англ языке. Если несколько, то через запятую
        ];
        ?>

        <div class="popular" id="choice">
            <div class="container">
                <div class="row">
                    <div class="headline__30b text-center">
                        Мы создаем уникальное решение для Вашего комфорта
                    </div>
                    <div class="filter hidden-xs">


                        <?php $categoriesArr = array_chunk($categories, 2); ?>
                        <?php foreach ($categoriesArr as $categorys) : ?>
                            <div class="filter__row">
                                <?php foreach ($categorys as $category) : ?>
                                    <div class="filter__param pull-left">
                                        <div class="filter__paramname pull-left">
                                            <?= $category['title'] ?>
                                        </div>
                                        <?php foreach ($category['items'] as $key => $catChild): ?>
                                            <div class="filter__item pull-left" data-filter="jsFilt<?= $key ?>">
                                                <?= $catChild ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="catalog">

                    <?php foreach ($cupboards as $cupboard):
                        $filters = ($cupboard['filter']) ? explode(",", $cupboard['filter']) : '';
                        $jsFilter = '';
                        $title = '';
                        $title2 = '';
                        foreach ($filters as $filter) {
                            $jsFilter .= 'jsFilt' . $filter . ' ';

                            foreach ($categories[0]['items'] as $item => $value) {
                                if ($filter == $item) {
                                    $title = $value;
                                    break;
                                }
                            }

                            foreach ($categories[2]['items'] as $item2 => $value2) {
                                if ($filter == $item2) {
                                    $title2 = ', ' . $value2;
                                    break;
                                }
                            }

                        }
                        ?>


                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 jsCatalogItem jsPopular <?= $jsFilter ?>"
                             style="display:<?= (isset($cupboard['sticky'])) ? 'block' : 'none'; ?>">

                            <div class="catalog__item">
                                <div class="catalog__photo">
                                    <a href="<?= $cupboard['pics']['big']['link'] ?>" rel="group" class="imgLiquid">
                                        <img
                                            src="<?= $cupboard['pics']['small']['link'] ?>"
                                            alt="<?= $cupboard['pics']['small']['alt'] ?>" class="itemImage">
                                    </a>
                                </div>
                                <div class="catalog__title text-center">
                                    <?= $title, $title2 ?>
                                </div>
                                <div class="catalog__price catalog__price_first text-center"><?= $cupboard['art'] ?></div>
                                <div class="catalog__price catalog__price_first text-center">
                                    от <?= $cupboard['price'] ?>
                                    рублей
                                </div>
                                <div class="catalog__price catalog__price_second text-center" style="color: #978F87">
                                    от <?= $cupboard['priceForNew'] ?>
                                    рублей в декабре
                                </div>
                                <div class="catalog__button text-center jsCatalogButton" href="#jsReqForm">
                                    Рассчитать стоимость
                                </div>
                            </div>
                        </div>
                    <? endforeach; ?>
                    <div class="col-xs-12">
                        <input class='input input__submit displayMore' type='button' value='Показать больше'
                               style="display: none"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
<?php
    } );
} );
//Route::group( [ 'domain' => 'st.xn----8sbzfm3ago7a1a4a.xn--90ais' ], function () {
//    Route::get( 'get_cupboards', function () {
//        //require_once ('array_of_cupboards.php');
//        return 'this is the index page';
//    } );
//} );

Route::group( [ 'domain' => Request::getHost() ], function () {
    Route::get( '/', 'DomainsController@index' )->name( 'domains.index' );
    Route::get( '{slug}', 'DomainsController@page' )->name( 'domains.pages' );
} );

