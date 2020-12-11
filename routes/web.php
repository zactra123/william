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

Route::get('login-info-first', 'Auth\LoginController@recover')->name('login.infoFirst');
Route::any('login-info-second', 'Auth\LoginController@loginInfoFirst')->name('login.infoFirstSend');
Route::post('login-info-reset', 'Auth\LoginController@loginInfoSecond')->name('login.infoSecondSend');
Route::post('login-info-finish', 'Auth\LoginController@loginInfoFinish')->name('login.infoFinishSend');


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
    Route::any('admin/{adminId}/change-password', 'Owner\AdminsController@changePassword')->name('owner.admin.changePassword');

    Route::delete('receptionist/{id}/delete/ip-address/{idIp}', 'Owner\ReceptionistsController@deleteIp')->name('owner.receptionist.deleteIp');
    Route::get('receptionist/list', 'Owner\ReceptionistsController@list')->name('owner.receptionist.list');

    Route::get('client/list', 'Owner\ClientsController@list')->name('owner.client.list');
    Route::get('affiliate/list', 'Owner\ClientsController@affiliateList')->name('owner.affiliate.list');
    Route::get('affiliate/{affiliateId}', 'Owner\ClientsController@affiliateShow')->name('owner.affiliate.show');
    Route::resource('admin', 'Owner\AdminsController')->names('owner.admin')->except('show');;
    Route::resource('receptionist', 'Owner\ReceptionistsController')->names('owner.receptionist')->except('show');;
    Route::resource('client', 'Owner\ClientsController')->names('owner.client');
    Route::post('client/report-number', 'ClientsController@clientReportNumber')->name('owner.client.report_number');
    ROUTE::any('pricing', 'Owner\ClientsController@pricing')->name('owner.pricing');
    ROUTE::get('pricing-affiliate', 'Owner\ClientsController@pricing_affiliate');

    Route::resource('faqs', 'Owner\FaqsController')->names('owner.faqs')->except('show');
    Route::get('faqs/question', 'Owner\FaqsController@question')->name('owner.faqs.question');
    Route::delete('faqs/question/delete/{id}', 'Owner\FaqsController@questiondelete');

    Route::resource('slogans', 'Owner\SlogansController')->names('owner.slogans')->except(['show','update','edit']);

    //Reports actions
    Route::group(["prefix" => "report"], function(){
        Route::get('/', 'Owner\ReportsController@index')->name("owner.reports.index");
    });


    Route::group(["prefix"=>"furnishers"], function(){
        Route::post('/bank-name','Owner\BanksController@banKName');
        Route::get('/','Owner\BanksController@showBankLogo')->name("owner.bank.show");
        Route::get('/add','Owner\BanksController@create')->name("owner.bank.create");
        Route::post('/add','Owner\BanksController@store')->name("owner.bank.store");
        Route::delete('/logo/{id}','Owner\BanksController@deleteBankLogo')->name("owner.bank.delete");
        Route::get('/edit/{id}','Owner\BanksController@edit')->name("owner.bank.edit");
        Route::put('/edit/{id}','Owner\BanksController@update')->name("owner.bank.update");
        Route::delete('/delete/bank-phone/{id}','Owner\BanksController@deleteBankPhone')->name("owner.bankPhone.delete");
        Route::any('/types', 'Owner\BanksController@types')->name("owner.bank.types");
        Route::delete('/types/{id}', 'Owner\BanksController@delete_types');
        Route::post('/types/update_keywords', 'Owner\BanksController@update_type_keywords');
        Route::post('/types/update_default', 'Owner\BanksController@update_type_default');
        Route::any('/keywords', 'Owner\BanksController@keywords');

        Route::get('affiliate/list', 'Owner\BanksController@storeBanksData');
    });

    Route::post('message/completed', 'Owner\MessagesController@messageCompleted')->name('owner.message.ajax');
    Route::post('message/note', 'Owner\MessagesController@addNote')->name('owner.message.note');

    Route::put('message/update','Owner\MessagesController@update')->name('owner.message.update');
    Route::get('message','Owner\MessagesController@index')->name('owner.message.index');
    Route::get('message/{id}','Owner\MessagesController@show')->name('owner.message.show');
    Route::post('message/create','Owner\MessagesController@create')->name('owner.message.create');
    Route::delete('message/{id}','Owner\MessagesController@destroy')->name('owner.message.destroy');
    Route::post('message/user/data','Owner\MessagesController@userData')->name('owner.message.userData');

//    testing url for scraper
    Route::get('scraper-test/{client_id}', 'Owner\ClientsController@scrape');

});

Route::group(['prefix'=> 'admin'], function(){
    Route::resource('/', 'AdminsController')->names('admin')->parameters([''=>'admin'])->except('show');

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


    Route::group(["prefix"=>"bank"], function(){
        Route::get('/logo','BanksController@showBankLogo')->name("admin.bank.show");
        Route::delete('/logo/{id}','BanksController@deleteBankLogo')->name("admin.bank.delete");
    });



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
    Route::post('live-chat/show-details','Receptionist\ChatsController@showDetails')->name('receptionist.liveChat.showDetails');
    Route::post('live-chat/answer','Receptionist\ChatsController@create')->name('receptionist.liveChat.create');


});

Route::group(['prefix'=> 'admins/'], function(){

    Route::get('client','TodosController@clientList')->name('adminRec.client.list');

    Route::get('affiliate','TodosController@affiliateList')->name('adminRec.affiliate.list');

    Route::get('affiliate/{affiliate}','TodosController@affiliateProfile')->name('adminRec.affiliate.profile');


    Route::get('client/{client}/profile', 'TodosController@profile')->name('adminRec.client.profile');

    Route::any('/change-password', 'TodosController@changePassword')->name('adminRec.changePassword');


    Route::put('client/{clientId}/update', 'TodosController@updateClient')->name('adminRec.client.update');
    Route::get('client/{client}/report/{type}', 'TodosController@clientReport')->name('adminRec.client.report');
    Route::get('todo/list', 'TodosController@toDoList')->name('adminRec.toDo.list');
    Route::delete('todo/{id}', 'TodosController@toDoDestroy')->name('adminRec.toDo.destroy');
    Route::delete('dispute/{id}', 'TodosController@disputeDestroy')->name('adminRec.dispute.destroy');
    Route::post('todo/change-assignment', 'TodosController@changeTodoAssignment')->name('adminRec.todo.assignment');
    Route::post('client/profile/todo', 'TodosController@clientToDo')->name('adminRec.client.todo');
    Route::put('client/todo/{todoId}', 'TodosController@clientToDoUpdate')->name('adminRec.client.todoUpdate');
    Route::get('client/{id}/credentials', 'TodosController@credentials')->name('adminRec.credentials');
    Route::put('client/{id}/credentials', 'TodosController@credentialsUpdate')->name('adminRec.credentialsUpdate');
    Route::post('client/send-email', 'TodosController@sendEmail')->name('adminRec.sendEmail');

    Route::get('client-profile-print/{id}', 'TodosController@printPdfClientProfile')->name('adminRec.profilePdf');
    Route::post('client/report/queue', 'TodosController@queueReport')->name('adminRec.client.queue');


});


Route::group(['prefix'=> 'affiliate'], function(){

    Route::get('important-information', 'AffiliatesController@importantInformation');
    Route::post('important-information', 'AffiliatesController@importantInformation')->name('affiliate.important');

    Route::get('create-client', 'AffiliatesController@createClient')->name('affiliate.create.client');
    Route::post('store-client', 'AffiliatesController@storeClient')->name('affiliate.store.client');
    Route::get('client-document/{client}', 'AffiliatesController@addClientDocumnet')->name('affiliate.client.document');
    Route::post('client-details/create/dl-ss/{client}', 'AffiliatesController@storeDLSS')->name('affiliate.storeDLSS');
    Route::get('client-credentials/{clientId}', 'AffiliatesController@addCredentials')->name('affiliate.client.credentials');
    Route::post('client-credentials/{clientId}', 'AffiliatesController@storeCredentials')->name('affiliate.storeCredentials');
    Route::get('client-review', 'AffiliatesController@clientReview')->name('affiliate.clientReview');
    Route::put('client-review/{clientId}', 'AffiliatesController@storeReview')->name('affiliate.storeReview');
    Route::get('client-profile/{clientId}', 'AffiliatesController@clientProfile')->name('affiliate.client.profile');
    Route::get('client-continue/{clientId}', 'AffiliatesController@continue')->name('affiliate.client.continue');

    Route::put('client-profile/{clientId}/update', 'AffiliatesController@updateClient')->name('affiliate.client.update');
    Route::get('client-profile/{id}/credentials/{source?}', 'AffiliatesController@credentials')->name('affiliate.credentials');
    Route::put('client-profile/{id}/credentials', 'AffiliatesController@credentialsUpdate')->name('affiliate.credentialsUpdate');

    Route::get('client/report/{type}', 'AffiliatesController@clientReport')->name('affiliate.client.report');


    Route::get('client/{client}/negative-item', 'AffiliatesController@negativeItem')->name('affiliate.negative.item');
    Route::post('client/{client}/negative-item', 'AffiliatesController@negativeItemStore')->name('affiliate.negative.store');
    Route::post('client/{client}/negative-contract', 'AffiliatesController@negativeItemContract')->name('affiliate.negative.contract');

    Route::get('client/complete/information/{info}', 'AffiliatesController@showRequireInfo')->name('affiliate.complete.requireInfo');
    Route::put('client/complete/require/information', 'AffiliatesController@updateDispute')->name('affiliate..dispute.update');








//    Route::post('client-details/create/{client}', 'AffiliatesController@storeClientDetails')->name('affiliate.storeClientDetails');
//    Route::get('client-details/edit/{affiliate}', 'AffiliatesController@editClientDetails')->name('affiliate.editClientDetails');
//    Route::put('client-create/update/{id}', 'AffiliatesController@updateClientDetails')->name('affiliate.updateClientDetails');
//    Route::get('client-details/dl-ss/{client}', 'AffiliatesController@addDLSS')->name('affiliate.addDLSS');
    Route::resource('/', 'AffiliatesController')->names('affiliate')->parameters([''=>'affiliate'])->only('index');
});


Route::group(['prefix' =>'client'], function() {

    Route::get('important-information', 'ClientDetailsController@importantInformation');
    Route::post('important-information', 'ClientDetailsController@importantInformation')->name('client.important');

    Route::get('continue', 'ClientDetailsController@continue')->name('client.continue');
    Route::get('credentials/{source?}', 'ClientDetailsController@credentials')->name('client.credentials');
    Route::post('credentials-store', 'ClientDetailsController@credentialsStore')->name('client.credentialsStore');
    Route::get('add/driver-license-social-security', 'ClientDetailsController@addDlSs')->name('client.addDriverSocial');
    Route::post('add/driver-license-social-security', 'ClientDetailsController@storeDlSs')->name('client.storeDriverSocial');
    Route::get('upload-credit-reports', 'ClientDetailsController@uploadCreditReports')->name('client.uploadCreditReports');
    Route::post('upload-pdf', 'ClientDetailsController@uploadPdf')->name('client.uploadPdf');
    Route::get('registration-steps', 'ClientDetailsController@create')->name('registration_steps');
    Route::get('profile', 'ClientDetailsController@profile')->name('client.profile');
    Route::get('negative-item', 'ClientDetailsController@negativeItem')->name('client.negative.item');
    Route::post('negative-item', 'ClientDetailsController@negativeItemStore')->name('negative.store');
    Route::post('negative-contract', 'ClientDetailsController@negativeItemContract')->name('negative.contract');
    Route::get('report/{type}', 'ClientDetailsController@clientReport')->name('client.report');
    Route::put('update/driver-license', 'ClientDetailsController@updateDriver')->name('client.updateDriver');

    Route::get('complete/require/information/{info}', 'ClientDetailsController@showRequireInfo')->name('client.complete.requireInfo');
    Route::put('complete/require/information', 'ClientDetailsController@updateDispute')->name('client.dispute.update');

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



