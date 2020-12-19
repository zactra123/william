<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ReceptionistLiveChat;
use App\Jobs\ScrapeReports;
use App\ScraperError;
use App\User;
use App\BankAddress;
use App\Services\Screaper;
use Illuminate\Http\Request;
use App\HomePageContent;
use App\Question;
use Illuminate\Support\Facades\Validator;
use App\Faq;
use App\ContactMessage;
use Illuminate\Support\Facades\DB;
use App\Guest;
use App\Services\ReadPdfData;
use Response;

class PagesController extends Controller
{

    public function welcome()
    {
        $pageContentUp = DB::table('home_pages')->get();

        $slogansFull = Db::table('slogans')
//            ->whereRaw('LENGTH(slogan) < 70')
            ->inRandomOrder()
//            ->limit(5)
            ->select('slogan','author')->get()->toArray();


        $slogans = [];
        foreach ($slogansFull as $key =>$slogan) {

            $slogans [$key]['author'] = $slogan->author;
            if (strlen($slogan->slogan) < 60) {
                $slogans [$key]['slogan'][]  = $slogan->slogan;
                continue;
            }
            $texts = explode(' ', $slogan->slogan);
            $textSlogan = [];
            $k = 0;
                foreach($texts as $w => $text){
                    if($w == 0){
                        $textSlogan[$k] = $text;
                    }elseif(strlen($textSlogan[$k])<60){

                        $textSlogan[$k] = $textSlogan[$k]." ". $text;
                    }else{
                        $k = $k+1;
                        $textSlogan[$k] = $text;
                    }


                }
            $slogans[$key]['slogan'] = $textSlogan;
        }

        return view('new-home-page1', compact('pageContentUp', 'slogans'));
    }

    public function moreInformation($url)
    {
        $contents = DB::table('home_pages')->where('url', $url)
            ->get();


        return view('more-information', compact('contents'));
    }


    public function creditEducation()
    {
        $title = 'Credit Education';
        $contents = HomePageContent::all();
        return view('credit-education', compact('contents','title'));
    }

//    public function creditEducationInfo($url)
//    {
//        $title = 'Credit Education';
//        $contents = HomePageContent::all();
//        $moreInfo = HomePageContent::where('url', $url)
//            ->get();
//        return view('credit-education', compact('moreInfo', 'contents','title'));
//    }

    public function whoWeAre()
    {
        $title = 'Who We Are';
        return view('who-we-are', compact('title'));
    }

    public function howItWorks()
    {
        $title = 'How It Works';
        return view('how-it-works', compact('title'));
    }

    public function faqs(Request $request)
    {
        $title = 'FAQs';
        if($request->method() =='GET'){

            $faqs = Faq::all();
            return view('faqs', compact('faqs', 'title'));
        }
        if($request->post()){
            $validation = Validator::make($request->except('_token'), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'question' => ['required', 'string', 'max:255'],
            ]);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            }else{
                Question::create($request->except('_token'));
                return redirect()->back()
                    ->withInput()
                    ->with('success','Your email has been successfully sent');
            }
        }
    }

    public function contacts()
    {
        $title = 'Contacts us';
        return view('contact', compact('title'));
    }

    public function contactsSendMessage(Request $request)
    {

        $validation = Validator::make($request->contact, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'text' => ['required', 'string', 'max:255'],

        ]);
        if ($validation->fails()) {

            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }else{

            ContactMessage::create($request->contact);
            return redirect()->back()
                ->withInput()
                ->with('success','Your email has been successfully sent');
        }
    }

    public function creditRepiarResouces()
    {
        $title = 'Credit Resources';
        return view('credit-resources', compact('title'));
    }

    public function creditFreeRepiar()
    {
        $title = 'Free Credit Repair';
        return view('free-credit-repair', compact('title'));
    }

    public function legalityCreditRepair()
    {
        $title = 'Legality of the Credit Repair';
        return view('legality-credit-repair',compact('title'));
    }

    public function pravicyPolicy()
    {
        $title = 'Privacy Policy';
        return view('privacy-policy', compact('title'));
    }

}
