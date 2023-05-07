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
        'namespace' => 'Site',
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

                    // Route::get('verify' , function() {
                    //    return view('email.something');
                    // });
                    //    Route::post('register' , 'Auth\loginController@register');
            
                }
        );


        Route::get('verify', function () {
            return view('email.something');
        });

        Route::get('/home', 'HomeController@index')->name('home');


        Route::post(
            '/',
            'EmailVerificationController@verify'
        )->name('email.confirmation');

        Route::group(
            ['prefix' => 'user', 'middleware' => 'guest'],
            function () {

                }
        );

    }
);