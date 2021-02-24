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

Route::get('/home', function () {
    if (Auth::user()){
        switch (Auth::user()->role){
            case "super admin":
                return redirect('/owner');
                break;
            case "receptionist":
            case "admin":
                return redirect('/admins');
                break;
            case "affiliate":
                return redirect('/affiliate');
                break;
            case "client":
                return redirect('/client/details');
                break;
            case "seo":
                return redirect('/admins/blogs');
                break;
        }
    } else {
        return redirect('/');
    }
});





Route::get('/', 'PagesController@welcome' );
Route::get('who-we-are', 'PagesController@whoWeAre')->name('whoWeAre');
Route::get('how-it-works', 'PagesController@howItWorks')->name('howItWorks');
Route::get('legality-credit-repair', 'PagesController@legalityCreditRepair')->name('legalityCreditRepair');
Route::get('contact', 'PagesController@contacts')->name('contact');
Route::post('contact/send-message', 'PagesController@contactsSendMessage')->name('contact.sendMessage');
Route::get('credit-repair-resources', 'PagesController@creditRepiarResouces')->name('credit.repair');
Route::get('free-credit-repair', 'PagesController@creditFreeRepiar')->name('credit.free.repair');
Route::get('pravicy-policy', 'PagesController@pravicyPolicy')->name('pravicy');
Route::get('credit-education', 'PagesController@creditEducation')->name('credit.education');
Route::match(['get', 'post'], 'faqs', 'PagesController@faqs')->name('faqs');
Route::get('contacts', 'PagesController@contacts')->name('contacts');
Route::get('news-room', 'PagesController@blog')->name('blog');
Route::get('news-room/{url}', 'PagesController@blogShow')->name('home.blog.show');

Route::get('shear/{social}/{url}', 'PagesController@shareSocial')->name('shear');

Route::post('/broadcasting/auth', function (Illuminate\Http\Request $req) {
    if ($req->channel_name == 'presence-LiveChat') {
        return \Illuminate\Support\Facades\Broadcast::auth($req);
    }
});



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

    Route::resource('/', 'Owner\SuperAdminsController')->names('owner')->parameters([''=>'owner'])->except('show');

    Route::resource('admin', 'Owner\AdminsController')->names('owner.admin')->except('show');
    Route::delete('admin/{id}/delete/ip-address/{idIp}', 'Owner\AdminsController@deleteIp')->name('owner.admin.deleteIp');
    Route::any('admin/{adminId}/change-password', 'Owner\AdminsController@changePassword')->name('owner.admin.changePassword');

    Route::resource('receptionist', 'Owner\ReceptionistsController')->names('owner.receptionist')->except('show');
    Route::delete('receptionist/{id}/delete/ip-address/{idIp}', 'Owner\ReceptionistsController@deleteIp')->name('owner.receptionist.deleteIp');

    Route::resource('client', 'Owner\ClientsController')->names('owner.client')->only(['index', 'destroy']);

    Route::resource('affiliate', 'Owner\AffiliatesController')->names('owner.affiliate')->only(['index', 'destroy']);

    Route::any('affiliate/pricing', 'Owner\AffiliatesController@pricing')->name('owner.affiliate.pricing');
    Route::get('affiliate/pricing-affiliate', 'Owner\AffiliatesController@pricing_affiliate');


    Route::resource('credit-education', 'Owner\CreditEducationsController')->names('owner.credit.education');



    Route::get('client/list', 'Owner\ClientsController@list')->name('owner.client.list');
    Route::get('affiliate/list', 'Owner\ClientsController@affiliateList')->name('owner.affiliate.list');
    Route::get('affiliate/{affiliateId}', 'Owner\ClientsController@affiliateShow')->name('owner.affiliate.show');

    Route::resource('client', 'Owner\ClientsController')->names('owner.client');
    Route::post('client/report-number', 'Owner\ClientsController@clientReportNumber')->name('owner.client.report_number');
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
    Route::post('live-chat/show-details','Receptionist\ChatsController@showDetails')->name('receptionist.liveChat.showDetails');
    Route::post('live-chat/answer','Receptionist\ChatsController@create')->name('receptionist.liveChat.create');


});

Route::group(['prefix'=> 'admins/'], function(){

    Route::get('/', 'Employer\AdminsController@index')->name('admin');
    Route::get('getNotifications', 'Employer\AdminsController@getNotifications');
    Route::any('/change-password', 'Employer\AdminsController@changePassword')->name('adminRec.changePassword');

    Route::group(["prefix"=>"furnishers"], function(){
        Route::post('/bank-name','BanksController@banKName');
        Route::get('/','BanksController@showBankLogo')->name("admins.bank.show");
        Route::get('/add','BanksController@create')->name("admins.bank.create");
        Route::post('/add','BanksController@store')->name("admins.bank.store");
        Route::delete('/logo/{id}','BanksController@deleteBankLogo')->name("admins.bank.delete");
        Route::get('/edit/{id}','BanksController@edit')->name("admins.bank.edit");
        Route::put('/edit/{id}','BanksController@update')->name("admins.bank.update");
        Route::delete('/delete/bank-phone/{id}','BanksController@deleteBankPhone')->name("admins.bankPhone.delete");
        Route::any('/types', 'BanksController@types')->name("admins.bank.types");
        Route::any('/judicial/days', 'BanksController@mortgageDays')->name("admins.mortgage.days");
        Route::get('/mortgage/state', 'BanksController@state');

        Route::delete('/types/{id}', 'BanksController@delete_types');
        Route::post('/types/update_keywords', 'BanksController@update_type_keywords');
        Route::post('/types/update_default', 'BanksController@update_type_default');
        Route::any('/keywords', 'BanksController@keywords');
        Route::get('/address-autocomplete', 'BanksController@address_autocomplete');
        Route::get('/parent-bank', 'BanksController@parent_bank');
        Route::post('/check/name', 'BanksController@checkName');
        Route::get('/{id}', 'BanksController@show');


    });

    Route::resource('authorities', 'AuthoritiesController')->except('show')->names('admins.authority');
    Route::resource('court', 'Employer\CourtsController')->except('show')->names('admins.court');


    Route::resource('blogs', 'BlogsController')->names('blog');
    Route::post('/blogs/upload_tinymce_images', 'BlogsController@upload_tinymce_images');




    Route::get('client','Employer\ClientsController@clientList')->name('adminRec.client.list');
    Route::get('affiliate','Employer\ClientsController@affiliateList')->name('adminRec.affiliate.list');
    Route::get('affiliate/{affiliate}','Employer\ClientsController@affiliateProfile')->name('adminRec.affiliate.profile');
    Route::get('client/{client}/profile', 'Employer\ClientsController@profile')->name('adminRec.client.profile');
    Route::put('client/{clientId}/update', 'Employer\ClientsController@updateClient')->name('adminRec.client.update');
    Route::get('client/{client}/report/{type}', 'Employer\ClientsController@clientReport')->name('adminRec.client.report');
    Route::get('client/{id}/credentials', 'Employer\ClientsController@credentials')->name('adminRec.credentials');
    Route::put('client/{id}/credentials', 'Employer\ClientsController@credentialsUpdate')->name('adminRec.credentialsUpdate');
    Route::post('client/send-email', 'Employer\ClientsController@sendEmail')->name('adminRec.sendEmail');
    Route::get('client-profile-print/{id}', 'Employer\ClientsController@printPdfClientProfile')->name('adminRec.profilePdf');
    Route::post('client/report/queue', 'Employer\ClientsController@queueReport')->name('adminRec.client.queue');

    Route::get('todo/list', 'Employer\TodosController@toDoList')->name('adminRec.toDo.list');
    Route::delete('todo/{id}', 'Employer\TodosController@toDoDestroy')->name('adminRec.toDo.destroy');
    Route::delete('dispute/{id}', 'Employer\TodosController@disputeDestroy')->name('adminRec.dispute.destroy');
    Route::post('todo/change-assignment', 'Employer\TodosController@changeTodoAssignment')->name('adminRec.todo.assignment');
    Route::post('client/profile/todo', 'Employer\TodosController@clientToDo')->name('adminRec.client.todo');
    Route::put('client/todo/{todoId}', 'Employer\TodosController@clientToDoUpdate')->name('adminRec.client.todoUpdate');
    Route::get('client/todo/details', 'Employer\TodosController@toDodetails');


});


Route::group(['prefix'=> 'affiliate'], function(){

    Route::get('important-information', 'AffiliatesController@importantInformation');
    Route::post('important-information', 'AffiliatesController@importantInformation')->name('affiliate.important');
    Route::get('check-as-finished', 'AffiliatesController@checkAsFinished');

    Route::get('create-client', 'AffiliatesController@createClient')->name('affiliate.create.client');
    Route::post('store-client', 'AffiliatesController@storeClient')->name('affiliate.store.client');
    Route::post('client-details/create/dl-ss/{client}', 'AffiliatesController@storeDLSS')->name('affiliate.storeDLSS');
    Route::post('client-credentials/{clientId}', 'AffiliatesController@storeCredentials')->name('affiliate.storeCredentials');
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



