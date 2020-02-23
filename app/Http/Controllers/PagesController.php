<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ReceptionistLiveChat;
use App\User;
use Illuminate\Http\Request;
use App\HomePageContent;
use App\Question;
use Illuminate\Support\Facades\Validator;
use App\Faq;
use App\Guest;

class PagesController extends Controller
{
    public function welcome()
    {
        $ch = Chat::find(5);
        broadcast(new ReceptionistLiveChat($ch));
        dd('asd');
        $pageContentUp = HomePageContent::where('category', 1)->get();
        $pageContentDown = HomePageContent::where('category', 2)->get();


        return view('welcome', compact('pageContentUp', 'pageContentDown'));
    }

    public function moreInformation($url)
    {
        $content = HomePageContent::where('url', $url)
            ->get();

        return view('more-information', compact('contents', 'content'));
    }


    public function creditEducation()
    {
        $contents = HomePageContent::all();
       return view('credit-education', compact('contents'));
    }

    public function creditEducationInfo($url)
    {
        $contents = HomePageContent::all();
        $moreInfo = HomePageContent::where('url', $url)
            ->get();
        return view('credit-education', compact('moreInfo', 'contents'));
    }

    public function whoWeAre()
    {
        return view('who-we-are');
    }

    public function howItWorks()
    {

        return view('how-it-works');
    }

    public function faqs(Request $request)
    {

        if($request->method() =='GET'){

            $faqs = Faq::all();

            return view('faqs', compact('faqs'));
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

        return view('contact');
    }


}
