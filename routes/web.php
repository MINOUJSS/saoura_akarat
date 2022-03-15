<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
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
// Route::get('/welcome', function () {
//     Alert::success('مرحبا');
//     return view('welcome');
// });

Auth::routes();
/*:::::::::::::::::::::::::::::::::::::::::::::::::::::
                     Admin routes
:::::::::::::::::::::::::::::::::::::::::::::::::::::*/

Route::prefix('admin')->group(function(){
    //login
    Route::get('/login','Auth\AdminLoginController@ShowLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    //logout
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    //Dashboard Route
    Route::get('/','Admin\AdminController@index')->name('admin.dashboard');
    //Reale Estate Route
    //index
    Route::get('/reale-estates','Admin\RealeEstatesController@index')->name('admin.reale_estates');
    //detailes
    Route::get('/detailes/reale-estate/{id}','Admin\RealeEstatesController@detailes')->name('admin.reale_estate.detailes');
    //delete
    Route::delete('/delete/reale-estate/{id}','Admin\RealeEstatesController@destroy')->name('admin.reale_estate.destroy');
    //update
    Route::put('/edit/reale-estate/{id}','Admin\RealeEstatesController@edit')->name('admin.reale_estate.edit');
});

/*:::::::::::::::::::::::::::::::::::::::::::::::::::::
                     Site routes
:::::::::::::::::::::::::::::::::::::::::::::::::::::*/
//++++++++++++++++requesting routes+++++++++++++++++++++++
Route::get('/getdayras/{wilaya_id}','Site\RealEstateCustomerController@getdayras')->name('getdayras');
Route::get('/getbaladias/{dayra_id}','Site\RealEstateCustomerController@getbaladias')->name('getbaladias');
//++++++++++++++++++++++++++++++++++++++
//landin page route
Route::get('/','Site\LandingPageController@index')->name('landing_page');
//register_real estate rout
Route::get('/register-real-estate','Site\RealEstateController@register')->name('site-register-real-estate');
Route::post('/store-real-estate','Site\RealEstateController@store')->name('site-store-real-estate');
//register customer
Route::get('/register-real-estate-customer','Site\RealEstateCustomerController@register')->name('site-register-real-estate-customer');
Route::get('/store-real-estate-customer','Site\RealEstateCustomerController@store')->name('site-store-real-estate-customer');
// Route::get('/home', 'HomeController@index')->name('home');
