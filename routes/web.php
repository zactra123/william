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
Route::get('who-we-are', 'PagesController@whoWeAre')->name('whoWeAre');
Route::get('how-it-works', 'PagesController@howItWorks')->name('howItWorks');
Route::get('credit-education', 'PagesController@creditEducation')->name('credit.education');
Route::get('credit-education/{url}', 'PagesController@creditEducationInfo')->name('credit.educationInfo');
Route::get('faqs', 'PagesController@faqs')->name('faqs');
Route::post('faqs', 'PagesController@faqs')->name('faqs.store');



Route::get('contacts', 'PagesController@contacts')->name('contacts');


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('register-as-affiliate', 'Auth\RegisterController@registerAffiliate')->name('register.Affiliate');
Route::post('email/verify/{id}/{signuture}', 'Auth\VerificationController@verify')->name('verification.verify_post');

Route::group(['prefix'=>'owner'], function(){

    Route::get('home-page-content', 'Owner\SuperAdminsController@homePageContent')->name('owner.home.content');
    Route::get('create/home-page-content', 'Owner\SuperAdminsController@homePageContentCreate')->name('owner.home.content.create');
    Route::post('create/home-page-content', 'Owner\SuperAdminsController@homePageContentStore')->name('owner.home.content.store');
    Route::get('view/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentShow')->name('owner.home.content.show');
    Route::get('edit/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentEdit')->name('owner.home.content.edit');
    Route::put('edit/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentUpdate')->name('owner.home.content.update');
    Route::delete('delete/home-page-content/{url}', 'Owner\SuperAdminsController@homePageContentDestroy')->name('owner.home.content.destroy');

    Route::resource('/', 'Owner\SuperAdminsController')->names('owner')->parameters([''=>'owner'])->except('show');;
    Route::get('admin/list', 'Owner\AdminsController@list')->name('owner.admin.list');
    Route::get('client/list', 'Owner\ClientsController@list')->name('owner.client.list');
    Route::get('affiliate/list', 'Owner\ClientsController@affiliateList')->name('owner.affiliate.list');
    Route::resource('admin', 'Owner\AdminsController')->names('owner.admin')->except('show');;
    Route::resource('client', 'Owner\ClientsController')->names('owner.client');

    Route::resource('faqs', 'Owner\FaqsController')->names('owner.faqs')->except('show');
    Route::get('faqs/question', 'Owner\FaqsController@question')->name('owner.faqs.question');
    Route::delete('faqs/question/delete/{id}', 'Owner\FaqsController@questiondelete');


});

Route::group(['prefix'=> 'admin'], function(){
    Route::resource('/', 'AdminsController')->names('admin')->parameters([''=>'admin']);

    Route::get('client/list', 'AdminsController@list')->name('admin.client.list');
    Route::get('affiliate/list', 'AdminsController@affiliateList')->name('admin.affiliate.list');

});


Route::group(['prefix'=> 'affiliate'], function(){

    Route::get('create-client', 'AffiliatesController@createClient')->name('affiliate.create.client');
    Route::post('store-client', 'AffiliatesController@storeClient')->name('affiliate.store.client');
    Route::get('client-details/{client}', 'AffiliatesController@addClientDetails')->name('affiliate.addClientDetails');
    Route::post('client-details/create/{client}', 'AffiliatesController@storeClientDetails')->name('affiliate.storeClientDetails');
    Route::get('client-details/edit/{affiliate}', 'AffiliatesController@editClientDetails')->name('affiliate.editClientDetails');
    Route::put('client-create/update/{id}', 'AffiliatesController@updateClientDetails')->name('affiliate.updateClientDetails');
    Route::get('client-details/dl-ss/{client}', 'AffiliatesController@addDLSS')->name('affiliate.addDLSS');
    Route::post('client-details/create/dl-ss/{client}', 'AffiliatesController@storeDLSS')->name('affiliate.storeDLSS');
    Route::resource('/', 'AffiliatesController')->names('affiliate')->parameters([''=>'affiliate'])->only('index');
});


Route::group(['prefix' =>'client/details'], function() {
    Route::get('credentials', 'ClientDetailsController@credentials')->name('client.credentials');
    Route::post('credentials-store', 'ClientDetailsController@credentialsStore')->name('client.credentialsStore');
    Route::get('add/driver-license-social-security', 'ClientDetailsController@addDlSs')->name('client.addDriverSocial');
    Route::post('add/driver-license-social-security', 'ClientDetailsController@storeDlSs')->name('client.storeDriverSocial');
//    Route::get('upload-credit-reports', 'ClientDetailsController@uploadCreditReports')->name('client.uploadCreditReports');
//    Route::post('upload-pdf', 'ClientDetailsController@uploadPdf')->name('client.uploadPdf');
    Route::resource('/', 'ClientDetailsController')->names('client.details')->parameters([''=>'client']);


//    Route::get('/details', 'ClientDetailsController@create')->name('createInfo');
//    Route::post('/save-info', 'ClientDetailsController@store')->name('storeInfo');
//    Route::get('/show-info', 'ClientDetailsController@show')->name('showInfo');

});








