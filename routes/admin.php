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
            Route::get('delete/{id}', 'CategoriesController@destroy')->name('categories.delete');

        });



        Route::group(['prefix' => 'subcategories'], function () {
            Route::get('index', 'SubCategoriesController@index')->name('SubCategories.index');
            Route::get('create', 'SubCategoriesController@create')->name('SubCategories.create');
            Route::post('store', 'SubCategoriesController@store')->name('SubCategories.store');
            Route::get('edit/{id}', 'SubCategoriesController@edit')->name('SubCategories.edit');
            Route::post('update/{id}', 'SubCategoriesController@update')->name('SubCategories.update');
            Route::get('delete/{id}', 'SubCategoriesController@destroy')->name('SubCategories.delete');

        });


        Route::group(['prefix' => 'brands'], function () {
            Route::get('index', 'BrandsController@index')->name('Brands.index');
            Route::get('create', 'BrandsController@create')->name('Brands.create');
            Route::post('store', 'BrandsController@store')->name('Brands.store');
            Route::get('edit/{id}', 'BrandsController@edit')->name('Brands.edit');
            Route::post('update/{id}', 'BrandsController@update')->name('Brands.update');
            Route::get('delete/{id}', 'BrandsController@destroy')->name('Brands.delete');

        });



        Route::group(['prefix' => 'tags'], function() {
            Route::get('/', 'TagsController@index')->name('tags.index');
            Route::get('/create', 'TagsController@create')->name('tags.create');
            Route::post('store', 'TagsController@store')->name('tags.store');
            Route::get('tag/{id}', 'TagsController@show')->name('tags.show');
            Route::get('edit/{id}', 'TagsController@edit')->name('tags.edit');
            Route::post('tag/{id}', 'TagsController@update')->name('tags.update');
            Route::post('delete/{id}', 'TagsController@destroy')->name('tags.destroy');
         });


         Route::group(['prefix' => 'products'], function() {
            Route::get('/', 'ProductsController@index')->name('product.index');
            Route::get('create', 'ProductsController@create')->name('product.create');
            Route::get('create/price/{id}', 'ProductsController@createPrice')->name('product.price.create');
            Route::get('create/stockDetails/{id}', 'ProductsController@createStockDetails')->name('product.stock.create');
            Route::get('upload/product/images/{id}', 'ProductsController@createMultiIMageForProduct')->name('product.images.upload');


            Route::post('store', 'ProductsController@store')->name('product.store');
            Route::post('store/product/images', 'ProductsController@saveImages')->name('product.images.store');

            Route::post('store/price/{id}', 'ProductsController@storePriceDetails')->name('product.price.store');
            Route::post('store/details/{id}', 'ProductsController@storeStockDetails')->name('product.stock.store');

            Route::get('show/{id}', 'ProductsController@show')->name('product.show');
            Route::get('edit/{id}', 'ProductsController@edit')->name('product.edit');
            Route::post('update/{id}', 'ProductsController@update')->name('product.update');
            Route::post('delete/{id}', 'ProductsController@destroy')->name('product.destroy');
         });


         Route::group(['prefix' => 'attributes'], function() {
            Route::get('/', 'AttributesController@index')->name('Attribbutes.index');
            Route::get('/create', 'AttributesController@create')->name('Attribbutes.create');
            Route::post('store', 'AttributesController@store')->name('Attribbutes.store');
            Route::get('Attribute/{id}', 'AttributesController@show')->name('Attribbutes.show');
            Route::get('edit/{id}', 'AttributesController@edit')->name('Attribbutes.edit');
            Route::post('Attribute/{id}', 'AttributesController@update')->name('Attribbutes.update');
            Route::post('delete/{id}', 'AttributesController@destroy')->name('Attribbutes.destroy');
         });
         Route::group(['prefix' => 'options'], function () {
            Route::get('/', 'OptionController@index')->name('options.index');
            Route::get('/create', 'OptionController@create')->name('options.create');
            Route::post('/store', 'OptionController@store')->name('options.store');
            Route::get('show/{id}', 'OptionController@show')->name('options.show');
            Route::get('/edit/{id}', 'OptionController@edit')->name('options.edit');
            Route::post('update/{id}', 'OptionController@update')->name('options.update');
            Route::post('delete/{id}', 'OptionController@destroy')->name('options.destroy');
        });
        Route::group(['prefix' => 'slider'] , function () {


            Route::get('/', 'SliderController@addImages')->name('admin.slider.create');

            Route::post('addSliderImages', 'SliderController@storeImag')->name('slider.add');
            Route::post('saveImages' , 'SliderController@SaveImagesToDB' )->name('slider.add.db');


        });

    });

});
Route::get('admin/login', 'Admin\AdminController@Login')->name('admin.login');
Route::post('post', 'Admin\AdminController@LoginAuth')->name('admin.login.post');
