<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePageContent;

class PagesController extends Controller
{
    public function welcome()
    {
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
        return view('who-we-are')  ;
    }


    public function contacts()
    {

        return view('contact');
    }

    public function about()
    {
        return view('about-us');
    }
}
