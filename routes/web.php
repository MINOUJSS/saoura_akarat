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
    //-------Reale Estate Route
    //index
    Route::get('/reale-estates','Admin\RealeEstatesController@index')->name('admin.reale_estates');
    //detailes
    Route::get('/detailes/reale-estate/{id}','Admin\RealeEstatesController@detailes')->name('admin.reale_estate.detailes');
    //make notification readed
    Route::get('/notification/meke-readed/{note_id}','Admin\OrderToFindRealeEstateController@make_note_readed')->name('admin.notification.make.readed');
    //notification detailes
    Route::get('/detailes/reale-estate/{id}/{note_id}','Admin\RealeEstatesController@notification_detailes')->name('admin.reale_estate.notification.detailes');
    //delete
    Route::delete('/delete/reale-estate/{id}','Admin\RealeEstatesController@destroy')->name('admin.reale_estate.destroy');
    //edit
    Route::get('/edit/reale-estate/{id}','Admin\RealeEstatesController@edit')->name('admin.reale_estate.edit');
    //update
    Route::post('/update/reale-estate/{id}','Admin\RealeEstatesController@update')->name('admin.reale_estate.update');
    //edit  reale estate images
    Route::get('/edite-images/reale-estate/{id}','Admin\RealeEstatesController@edit_reale_estate_images')->name('admin.reale_estate.edit-reale-estate-images');
    // add image or multiple images to reale estate
    Route::post('/add-images/reale-estate/{id}','Admin\RealeEstatesController@add_images_to_reale_estate')->name('admin.reale_estate.add-images-to-reale-estate');
    // update reale estate images
    Route::post('/update-images/reale-estate/{id}','Admin\RealeEstatesController@update_reale_estate_images')->name('admin.reale_estate.update-reale-estate-images');
    // delete reale esate image
    Route::delete('/delete-image/image/{id}','Admin\RealeEstatesController@delete_image')->name('admin.reale_estate.delete-images');
    //------ Reale Estate Type Route
    //apartments
    Route::get('/reale-estate/type/apartments','Admin\RealeEstatesController@apartments')->name('admin.reale-estate.type.apartments');
    //houses
    Route::get('/reale-estate/type/houses','Admin\RealeEstatesController@houses')->name('admin.reale-estate.type.houses');
    //studios
    Route::get('/reale-estate/type/studios','Admin\RealeEstatesController@studios')->name('admin.reale-estate.type.studios');
    //farms
    Route::get('/reale-estate/type/farms','Admin\RealeEstatesController@farms')->name('admin.reale-estate.type.farms');
    //lands
    Route::get('/reale-estate/type/lands','Admin\RealeEstatesController@lands')->name('admin.reale-estate.type.lands');
    //shops
    Route::get('/reale-estate/type/shops','Admin\RealeEstatesController@shops')->name('admin.reale-estate.type.shops');
    //bereaus
    Route::get('/reale-estate/type/bereaus','Admin\RealeEstatesController@bereaus')->name('admin.reale-estate.type.bereaus');
    //-----contra route
    //edit
    Route::get('/edit/contra','Admin\ContraController@index')->name('admin.edit.contra');
    //update
    Route::put('/update/contra','Admin\ContraController@update')->name('admin.update.contra');
    //--------order to find reale estates routes
    //index
    Route::get('/reale-estate/all-orders-to-find','Admin\OrderToFindRealeEstateController@index')->name('admin.reale_estate.all.orders.to.find');
    //destroy
    Route::delete('/orders-to-find/delete/{id}','Admin\OrderToFindRealeEstateController@destroy')->name('admin.orders.to.find.delete');
    //notification detailes
    Route::get('/reale-estate/order-to-find/{id}/{note_id}','Admin\OrderToFindRealeEstateController@notification_detailes')->name('admin.reale_estate.order.to.find.notification.detailes');
    //detailes
    Route::get('/reale-estate/order-to-find/{id}','Admin\OrderToFindRealeEstateController@detailes')->name('admin.reale_estate.order.to.find.detailes');
    //edit
    Route::get('/reale-estate/order-to-find/edit/{id}','Admin\OrderToFindRealeEstateController@edit')->name('admin.reale_estate.order.to.find.edit');
    //update
    Route::put('/reale-estate/order-to-find/update','Admin\OrderToFindRealeEstateController@update')->name('admin.reale_estate.order.to.find.update');
    //--------order to find reale estates by tronsaction routes
    //fore rent
    Route::get('/order-to-find/transaction/for-rent','Admin\OrderToFindRealeEstateController@forRent')->name('admin.reale_estate.order.to.find.transaction.for.rent');
    //fore sall
    Route::get('/order-to-find/transaction/for-sall','Admin\OrderToFindRealeEstateController@forSall')->name('admin.reale_estate.order.to.find.transaction.for.sall');
    //fore change
    Route::get('/order-to-find/transaction/for-change','Admin\OrderToFindRealeEstateController@forChange')->name('admin.reale_estate.order.to.find.transaction.for.change');
    //add to liked list
    Route::post('/order-to-find/add-to-liked_list','Admin\OrderToFindRealeEstateController@add_to_liked_list')->name('admin.add.to.liked.list');
    //add to unliked list
    Route::post('/order-to-find/add-to-unliked_list','Admin\OrderToFindRealeEstateController@add_to_unliked_list')->name('admin.add.to.unliked.list');
    //-------Operations Route
    Route::get('/operations','Admin\OperationsController@index')->name('admin.operation.index');
    Route::post('/operations/create','Admin\OperationsController@create')->name('admin.operation.create');
    Route::post('/operations/store','Admin\OperationsController@store')->name('admin.operation.store');
    Route::post('/operations/edit','Admin\OperationsController@edit')->name('admin.operation.edit');
    Route::post('/operations/update','Admin\OperationsController@update')->name('admin.operation.update');
    Route::post('/operations/destroy/{id}','Admin\OperationsController@destroy')->name('admin.operation.destroy');
});

/*:::::::::::::::::::::::::::::::::::::::::::::::::::::
                     Site routes
:::::::::::::::::::::::::::::::::::::::::::::::::::::*/
//++++++++++++++++requesting routes+++++++++++++++++++++++
Route::get('/getdayras/{wilaya_id}','Site\Landing_page\RealEstateCustomerController@getdayras')->name('getdayras');
Route::get('/getbaladias/{dayra_id}','Site\Landing_page\RealEstateCustomerController@getbaladias')->name('getbaladias');
//++++++++++++++++++++++++++++++++++++++
//landin page route
Route::get('/Landing_page','Site\Landing_page\LandingPageController@index')->name('landing_page');
//register_real estate rout
Route::get('/Landing_page/register-real-estate','Site\Landing_page\RealEstateController@register')->name('site-landing-page-register-real-estate');
Route::post('/Landing_page/store-real-estate','Site\Landing_page\RealEstateController@store')->name('site-landing-page-store-real-estate');
//register customer
Route::get('/Landing_page/register-real-estate-customer','Site\Landing_page\RealEstateCustomerController@register')->name('site-landing-page-register-real-estate-customer');
Route::post('/Landing_page/store-real-estate-customer','Site\Landing_page\RealEstateCustomerController@store')->name('site-landing-page-store-real-estate-customer');
//+++++++++++++++++++ guests routes ++++++++++++++++++
Route::get('/', 'Site\HomeController@index')->name('site.index');
Route::get('/من-نحن','Site\AboutUsController@index')->name('site.about_us');
Route::get('/إتصل-بنا','Site\ContactUsController@index')->name('site.contact_us');
Route::get('/سياسة خصوصية','Site\ContraController@index')->name('site.contra');
Route::get('/reale-estate/{r_e_id}/photos','Site\RealeEstateController@photos')->name('site.reale_estate.photos');
