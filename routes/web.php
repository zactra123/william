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

Route::get('legality-credit-repair', 'PagesController@legalityCreditRepair')->name('legalityCreditRepair');
Route::get('contact', 'PagesController@contacts')->name('contact');
Route::post('contact/send-message', 'PagesController@contactsSendMessage')->name('contact.sendMessage');
Route::get('credit-repair-resources', 'PagesController@creditRepiarResouces')->name('credit.repair');
Route::get('free-credit-repair', 'PagesController@creditFreeRepiar')->name('credit.free.repair');
Route::get('pravicy-policy', 'PagesController@pravicyPolicy')->name('pravicy');
Route::get('credit-education', 'PagesController@creditEducation')->name('credit.education');
Route::get('credit-education/{url}', 'PagesController@creditEducationInfo')->name('credit.educationInfo');
Route::get('faqs', 'PagesController@faqs')->name('faqs');
Route::post('faqs', 'PagesController@faqs')->name('faqs.store');


Route::post('/broadcasting/auth', function (Illuminate\Http\Request $req) {
    if ($req->channel_name == 'presence-LiveChat') {

        return \Illuminate\Support\Facades\Broadcast::auth($req);
    }
});


Route::get('contacts', 'PagesController@contacts')->name('contacts');


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/facebook/redirect', 'SocialAuthController@redirect')->name('facebook.login');
Route::get('/facebook/callback', 'SocialAuthController@callback');

Route::get('/google/redirect', 'SocialAuthController@redirectGoogle')->name('google.login');
Route::get('/google/callback', 'SocialAuthController@callbackGoogle');

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
    Route::delete('admin/{id}/delete/ip-address/{idIp}', 'Owner\AdminsController@deleteIp')->name('owner.admin.deleteIp');

    Route::delete('receptionist/{id}/delete/ip-address/{idIp}', 'Owner\ReceptionistsController@deleteIp')->name('owner.receptionist.deleteIp');
    Route::get('receptionist/list', 'Owner\ReceptionistsController@list')->name('owner.receptionist.list');

    Route::get('client/list', 'Owner\ClientsController@list')->name('owner.client.list');
    Route::get('affiliate/list', 'Owner\ClientsController@affiliateList')->name('owner.affiliate.list');
    Route::resource('admin', 'Owner\AdminsController')->names('owner.admin')->except('show');;
    Route::resource('receptionist', 'Owner\ReceptionistsController')->names('owner.receptionist')->except('show');;
    Route::resource('client', 'Owner\ClientsController')->names('owner.client');
    Route::post('client/report-number', 'ClientsController@clientReportNumber')->name('owner.client.report_number');

    Route::resource('faqs', 'Owner\FaqsController')->names('owner.faqs')->except('show');
    Route::get('faqs/question', 'Owner\FaqsController@question')->name('owner.faqs.question');
    Route::delete('faqs/question/delete/{id}', 'Owner\FaqsController@questiondelete');

    Route::resource('slogans', 'Owner\SlogansController')->names('owner.slogans')->except(['show','update','edit']);

    //Reports actions
    Route::group(["prefix" => "report"], function(){
        Route::get('/', 'Owner\ReportsController@index')->name("owner.reports.index");
    });


    Route::post('message/completed', 'Owner\MessagesController@messageCompleted')->name('owner.message.ajax');
    Route::post('message/note', 'Owner\MessagesController@addNote')->name('owner.message.note');

    Route::put('message/update','Owner\MessagesController@update')->name('owner.message.update');
    Route::get('message','Owner\MessagesController@index')->name('owner.message.index');
    Route::get('message/{id}','Owner\MessagesController@show')->name('owner.message.show');
    Route::post('message/create','Owner\MessagesController@create')->name('owner.message.create');
    Route::delete('message/{id}','Owner\MessagesController@destroy')->name('owner.message.destroy');
    Route::post('message/user/data','Owner\MessagesController@userData')->name('owner.message.userData');

});

Route::group(['prefix'=> 'admin'], function(){
    Route::resource('/', 'AdminsController')->names('admin')->parameters([''=>'admin'])->except('show');
    Route::get('client/list', 'AdminsController@list')->name('admin.client.list');
    Route::get('client/{client}/profile', 'AdminsController@clientProfile')->name('admin.client.profile');
    Route::get('affiliate/list', 'AdminsController@affiliateList')->name('admin.affiliate.list');
    Route::post('client/report-number', 'AdminsController@clientReportNumber')->name('admin.client.report_number');
    Route::get('getNotifications', 'AdminsController@getNotifications');

    Route::get('client-profile-print/{id}', 'AdminsController@printPdfClientProfile')->name('admin.client.profilePdf');



    Route::post('message/completed', 'MessagesController@messageCompleted')->name('admin.message.ajax');
    Route::post('message/note', 'MessagesController@addNote')->name('admin.message.note');

    Route::put('message/update','MessagesController@update')->name('admin.message.update');
    Route::get('message','MessagesController@index')->name('admin.message.index');
    Route::get('message/{id}','MessagesController@show')->name('admin.message.show');
    Route::post('message/create','MessagesController@create')->name('admin.message.create');
    Route::delete('message/{id}','MessagesController@destroy')->name('admin.message.destroy');
    Route::post('message/user/data','MessagesController@userData')->name('admin.message.userData');



});

Route::group(['prefix'=> 'receptionist'], function(){

    Route::post('message/completed', 'Receptionist\MessagesController@messageCompleted')->name('receptionist.message.ajax');
    Route::post('message/note', 'Receptionist\MessagesController@addNote')->name('receptionist.message.note');

    Route::put('message/update','Receptionist\MessagesController@update')->name('receptionist.message.update');
    Route::get('message','Receptionist\MessagesController@index')->name('receptionist.message.index');
    Route::get('message/{id}','Receptionist\MessagesController@show')->name('receptionist.message.show');
    Route::post('message/create','Receptionist\MessagesController@create')->name('receptionist.message.create');
    Route::delete('message/{id}','Receptionist\MessagesController@destroy')->name('receptionist.message.destroy');
    Route::post('message/user/data','Receptionist\MessagesController@userData')->name('receptionist.message.userData');

    Route::get('live-chat','Receptionist\ChatsController@index')->name('receptionist.liveChat.index');
    Route::get('live-chat/unreads','Receptionist\ChatsController@unreads')->name('receptionist.liveChat.unreads');
    Route::post('live-chat/chat-message','Receptionist\ChatsController@show')->name('receptionist.liveChat.show');
    Route::post('live-chat/answer','Receptionist\ChatsController@create')->name('receptionist.liveChat.create');


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


Route::group(['prefix' =>'client'], function() {
    Route::get('continue', 'ClientDetailsController@continue')->name('client.continue');
    Route::get('credentials', 'ClientDetailsController@credentials')->name('client.credentials');
    Route::post('credentials-store', 'ClientDetailsController@credentialsStore')->name('client.credentialsStore');
    Route::get('add/driver-license-social-security', 'ClientDetailsController@addDlSs')->name('client.addDriverSocial');
    Route::post('add/driver-license-social-security', 'ClientDetailsController@storeDlSs')->name('client.storeDriverSocial');
    Route::get('upload-credit-reports', 'ClientDetailsController@uploadCreditReports')->name('client.uploadCreditReports');
    Route::post('upload-pdf', 'ClientDetailsController@uploadPdf')->name('client.uploadPdf');
    Route::get('registration-steps', 'ClientDetailsController@create')->name('registration_steps');
    Route::get('profile', 'ClientDetailsController@profile')->name('client.profile');
    Route::resource('details/', 'ClientDetailsController')->names('client.details')->parameters([''=>'client']);


//    Route::get('/details', 'ClientDetailsController@create')->name('createInfo');
//    Route::post('/save-info', 'ClientDetailsController@store')->name('storeInfo');
//    Route::get('/show-info', 'ClientDetailsController@show')->name('showInfo');

});




Route::group(["prefix" => 'chat'], function(){
    Route::post('/identify-user', 'ChatsController@identifyUser');
    Route::get('/get-chat-messages', 'ChatsController@getChatMessages');
    Route::post('/new-message', 'ChatsController@postNewMessage');
});



