<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\HomePageContent;
use App\ContactMessage;
use App\Question;
use App\reviews;
use App\Blog;
use App\Faq;
use App\Subcriber;
use Share;


class SubscribeController extends Controller
{

     /**
      * Subscribe Prudent
      *
      */
      public function subscribe_prudent(Request $request)
      {
        $getemail = Subcriber::where('email',$request->email)->first();
        if (!empty($getemail)) {
          return back()->with('error','Email Exist!');
        } else {
          $subscribe = new Subcriber();
          $subscribe->email = $request->email;
          $subscribe->save();
          return back()->with('success','You successfully subcribe!');
        }


      }

}
