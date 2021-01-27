<?php

namespace App\Http\Controllers;
use App\Blog;
use Illuminate\Http\Request;
use App\HomePageContent;
use App\Question;
use Illuminate\Support\Facades\Validator;
use App\Faq;
use App\ContactMessage;
use Illuminate\Support\Facades\DB;


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

        return view('new-home-page1', compact('pageContentUp', 'slogans'));
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

    public function blog()
    {
        $toDay = date('Y-m-d');

        $blogs = Blog::where('published_date', '<',$toDay)->paginate(15);
        return view('blog', compact("blogs"));
    }
    public function blogShow($url)
    {
        $blog = Blog::where('url', $url)->first();
        return view('blog-show', compact("blog"));
    }

}
