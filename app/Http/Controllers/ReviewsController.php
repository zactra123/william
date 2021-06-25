<?php

namespace App\Http\Controllers;

use App\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Auth;


class ReviewsController extends Controller
{
  /**
   * Store Review
   */
   public function store(Request $request)
   {

     if ($request->rating=='0') {
       return back()->with('error','Please add rating and try again!');
     }

     $review = new reviews();
     if (Auth::check()) {
       $review->user_id = Auth::user()->id;
     }
     $review->name = $request->name;
     $review->email = $request->email;
     $review->rating = $request->rating;
     $review->review = $request->review;
     $review->save();

     return back()->with('success','You successfully add review!');

   }


   /**
    * Reviews List
    */
    public function show()
    {
      $review = reviews::orderby('id')->get();
      return view('review.index',compact('review'));

    }
}
