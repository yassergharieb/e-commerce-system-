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
                    Route::get('logout', 'AdminController@logout')->name('admin.logout');



        Route::group(['prefix' => 'profile'] ,  function() {
              Route::get('edit' , 'AdminProfileController@editProfile')->name('admin.pofile.edit');
              Route::post('update/{id}' , 'AdminProfileController@UpdateProfile')->name('admin.pofile.update');

        });

        Route::group(['prefix' => 'categories'], function () {
            Route::get('index', 'CategoriesController@index')->name('categories.index');
            Route::get('create', 'CategoriesController@create')->name('categories.create');
            Route::post('store', 'CategoriesController@store')->name('categories.store');
            Route::get('edit/{id}', 'CategoriesController@edit')->name('categories.edit');
            Route::post('update/{id}', 'CategoriesController@update')->name('categories.update');
            Route::delete('delete/{id}', 'CategoriesController@destroy')->name('categories.delete');

        });



        Route::group(['prefix' => 'subcategories'], function () {
            Route::get('index', 'SubCategoriesController@index')->name('SubCategories.index');
            Route::get('create', 'SubCategoriesController@create')->name('SubCategories.create');
            Route::post('store', 'SubCategoriesController@store')->name('SubCategories.store');
            Route::get('edit/{id}', 'SubCategoriesController@edit')->name('SubCategories.edit');
            Route::post('update/{id}', 'SubCategoriesController@update')->name('SubCategories.update');
            Route::post('delete/{id}', 'SubCategoriesController@destroy')->name('SubCategories.delete');

        });

    });

});
Route::get('admin/login', 'Admin\AdminController@Login')->name('admin.login');
Route::post('post', 'Admin\AdminController@LoginAuth')->name('admin.login.post');
