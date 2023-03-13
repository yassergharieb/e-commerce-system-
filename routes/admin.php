<?php

use Illuminate\Support\Facades\Route;

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




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],

    function () {
        Route::group(
            [
                'namespace' => 'Admin',
                'middleware' => 'auth:admin',
                'prefix' => 'admin'
            ],
            function () {

                    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
                    Route::get('settings/{type}', 'ShipingSettingsController@EditShipingMesthodDetails')->name('shipingMethod.edit');


                }
        );


        Route::group(['namespace' => 'Admin',], function () {

            Route::get('admin/login', 'AdminController@Login')->name('login');
            Route::post('admin/post', 'AdminController@LoginAuth')->name('admin.login.post');

        });

});
