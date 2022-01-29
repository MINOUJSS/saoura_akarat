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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('site.index.index');
// });

Auth::routes();
/*:::::::::::::::::::::::::::::::::::::::::::::::::::::
                     Admin routes
:::::::::::::::::::::::::::::::::::::::::::::::::::::*/



/*:::::::::::::::::::::::::::::::::::::::::::::::::::::
                     Site routes
:::::::::::::::::::::::::::::::::::::::::::::::::::::*/
//landin page route
Route::get('/','Site\LandingPageController@index')->name('landing_page');
//register_real estate rout
Route::get('/register-real-estate','Site\RealEstateController@register')->name('site-register-real-estate');
Route::get('/store-real-estate','Site\RealEstateController@store')->name('site-store-real-estate');
//register customer
Route::get('/register-real-estate-customer','Site\RealEstateCustomerController@register')->name('site-register-real-estate-customer');
Route::get('/store-real-estate-customer','Site\RealEstateCustomerController@store')->name('site-store-real-estate-customer');
// Route::get('/home', 'HomeController@index')->name('home');
