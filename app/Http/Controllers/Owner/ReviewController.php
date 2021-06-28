<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


use Auth;


class ReviewController extends Controller
{
  /**
   * Reviews List
   */
   public function index()
   {
     $reviews = reviews::orderby('id','desc')->paginate(10);
     return view('owner.review.index',compact('reviews'));
   }

   /**
    * Delete Review
    */
    public function delete($id)
    {
      $review = reviews::where('id',$id)->delete();
      return back()->with('success','You successfully delete review');
    }

    /**
     * Show Review on Home Page
     */
     public function show($id)
     {
       reviews::where('id',$id)->update([
         'show_home'=>'yes'
       ]);
       return back()->with('success','You successfully show review on home page!');
     }

     /**
      * Hide Review on Home Page
      */
      public function hide($id)
      {
        reviews::where('id',$id)->update([
          'show_home'=>'no'
        ]);
        return back()->with('success','You successfully hide review on home page!');
      }

}
