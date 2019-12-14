<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function contacts()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about-us');
    }
}
