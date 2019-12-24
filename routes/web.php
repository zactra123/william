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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'PagesController@welcome' );
Route::get('more-information/{url}', 'PagesController@moreInformation')->name('more.information');

Route::get('contacts', 'PagesController@contacts')->name('contacts');
Route::get('about-us', 'PagesController@about')->name('about-us');


Auth::routes();
Auth::routes(['verify' => true]);
Route::post('email/verify/{id}/{signuture}', 'Auth\VerificationController@verify')->name('verification.verify_post');

Route::group(['prefix'=>'owner'], function(){

    Route::get('home-page-content', 'Owner\SuperAdminsController@homePageContent')->name('owner.home.content');
    Route::get('create/home-page-content', 'Owner\SuperAdminsController@homePageContentCreate')->name('owner.home.content.create');
    Route::post('create/home-page-content', 'Owner\SuperAdminsController@homePageContentStore')->name('owner.home.content.store');
    Route::get('view/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentShow')->name('owner.home.content.show');
    Route::get('edit/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentEdit')->name('owner.home.content.edit');
    Route::put('edit/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentUpdate')->name('owner.home.content.update');
    Route::delete('delete/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentDestroy')->name('owner.home.content.destroy');

    Route::resource('/', 'Owner\SuperAdminsController')->names('owner')->parameters([''=>'owner']);
    Route::get('admin/list', 'Owner\AdminsController@list')->name('owner.admin.list');
    Route::get('client/list', 'Owner\ClientsController@list')->name('owner.client.list');
    Route::resource('admin', 'Owner\AdminsController')->names('owner.admin');
    Route::resource('client', 'Owner\ClientsController')->names('owner.client');


});

Route::group(['prefix'=> 'admin'], function(){
    Route::resource('/', 'AdminsController')->names('admin')->parameters([''=>'admin']);

});


Route::group(['prefix'=> 'affiliate'], function(){

    Route::get('create-client', 'AffiliatesController@createClient')->name('affiliate.create.client');
    Route::post('store-client', 'AffiliatesController@storeClient')->name('affiliate.store.client');
    Route::get('client-details/{client}', 'AffiliatesController@addClientDetails')->name('affiliate.addClientDetails');
    Route::post('client-details/create/{client}', 'AffiliatesController@storeClientDetails')->name('affiliate.storeClientDetails');
    Route::get('client-details/edit/{affiliate}', 'AffiliatesController@editClientDetails')->name('affiliate.editClientDetails');
    Route::put('client-create/update/{id}', 'AffiliatesController@updateClientDetails')->name('affiliate.updateClientDetails');
    Route::resource('/', 'AffiliatesController')->names('affiliate')->parameters([''=>'affiliate'])->only('index');
});


Route::group(['prefix' =>'client/details'], function() {
    Route::get('credentials', 'ClientDetailsController@credentials')->name('client.credentials');
    Route::post('credentials-store', 'ClientDetailsController@credentialsStore')->name('client.credentialsStore');
    Route::get('upload-credit-reports', 'ClientDetailsController@uploadCreditReports')->name('client.uploadCreditReports');
    Route::post('upload-pdf', 'ClientDetailsController@uploadPdf')->name('client.uploadPdf');
    Route::resource('/', 'ClientDetailsController')->names('client.details')->parameters([''=>'client']);


//    Route::get('/details', 'ClientDetailsController@create')->name('createInfo');
//    Route::post('/save-info', 'ClientDetailsController@store')->name('storeInfo');
//    Route::get('/show-info', 'ClientDetailsController@show')->name('showInfo');

});








