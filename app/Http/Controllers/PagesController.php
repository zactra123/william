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

//        $scraper = new Screaper(22);
//        $scraper->transunion_dispute();


//        dd(resource_path('scripts/'. 'transunion_dispute.py'));
//        $script_path = resource_path() . '/scripts/transunion_payment_status.py';
//        $scraper = new Screaper(2);
//        $arguments = ['esemdues@gmail.com', '118-62-7536', implode(',', ['1854037387','‎1316806202','‎0914142484']) ];  //
//        $arguments = ['esemdues@gmail.com', '118-62-7536', implode(',', ['2224037387','2226806202','2224142484']) ];  //
//        $arguments = ['esemdues@gmail.com', '118-62-7536', implode(',', ['0914142484','1316806202','1854037387‎']) ];  //
//        $arguments = ['esemdues@gmail.com', '118-62-7536', implode(',', ['5555142484','5555806202','5555037387‎']) ];  //
//        $arguments = ['GISRAYELYAN@YAHOO.COM', '602-02-5872', implode(',', ['‎0378168296','‎2125935223','2390421947']) ];  //
//        $arguments = ['MNJOYASHOT8@GMAIL.COM', '624-45-0757', implode(',', ['‎2405121431','‎‎2807904228ha']) ];  //
//        'esemdues@gmail.com', '118-62-7536', '0914142484','1316806202','1854037387‎'
//        $scraper->experian_view_report($arguments);
//        $arguments =['salbibazikyan', '9708564vS'];
//        $arguments =['WILLIAM7787', 'a77BOVYAN!'];
//        $arguments =['ramaza9168', 'Ka345678'];
//        $arguments =['Lusinegor', 'Lusine1978'];
//        $scraper->trnsunion_membership( $arguments);

//        $arguments = ['Ponchukyan1986', '123456Ap', 'YEREVAN', '0523', '05/23/1986', '561-89-5564'];  //
//        $arguments = ['Alextutiven10', '!Gisiscool10', 'BUICK', '2823', '01/04/1969', '118-62-7536'];  //
//        $scraper->experian_login( $arguments);
//        $scraper->experian_login(8, $arguments);
//        $arguments = ['ninelgrigoryan', 'N1982inel', 'Zaruhi', 'Hakobyan', '9265_Woodman_Ave_Apt2', 'Arleta', 'CA', '91331', 'johnsofiadavid7@gmail.com', '10/07/1971', "730-26-7353", '‎3238195555', 'True' ];  //
//        $arguments = ['HERMINEM1988', 'M1988OVSESIAN', 'HERMINE', 'MOVSESIAN', '1044_WINCHESTER_AVE_APT_206', 'GLENDALE', 'CA', '91201', 'DINALAVAZARIAN83@AOL.COM', '04/24/1988', "608-49-4069", '8184847243', 'True' ];  //
//
//
//        $scraper->transunion_dispute($arguments);
//        $arguments = ['WILLIAM7787', 'a77BOVYAN!', 'Minasyan', '7229', '03/07/1983', '‎‎618-25-2314' ];  //
//        $arguments = ['asatryan123', 'Abovyan76', 'ARA', '‎1234', '08/25/1976', '‎‎619-39-6185' ];  //
//        $arguments = ['varduhiavagyan@yahoo.com', 'Gabi2155', 'YEREVAN', '2155', '03/21/1972', '‎‎‎602-65-3251' ];  //
//

//
//        $command_args = array_merge(['python3', $script_path], $arguments);
//        $command = escapeshellcmd(implode( " ", $command_args));
//        $output = shell_exec($command);
//        dd("asd",  $output);






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
