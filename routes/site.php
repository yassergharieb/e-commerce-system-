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

// Route::get('/home', 'Site\HomeController@index')->name('home');


Route::group(
    [
       
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::group(
            ['middleware' => ['auth', 'EmailVerifiedWithCode']],
            function () {
                    Route::get('profile', function () {
                        return ' you are authanticated';
                    })->name('profile');

                       
                 
                    // Route::get('wishlist/{product_id}' , 'Site\WishListController@storeToUserWishList' )->name('wishList.add');  

                    Route::post('wishlist' , 'Site\WishListController@storeToUserWishList' )->name('wishList.add'); 
                    Route::get('productd/wishList' , 'Site\WishListController@geProudctsInWishList' )->name('wishList.get');  


        });
      


        Route::get('verify', function () {
            return view('email.something');
        });


        Route::group(['namespace' => 'Site'] ,  function () {


            
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('category/{slug}' , 'CategoryController@getProductsByCategorySlug')->name('category.products.slug');

        Route::get('product/{id}' , 'CategoryController@showProductInfo')->name('product.info');

        Route::post('/postemalicode','EmailVerificationController@verify')->name('email.confirmation');
        Route::get('confirmationForm','EmailVerificationController@confirmationForm')->name('email.confirmation.blade');

    

        });

        Route::group( [ 'middleware' => 'guest'],function (){


                }
        );

    }

);

// Route::get('register' , 'Auth\RegisterController@register');
