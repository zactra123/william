<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomePageContent;

class PagesController extends Controller
{
    public function welcome()
    {
        $pageContents = HomePageContent::all();

        return view('welcome', compact('pageContents'));
    }

    public function moreInformation($id)
    {
        $contents = HomePageContent::where('id', $id)
            ->get();

        return view('more-information', compact('contents'));

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
