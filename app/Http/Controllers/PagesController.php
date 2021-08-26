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
use App\Subcribe;
use Share;


class PagesController extends Controller
{
    /**
     * INDEX PAGE ACTION
     * @receive
     *
     * @return \Illuminate\View\View "new-home-page1" with params
     * @params pageContentUp, slogans
     */
    public function welcome()
    {
        $pageContentUp = DB::table('home_pages')->get();

        $slogansFull = Db::table('slogans')
            ->inRandomOrder()
            ->select('slogan','author')->get()->toArray();

        $slogans = [];
        // Slogans should not be more than 60 characters
        // In case of long slogans divide to array with 60 less strings
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

        $reviews = reviews::where('show_home','yes')->take(3)->get();
        $totalreviews = reviews::all();

        return view('home-page', compact('pageContentUp', 'slogans','reviews','totalreviews'));
    }

    /**
     *CREDIT Education PAGE ACTION
     * @receive url
     *  $url using to get content from home_page_contents table
     *
     * @return \Illuminate\View\View "credit-education" with param
     * @param contents, title
     */

    public function creditEducation()
    {
        $title = 'Credit Education';
        $contents = HomePageContent::all();
        return view('credit-education', compact('contents','title'));
    }
        /**
     *WHO WE ARE PAGE ACTION
     * @receive url
     *
     * @return \Illuminate\View\View "who-we-are" with param
     * @param title
     */
    public function whoWeAre()
    {
        $title = 'Who We Are';
        return view('who-we-are', compact('title'));
    }

    /**
     *HOW IT WORKS PAGE ACTION
     * @receive url
     *
     * @return \Illuminate\View\View "how-it-works" with param
     * @param contents
     */
    public function howItWorks()
    {
        $title = 'How It Works';
        return view('how-it-works', compact('title'));
    }

    /**
     *HOW IT WORKS PAGE ACTION
     * @receive url
     *$url using to get content from faqs table
     * @return \Illuminate\View\View "faqs" with param
     * @param faqs, title
     * @save faqs question on questions table
     */
    public function faqs(Request $request)
    {
        $title = 'FAQs';
        if($request->method() =='GET'){
            $faqs = Faq::paginate(3);
            return view('faqs', compact('faqs', 'title'));
        }
        if($request->post()){
            $validation = Validator::make($request->except('_token'), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'question' => ['required', 'string', 'max:255'],
            ]);
            if ($validation->fails()){
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

    /**
     *Contact Us PAGE ACTION
     * @receive url
     *
     * @return \Illuminate\View\View "contact"
     */
    public function contacts()
    {
        $title = 'Contacts us';
        return view('contact', compact('title'));
    }

    /**
     * Send Contact Mail
     *
     *
     */
     public function sendcontactmail(Request $request)
     {
       session()->put('useremail',$request->email);
       session()->put('username',$request->name);

       $message = $request->messages;

       $data = array(
        'usermessage'=>$message,
      );

       \Mail::send(['html'=>'includes.contactmail'], $data, function($message){
           $message->to('info@prudentscores.com', session()->get('username'))->subject
              ('Contact email from Prudent Scores');
           $message->from(session()->get('useremail'),'Prudent Scores');
        });

       return back()->with('success','Email successfully Send!');
     }

    /**
     *Save contact messages PAGE ACTION
     *
     * @save  contacts messages question on contact_messages table
     */
    public function contactsSendMessage(Request $request)
    {
        $validation = Validator::make($request->contact, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'text' => ['required', 'string', 'max:255'],

        ]);
        if ($validation->fails()){

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

    /**
     *Credit Resources PAGE ACTION
     * @receive url
     *
     * @return \Illuminate\View\View "credit-resources"
     */
    public function creditRepiarResouces()
    {
        $title = 'Credit Resources';
        return view('credit-resources', compact('title'));
    }

    /**
     *Free Credit Repair PAGE ACTION
     * @receive url
     *
     * @return \Illuminate\View\View "free-credit-repair"
     */
    public function creditFreeRepiar()
    {
        $title = 'Free Credit Repair';
        return view('free-credit-repair', compact('title'));
    }

    /**
     *Legality of the Credit Repair PAGE ACTION
     * @receive url
     *
     * @return \Illuminate\View\View "legality-credit-repair"
     */
    public function legalityCreditRepair()
    {
        $title = 'Legality of the Credit Repair';
        return view('legality-credit-repair',compact('title'));
    }

    /**
     *Privacy Policy PAGE ACTION
     * @receive url
     *
     * @return \Illuminate\View\View "privacy-policy"
     */
    public function pravicyPolicy()
    {
        $title = 'Privacy Policy';
        return view('privacy-policy', compact('title'));
    }

    /**
     * News room PAGE ACTION
     * @return \Illuminate\View\View "blog", $blogs(all published blogs with pagination)
     */
    public function blog()
    {
        $today = date('Y-m-d');
        // Show blog based on published date
        $query = Blog::where('published_date', '<=',$today);

        if (!empty($_GET['query'])) {
          $query->where('title','LIKE', '%' . $_GET['query'] . '%');
        }

        $blogs = $query->orderBy('published_date', 'desc')->paginate(10);
        $mostviewes = Blog::orderBy('visited','desc')->take(5)->get();
        return view('blog', compact("blogs","mostviewes"));
    }
    /**
     * Direct News room PAGE ACTION
     * @return \Illuminate\View\View "blog", $blog()
     */
    public function blogShow($url)
    {
        $blog = Blog::where('url', $url)->first();
        // Redirect to Not found if blog not exist
        if(!$blog) {
            return abort(404);
        }

        if ($blog->visited=="") {
            Blog::where('url', $url)->update([
              'visited' => '1'
            ]);
        } else {
          $getvisit = $blog->visited;

          Blog::where('url', $url)->update([
            'visited' => $getvisit+1
          ]);
        }


        return view('blog-show', compact("blog"));
    }

    /**
     * Share Blog via: LINKEDIN, FACEBOOK, TWITTER
     * SOCIAL SHARING
     */
    public function shareSocial($social, $url)
    {
        $blog = Blog::where('url', $url)->first();
        // Redirect to Not found if blog not exist
        if(!$blog) {
            return abort(404);
        }
        // generate sharing url
        $route = url('news-room', ['url'=> $url]);

        if ($social == 'linkedin') {
            return redirect(Share::load($route, $blog->title)->linkedin());
        } elseif ($social == 'facebook') {
            return redirect(Share::load($route, $blog->title)->facebook()) ;
        } elseif ($social == 'twitter') {
            return redirect(Share::load($route, $blog->title)->twitter());
        }
    }

    /**
     *  Review Page
     *
     */
     public function review_page()
     {
       return view('review.create');
     }

     /**
      * Subscribe Prudent
      *
      */
      public function subscribe_prudent(Request $request)
      {
          $subscribe = new Subcribe();
          $subscribe->email = $request->email;
          $subcribe->save();
          return back()->with('success','You successfully subcribe!');
      }

}
