<?php

namespace App\Http\Controllers;

use App\Services\Screaper;
use Illuminate\Http\Request;
use App\HomePageContent;
use App\Question;
use Illuminate\Support\Facades\Validator;
use App\Faq;
use App\ContactMessage;
use Illuminate\Support\Facades\DB;
use App\Services\ReadPdfData;

class PagesController extends Controller
{
    public function welcome(ReadPdfData $readPdfData)
    {


//        dd(resource_path('scripts/'. 'transunion_dispute.py'));
//        $script_path = resource_path() . '/scripts/transunion_payment_status.py';

        $scraper = new Screaper();
        $arguments = ['ninelgrigoryan', 'N1982inel', 'Zaruhi', 'Hakobyan', '9265_Woodman_Ave_Apt2', 'Arleta', 'CA', '91331', 'johnsofiadavid7@gmail.com', '10/07/1971', "730-26-7353", '‎3238195555', 'True' ];  //
        $arguments = ['A4839kop', 'A91206kop', 'AKOP', 'DEMIRCHYAN', '1155_RAYMOND_AVE_APT_C', 'GLENDALE', 'CA', '91201', 'AKOPDEM@GMAIL.COM', '05/19/1951', "625-58-4839", '‎8185563666', 'false' ];  //

        $scraper->transunion_dispute(22, $arguments);
        $arguments = ['WILLIAM7787', 'a77BOVYAN!', 'Minasyan', '7229', '03/07/1983', '‎‎618-25-2314' ];  //
        $arguments = ['asatryan123', 'Abovyan76', 'ARA', '‎1234', '08/25/1976', '‎‎619-39-6185' ];  //
        $arguments = ['varduhiavagyan@yahoo.com', 'Gabi2155', 'YEREVAN', '2155', '03/21/1972', '‎‎‎602-65-3251' ];  //
//
        $scraper->experian_login(22, $arguments);

//
//        $command_args = array_merge(['python3', $script_path], $arguments);
//        $command = escapeshellcmd(implode( " ", $command_args));
//        $output = shell_exec($command);
//        dd("asd",  $output);

//        $clientReports = $readPdfData->equifaxPdf('C:/xampp/htdocs/tests/public/PDF/eq.pdf');

        $pageContentUp = DB::table('home_pages')->get();

        $slogansFull = Db::table('slogans')
//            ->whereRaw('LENGTH(slogan) < 70')
            ->inRandomOrder()
//            ->limit(5)
            ->select('slogan','author')->get()->toArray();


        $slogans = [];
        foreach ($slogansFull as $key =>$slogan){

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

    public function moreInformation($url)
    {
        $contents = DB::table('home_pages')->where('url', $url)
            ->get();


        return view('more-information', compact('contents'));
    }


    public function creditEducation()
    {
        $title = 'Credit Education';
        $contents = HomePageContent::all();
       return view('credit-education', compact('contents','title'));
    }

//    public function creditEducationInfo($url)
//    {
//        $title = 'Credit Education';
//        $contents = HomePageContent::all();
//        $moreInfo = HomePageContent::where('url', $url)
//            ->get();
//        return view('credit-education', compact('moreInfo', 'contents','title'));
//    }

    public function whoWeAre()
    {
        $title = 'Who We Are';
        return view('who-we-are', compact('title'));
    }

    public function howItWorks()
    {
        $title = 'How It Works';
        return view('how-it-works', compact('title'));
    }

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

    public function contacts()
    {
        $title = 'Contacts us';
        return view('contact', compact('title'));
    }

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

    public function creditRepiarResouces()
    {
        $title = 'Credit Resources';
        return view('credit-resources', compact('title'));
    }

    public function creditFreeRepiar()
    {
        $title = 'Free Credit Repair';
        return view('free-credit-repair', compact('title'));
    }

    public function legalityCreditRepair()
    {
        $title = 'Legality of the Credit Repair';
        return view('legality-credit-repair',compact('title'));
    }

    public function pravicyPolicy()
    {
        $title = 'Privacy Policy';
        return view('privacy-policy', compact('title'));
    }

}
