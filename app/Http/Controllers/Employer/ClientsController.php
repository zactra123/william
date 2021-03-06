<?php

namespace App\Http\Controllers\Employer;
use App\Http\Controllers\Controller;
use App\ClientAttachment;
use App\ClientDetail;
use App\ClientReport;
use App\Credential;
use App\Jobs\ScrapeReports;
use App\Mail\SendMailClient;
use App\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use PDF;
use function Sodium\compare;

class ClientsController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth', 'admins']);
        $this->middleware('auth');
    }

    public function clientList()
    {
        $users = DB::table('users')
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.email as email',
                DB::raw('CONCAT(users.last_name, " ",users.first_name) AS full_name'),
                DB::raw('CONCAT(u.last_name, " ",u.first_name) AS affiliate_name'))
            ->where('users.role', 'client')
            ->paginate(10);

        return view('employer.client.list', compact( 'users'));
    }

    public function profile($clientId)
    {
        $client = User::clients()->find($clientId);
        $toDos = Todo::where('client_id', $clientId)->get();
        $user = User::where('role', 'admin')->get()->pluck('full_name', 'id')->toArray();

        $zodiac = $this->getZodiac($client->clientDetails->dob);
        // $getdob = ClientDetail::where('user_id',$clientId)->first();
        // $zodiac = $this->getZodiac($getdob->dob);
        return view('employer.client.profile', compact('client', 'user','toDos', 'zodiac'));
    }

    public function clientReport(Request $request)
    {
        $clientReportsEQ = null;
        $clientReportsTU = null;
        $clientReportsEX = null;
        if($request->date !=null){
            $clientReports = ClientReport::where('id',$request->date);
        }else{
            $clientReports = ClientReport::where('user_id',$request->client);
        }

        if($request->type == 'equifax'){
            $clientReportsEQ = $clientReports->where('type', "EQ")->first();
            $equifaxDate =$clientReports->where('type', "EQ")
                ->pluck('created_at', 'id')->toArray();
        }elseif($request->type == 'transunion'){
            $clientReportsTU = $clientReports->where('type', "TU_DIS")->first();
            $transunionDate = $clientReports->where('type', "TU")
                ->pluck('created_at', 'id')->toArray();

        }elseif($request->type == 'experian'){
            $clientReportsEX = $clientReports->where('type', "EX_LOG")->first();
            $experianDate = $clientReports->where('type', "EX_LOG")
                ->pluck('created_at', 'id')->toArray();
        }

        return view('employer.client.report', compact('clientReportsEX','clientReportsTU', 'clientReportsEQ',
            'equifaxDate','experianDate','transunionDate'));
    }

    public function updateClient(Request $request, $id)
    {
        if(empty($request->file()) && is_null($request->client)){
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please upload both files');
        }

        if($request->file() == true){

            if (empty($request['driver']) && empty($request['social'])) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Please upload both files');
            }
            if(!empty($request['driver'])){
                $imagesDriverLicense = $request->file("driver");

                $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
                $driverLicenseExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());

                if (!in_array($driverLicenseExtension, $imageExtension)) {
                    return redirect()->back()->with('error', 'Please upload the correct file format (PDF, PNG, JPG)');
                }

                $path = "files/client/details/image/" . $id . "/";

                $nameDriverLicense = 'driver_license.' . $driverLicenseExtension;

                $pathDriverLicense = '/' . $path . $nameDriverLicense;

                $clientAttachmentDataDL = [

                    'user_id' => $id,
                    'path' => $pathDriverLicense,
                    'file_name' => $nameDriverLicense,
                    'category' => 'DL',
                    'type' => $driverLicenseExtension

                ];
                $clientAttachment = ClientAttachment::where('user_id', $id)->where('category', 'DL');

                if(empty($clientAttachment->first())){
                    ClientAttachment::insert($clientAttachmentDataDL);
                }else{
                    if(file_exists($clientAttachment->first()->path)){
                        unlink($clientAttachment->first()->path);
                    }
                    $clientAttachment->update($clientAttachmentDataDL);

                }
                $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
            }
            if(!empty($request['social'])){
                $imagesDriverLicense = $request->file("social");

                $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
                $socialSecurityExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());

                if (!in_array($socialSecurityExtension, $imageExtension)) {
                    return redirect()->back()->with('error', 'Please upload the correct file format (PDF, PNG, JPG)');
                }

                $path = "files/client/details/image/" . $id . "/";

                $nameSocialSecurity = 'social_security.' . $socialSecurityExtension;

                $pathSocialSecurity = '/' . $path . $nameSocialSecurity;

                $clientAttachmentDataSS = [
                    'user_id' => $id,
                    'path' => $pathSocialSecurity,
                    'file_name' => $nameSocialSecurity,
                    'category' => 'SS',
                    'type' => $socialSecurityExtension
                ];
                $clientAttachmentSS = ClientAttachment::where('user_id', $id)->where('category', 'SS');
                if(empty($clientAttachmentSS->first())){
                    ClientAttachment::insert($clientAttachmentDataSS);
                }else{
                    if(file_exists($clientAttachment->first()->path)){
                        unlink($clientAttachment->first()->path);
                    }
                    $clientAttachment->update($clientAttachmentDataSS);

                }
                $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
            }

            return redirect()->route('adminRec.client.profile', ['client'=>$id]);

        }else{
            $data = $request->client;
            $data["sex"] = isset($data["sex"]) ? $data["sex"] : $data["sex_uploaded"];
            $full_name = explode(" ", $data["full_name"]);
            $data["first_name"] = array_shift($full_name);
            $data["last_name"] = implode(" ", $full_name);

            $validation = Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'sex' => ['required'],
                'address' => ['required', 'string', 'max:255'],
            ]);

            if ($validation->fails()) {
                // return view('todo.profile.create')->withErrors($validation);
                return view('todo.profile.create')->with('error','Your fields are is empty please add data in it!');
            } else {

                $user = Arr::only($data, ['first_name', 'last_name']);
                $clientDetails = Arr::except($data, ['full_name', 'first_name', 'last_name', 'sex_uploaded']);

                $splitAddress = $this->splitAddress(str_replace([", USA", ",USA"], '', strtoupper($data['address'])));
                $client_details = ClientDetail::where('user_id', $id)->first();

                preg_match("/([0-9]{1,})/im", $splitAddress['street'], $number);

                $clientDetails ["number"] = isset($number[0]) ? $number[0] : '';
                $clientDetails['name'] = isset($number[0]) ? trim(str_replace($number[0], '', $splitAddress['street'])) : '';
                $clientDetails['city'] = $splitAddress['city'];
                $clientDetails['state'] = $splitAddress['state'];
                $clientDetails['zip'] =$splitAddress['zip'];
                $clientDetails['address'] = strtoupper($data['address']);
                $clientDetails['registration_steps'] = "finished";

                $client = User::find($id);
                $client->update([
                    'first_name' => strtoupper($user['first_name']),
                    'last_name' => strtoupper($user['last_name'])
                ]);
                $client_details->update($clientDetails);

                return redirect(route('adminRec.client.profile', ['client'=>$id]))->with('success', "your data saved");
            }
        }

    }

    public function credentials(Request $request, $id)
    {
        $client = User::find($id);
        $source = $request->source;
        return view('employer.client.credentials', compact('client', 'source'));
    }

    public function credentialsUpdate(Request $request)
    {
        $userId = $request->id;
        $data = $request['client'];
        $data['user_id'] = $userId;

        if (empty(Credential::where('user_id', $userId)->first())) {
            Credential::create($data);
        } else {
            Credential::where('user_id', $userId)->update($data);
        }
        $clientDetails = ClientDetail::where('user_id', $userId)->first();
        if (!empty($clientDetails) && $clientDetails->registration_steps == 'credentials') {
            $clientDetails->update(["registration_steps" => "review"]);
        }
        return redirect(route('adminRec.client.profile', $userId));
    }

    public function affiliateList()
    {
        $users = DB::table('users')
            ->leftJoin('affiliates', 'affiliate_id', '=', 'users.id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('COUNT(affiliates.affiliate_id) as client'))
            ->where('role', 'affiliate')
            ->groupBy('users.id')
            ->paginate(10);
        return view('employer.client.affiliate', compact('users'));
    }

    public function affiliateProfile($affiliateId)
    {
        $affiliate = User::whereId($affiliateId)->where('role', 'affiliate')->first();

        $clients = DB::table('affiliates')
            ->join('users', 'affiliates.user_id', '=', 'users.id')
            ->where('affiliates.affiliate_id', $affiliateId)
            ->select('users.id as id', DB::raw('CONCAT(users.first_name ," ", users.last_name) as full_name'),
                'users.email')
            ->get();
        return view('employer.client.affiliate-profile', compact('affiliate', 'clients'));
    }

    public function sendEmail(Request $request)
    {
        set_time_limit(300);

        $client = $request->client;
        $subject = $request->subject;
        $description = $request->description;
        $file = $request->file('attach');
        $path = null;
        $as = null;
        $mime =null;
        if($file){
            $path = $file->getRealPath();
            $as =  $file->getClientOriginalName();
            $mime = $file->getMimeType();
        }
        $user = User::find($client);
        $data = ['user'=>$user, 'subject'=>$subject, 'description'=>$description, 'path'=>$path, 'as'=>$as, 'mime'=> $mime];

        Mail::send(new SendMailClient($data));
        return redirect(route('adminRec.client.profile', $user->id));
    }

    public function printPdfClientProfile($id)
    {

        $client = User::clients()->find($id);
        $pdf = PDF::loadView('admin.client-profile-pdf', compact('client'));
        return $pdf->download('invoice.pdf');
        return view('admin.client-profile-pdf', compact('client'));

        dd($client);

        $client = User::clients()->find($id);
        $pdf = PDF::loadView('todo.profile-pdf', compact('client'));

        return $pdf->download(public_path('client_data/profile.pdf'));


        dd('asdad');
        return view('todo.client', compact('client'));

        $pdf = $pdf->setPaper('a4', 'portrait');

        return  $pdf->stream('client-profile'.$id.'.pdf');
        return view('admin.client-profile-pdf', compact('client'));

        return $pdf->download('client-profile'.$id.'.pdf');

    }

    public function queueReport (Request $request)
    {

        $clientId = $request->client_id;
        $bureau = $request->bureau;
        $client = User::where('id', $clientId)->first();

        if ($client->credentials->ex_present() && $bureau == "EXLOGIN") {
            ScrapeReports::dispatch($client, [], 'experian_login');
            return response()->json(['status' => 'success']);
        }elseif ($client->credentials->tu_present() && $bureau == "TUDISPUTE") {
            ScrapeReports::dispatch($client, [], 'transunion_dispute');
            return response()->json(['status' => 'success']);
        }elseif($client->credentials->tu_dis_present() && $bureau == "TUMEMBER") {
            ScrapeReports::dispatch($client, [], 'transunion_membership');
            return response()->json(['status' => 'success']);
        }elseif ($client->credentials->ck_present() && $bureau == "EQ"){
            ScrapeReports::dispatch($client, [], 'equifax_via_credit_karma');
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'error']);
        }

    }

    public function getZodiac($date)
    {
        $year = date('Y', strtotime($date));
        $month = date('m', strtotime($date));
        $day = date('d', strtotime($date));

        switch (($year - 4) % 12) {
            case  0: $zodiacYear = 'Rat';
              break;
            case  1: $zodiacYear = 'Ox';
              break;
            case  2: $zodiacYear = 'Tiger';
              break;
            case  3: $zodiacYear = 'Rabbit';
              break;
            case  4: $zodiacYear = 'Dragon';
              break;
            case  5: $zodiacYear = 'Snake';
              break;
            case  6: $zodiacYear = 'Horse';
              break;
            case  7: $zodiacYear = 'Goat';
              break;
            case  8: $zodiacYear = 'Monkey';
              break;
            case  9: $zodiacYear = 'Rooster';
              break;
            case 10: $zodiacYear = 'Dog';
              break;
            case 11: $zodiacYear = 'Pig';
              break;
        }

        if ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) {
          $zodiacMonth = "Aries";
        } elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) {
           $zodiacMonth = "Taurus";
        } elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) {
           $zodiacMonth = "Gemini";
         } elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) {
           $zodiacMonth = "Cancer";
         } elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) {
           $zodiacMonth = "Leo";
         } elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) {
           $zodiacMonth = "Virgo";
         } elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) {
           $zodiacMonth = "Libra";
         } elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) {
           $zodiacMonth = "Scorpio";
         } elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) {
           $zodiacMonth = "Sagittarius";
         } elseif ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) {
           $zodiacMonth = "Capricorn";
         } elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) {
           $zodiacMonth = "Aquarius";
         } elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) {
           $zodiacMonth = "Pisces";
         }

        if ( $month == 1  ) {
          $zodiacStone = "Garnet";
        } elseif ( $month == 2 ) {
          $zodiacStone = "Amethyst";
        } elseif ( $month == 3  ){
          $zodiacStone = "Aquamarine, Bloodstone";
        } elseif ( $month == 4  ) {
          $zodiacStone = "Diamond";
        } elseif ( $month == 5  ) {
          $zodiacStone = "Emerald";
        } elseif ( $month == 6  ) {
          $zodiacStone = "Pearl, Moonstone, Alexandrite	";
        } elseif ( $month == 7  ) {
          $zodiacStone = "Ruby";
        } elseif ( $month == 8  ) {
          $zodiacStone = "Pperidot, Spinel";
        } elseif ( $month == 9  ) {
          $zodiacStone = "Sapphire";
        } elseif ( $month == 10  )  {
          $zodiacStone = "Opal, Tourmaline";
        } elseif ( $month == 11 ) {
          $zodiacStone = "Topaz, Citrine";
        } elseif( $month == 12 ) {
          $zodiacStone = "Turquoise, Zircon, Tanzanite";
        }

        return ["month"=>$zodiacMonth, "year"=>$zodiacYear, "stone"=>$zodiacStone];

    }

    public function splitAddress($address)
    {
        $addressState = "/.+?(AL|AK|AS|AZ|AR|CA|CO|CT|DE|DC|FM|FL|GA|GU|HI|ID|IL|IN|IA|KS|KY|LA|ME|MH|MD|MA|MI|MN|MS|MO|
                    MT|NE|NV|NH|NJ|NM|NY|NC|ND|MP|OH|OK|OR|PW|PA|PR|RI|SC|SD|TN|TX|UT|VT|VI|VA|WA|WV|WI|WY)+\s+\b[0-9]{5}/";

        preg_match($addressState, $address, $matcheSate);
        $state = isset($matcheSate[1])?$matcheSate[1]:null;

        if($state != null){
            $explodeAddress = explode(' '.$state.' ', $address);
            $zipCode = isset($explodeAddress[1])?trim($explodeAddress[1]):null;
            $city = null;
            $street = null;
            $aptRegex = "/(apt[A-z0-9]{1,2}\s|apt[A-z0-9]{1,2}\,|apt\s[A-z0-9]{1,2}\s|apt\s\#\s[A-z0-9]{1,2}\s|apt\s\#[A-z0-9]{1,2}\s|\#\s[A-z0-9]{1,2}\s|apta[A-z0-9]{1,2}\s|apta\s[A-z0-9]{1,2}\s|\#[A-z0-9]{1,2}|\#\s[A-z0-9]{1,2}|APTA\-[A-Z0-9]{1,2}|APTA\s\-[A-Z0-9]{1,2}|APTA\-\s[A-Z0-9]{1,2}|bsmt[A-z0-9]{1,2}|bsmt\s[A-z0-9]{1,2}|bldg[A-z0-9]{1,2}|bldg\s[A-z0-9]{1,2}|dept[A-z0-9]{1,2}|dept\s[A-z0-9]{1,2}|fl[A-z0-9]{1,2}|FL [A-z0-9]{1,2}|frnt[A-z0-9]{1,2}|frnt\s[A-z0-9]{1,2}|hngr[A-z0-9]{1,2}|hngr\s[A-z0-9]{1,2}|key[A-z0-9]{1,2}|key\s[A-z0-9]{1,2}|lbby[A-z0-9]{1,2}|lbby\s[A-z0-9]{1,2}|lot[A-z0-9]{1,2}|lot\s[A-z0-9]{1,2}|lowr[A-z0-9]{1,2}|lowr\s[A-z0-9]{1,2}|ofc[A-z0-9]{1,2}|ofc\s[A-z0-9]{1,2}|ph[A-z0-9]{1,2}|ph\s[A-z0-9]{1,2}|pier[A-z0-9]{1,2}|pier\s[A-z0-9]{1,2}|rear[A-z0-9]{1,2}|rear\s[A-z0-9]{1,2}|rm[A-z0-9]{1,2}|rm\s[A-z0-9]{1,2}|side[A-z0-9]{1,2}|side\s[A-z0-9]{1,2}|slip[A-z0-9]{1,2}|slip\s[A-z0-9]{1,2}|stop[A-z0-9]{1,2}|stop\s[A-z0-9]{1,2}|ste[A-z0-9]{1,2}|ste\s[A-z0-9]{1,2}|TRLR[A-z0-9]{1,2}|TRLR\s[A-z0-9]{1,2}|UNIT[A-z0-9]{1,2}|UNIT\s[A-z0-9]{1,2}|UPPR[A-z0-9]{1,2}|UPPR\s[A-z0-9]{1,2})/i";
            $addressStreet = "/(STE+\s+[0-9]{1,}|street|st|AVENUE|AVE|PLACE|PL|ROAD|RD|SQUARE|SQ|Boulevard|BLVD|TERRACE|TER|Drive|DR|Court|CT|Building|BLDG|lane|ln|way)/i";

            $poBoxReg = '/(.|)+(P\.O\. BOX|POB|PO BOX|PO Box|P O Box)\s[0-9]{1,}\s/im';
            preg_match($poBoxReg, $explodeAddress[0], $matchesPoBox);

            if(isset($matchesPoBox[0])){
                $street = isset($matchesPoBox[0])?trim($matchesPoBox[0]):null;
                $city = trim(str_replace([$street, ','], '', $explodeAddress[0]));
                return [
                    'street'=>$street,
                    'state'=>$state,
                    'city'=>$city,
                    'zip'=>$zipCode,
                ];
            }else{
                preg_match($aptRegex, $explodeAddress[0], $matchesApt);
                if(isset($matchesApt[0])){
                    $streetCity = explode($matchesApt[0], $explodeAddress[0]);
                    $city = isset($streetCity[1])?trim(str_replace(",","",$streetCity[1])):null;
                    $street = trim($streetCity[0].$matchesApt[0]);
                }else{
                    preg_match_all($addressStreet, $explodeAddress[0], $matchesStreet);
                    if (!empty($matchesStreet[0])) {
                        $streetCity = explode($matchesStreet[0][count($matchesStreet[0])-1], $explodeAddress[0]);
                        $city = isset($streetCity[1])?trim(str_replace(",","",$streetCity[1])):null;
                        $street = trim($streetCity[0].$matchesStreet[0][count($matchesStreet[0])-1]);
                    }
                }
                return [
                    'street'=>$street,
                    'state'=>$state,
                    'city'=>$city,
                    'zip'=>$zipCode,
                ];
            }
        }else{
            return [
                'street'=>null,
                'state'=>$state,
                'city'=>null,
                'zip'=>null,
            ];
        }
    }

}
