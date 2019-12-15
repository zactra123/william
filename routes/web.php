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

Route::get('/', function () {
    return view('welcome');
});


Route::get('contacts', 'PagesController@contacts')->name('contacts');
Route::get('about-us', 'PagesController@about')->name('about-us');


Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['prefix'=>'owner'], function(){

    Route::resource('/', 'Owner\SuperAdminsController')->names('owner')->parameters([''=>'owner']);
    Route::get('admin/list', 'Owner\AdminsController@list')->name('owner.admin.list');
    Route::get('client/list', 'Owner\ClientsController@list')->name('owner.client.list');
    Route::resource('admin', 'Owner\AdminsController')->names('owner.admin');
    Route::resource('client', 'Owner\ClientsController')->names('owner.client');


});

Route::group(['prefix'=> 'admin'], function(){
    Route::resource('/', 'AdminsController')->names('admin')->parameters([''=>'admin']);

});


Route::group(['prefix' =>'client/details'], function() {
    Route::get('credentials', 'ClientDetailsController@credentials')->name('client.credentials');
    Route::post('credentials-store', 'ClientDetailsController@credentialsStore')->name('client.credentialsStore');
    Route::get('credentials-edit', 'ClientDetailsController@credentialsEdit')->name('client.credentialsEdit');
    Route::put('credentials-update', 'ClientDetailsController@credentialsUpdate')->name('client.credentialsUpdate');
    Route::post('upload-pdf', 'ClientDetailsController@uploadPdf')->name('client.uploadPdf');
    Route::resource('/', 'ClientDetailsController')->names('client.details')->parameters([''=>'client']);


//    Route::get('/details', 'ClientDetailsController@create')->name('createInfo');
//    Route::post('/save-info', 'ClientDetailsController@store')->name('storeInfo');
//    Route::get('/show-info', 'ClientDetailsController@show')->name('showInfo');

});








