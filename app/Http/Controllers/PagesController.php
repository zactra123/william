<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePageContent;
use App\Question;
use Illuminate\Support\Facades\Validator;
use App\Faq;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function welcome()
    {
        $pageContentUp = DB::table('home_pages')->get();

        return view('welcome', compact('pageContentUp'));
    }

    public function moreInformation($url)
    {
        $contents = DB::table('home_pages')->where('url', $url)
            ->get();


        return view('more-information', compact('contents'));
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

    public function creditRepiarResouces()
    {

        return view('credit-resources');
    }

    public function creditFreeRepiar()
    {
        return view('free-credit-repair');
    }

    public function pravicyPolicy()
    {
        return view('privacy-policy');
    }

}
