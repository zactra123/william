<?php

namespace App\Http\Controllers;

use App\ClientReport;
use App\ClientReportAddress;
use App\ClientReportExAccount;
use App\ClientReportExInquiry;
use App\ClientReportExPublicRecord;
use App\ClientReportExStatement;
use App\ClientReportName;
use App\ClientReportPhone;
use App\ClientReportTuAccount;
use App\ClientReportTuInquiry;
use App\ClientReportTuPublicRecord;
use App\ClientReportTuStatement;
use App\Services\Escrow;
use App\Services\ReadPdfData;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use App\User;
use App\ClientDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Services\ClientDetailsData;
use App\Services\CreditReportUpload;
use App\ClientAttachment;
use App\Credential;
use App\UploadClientDetail;
use App\Services\Screaper;
use PhpOffice\PhpWord\Element\Image;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\SimpleType\TblWidth;

class ClientDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('client', ['except' => 'store']);
    }

    public function index(Escrow $escrow)
    {
        $client = Auth::user();
        return view('client_details.index', compact('client'));
    }

    public function create(Request $request)
    {
        $client = Auth::user();

        if ($client->clientAttachments->whereIn("category", ["DL", "SS"])->count() == 2) {
            if ($request->skip) {
                $client->clientDetails->update(["registration_steps" => "credentials"]);
            }
        }
        $uploadUserDetail = UploadClientDetail::where('user_id', $client->id)->first();
        return view('client_details.create', compact('client', 'uploadUserDetail'));
    }

    public function store(Request $request)
    {
        $data = $request->client;
        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'sex' => ['required'],
            'ssn' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {

            return view('client_details.create')->withErrors($validation);
        } else {

            $id = Auth::user()->id;
            $user = Arr::only($request->client, ['first_name', 'last_name']);
            $clientDetails = Arr::except($request->client, ['first_name', 'last_name']);
            $clientDetails["user_id"] = $id;

//            User::where('id', $id)->update($user);

            if (empty(ClientDetail::where('user_id', $id)->first())) {
                ClientDetail::create($clientDetails);
            } else {
                ClientDetail::where('user_id', $id)->update($clientDetails);
            }

            return redirect(route('client.details.index'))->with('success', "your data saved");
        }
    }

    public function edit($id, Request $request)
    {
        $client = Auth::user();

        $uploadUserDetail = UploadClientDetail::where('user_id', $client->id)->first();
        if (!empty($uploadUserDetail)) {
            return view('client_details.edit', compact('client'));
        }
        return view('client_details.edit', compact('client'));
    }

    public function update(Request $request)
    {
        $data = $request->client;
        $data["sex"] = isset($data["sex"]) ? $data["sex"] : $data["sex_uploaded"];
        $full_name = explode(" ", $data["full_name"]);
        $data["first_name"] = array_shift($full_name);
        $data["last_name"] = implode(" ", $full_name);
        $id = Auth::user()->id;
        $uploaded = UploadClientDetail::where("user_id", $id);

        $validation = Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'dob' => ['required'],
            'sex' => ['required'],
            'ssn' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if ($validation->fails()) {

            if (!empty($uploaded)) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            }
            return view('client_details.create')->withErrors($validation);
        } else {

            $user = Arr::only($data, ['first_name', 'last_name']);
            $clientDetails = Arr::except($data, ['full_name', 'first_name', 'last_name', 'sex_uploaded']);


            $fullAddress = explode(',', str_replace([", USA", ",USA"], '', strtoupper($data['address'])));
            if (isset($fullAddress[2])) {
                preg_match('/[A-Z]{2}/m', $fullAddress[2], $match);
                $state = isset($match[0]) ? $match[0] : null;
                $zip = str_replace([$state, ' '], '', $fullAddress[2]);
            }

            $client_details = ClientDetail::where('user_id', $id)->first();
            $registration_steps = $client_details->registration_steps;

            preg_match("/([0-9]{1,})/im", $fullAddress[0], $number);
            $clientDetails ["number"] = $number[0];
            $clientDetails['name'] = trim(str_replace($number[0], '', $fullAddress[0]));
            $clientDetails['city'] = isset($fullAddress[1]) ? trim($fullAddress[1]) : null;
            $clientDetails['state'] = isset($state) ? $state : null;
            $clientDetails['zip'] = isset($zip) ? $zip : null;
            $clientDetails['address'] = strtoupper($data['address']);
            $clientDetails['registration_steps'] = "finished";

            User::where('id', $id)->update([
                'first_name' => strtoupper($user['first_name']),
                'last_name' => strtoupper($user['last_name'])
            ]);
            $client_details->update($clientDetails);
            $uploaded->delete();
            if ($registration_steps == 'review') {
                return redirect(route('client.details.create'));
            }
            return redirect(route('client.details.index'))->with('success', "your data saved");

        }
    }

    public function credentials()
    {
        $client = Auth::user();
        return view('client_details.create-credentials', compact('client'));
    }

    public function credentialsStore(Request $request)
    {

        $userId = Auth::user()->id;
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

        return redirect('client/details');
    }

    public function addDlSs()
    {
        $client = Auth::user();
        return view('client_details.upload-dl-ss', compact("client"));
    }

    //create or update for client details

    public function storeDlSs(Request $request, ClientDetailsData $clientDetailsData)
    {

        $client = Auth::user()->id;
        if (empty($request['driver_license']) || empty($request['social_security'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please upload both files');
        }

        $imagesDriverLicense = $request->file("driver_license");
        $imagesSocialSecurity = $request->file("social_security");


        $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        $driverLicenseExtension = strtolower($imagesDriverLicense->getClientOriginalExtension());
        $socialSecurityExtension = strtolower($imagesSocialSecurity->getClientOriginalExtension());

        if (!in_array($driverLicenseExtension, $imageExtension) || !in_array($socialSecurityExtension, $imageExtension)) {
            return redirect()->back()->with('error', 'Please upload the correct file format (PDF, PNG, JPG)');
        }

        $path = "files/client/details/image/" . $client . "/";

        $nameDriverLicense = 'driver_license.' . $driverLicenseExtension;
        $nameSocialSecurity = 'social_security.' . $socialSecurityExtension;


        $imagesDriverLicense->move(public_path() . '/' . $path, $nameDriverLicense);
        $imagesSocialSecurity->move(public_path() . '/' . $path, $nameSocialSecurity);

        $pathDriverLicense = public_path() . '/' . $path . $nameDriverLicense;
        $pathSocialSecurity = public_path() . '/' . $path . $nameSocialSecurity;


        $resultDriverLicense = $clientDetailsData->getImageDriverLicense($pathDriverLicense, $nameDriverLicense, $driverLicenseExtension);
        $resultSocialSecurity = $clientDetailsData->getImageSocialSecurity($pathSocialSecurity, $nameSocialSecurity, $socialSecurityExtension);

        $user = Arr::only($resultSocialSecurity, ['first_name', 'last_name']);
        $clientData = $resultDriverLicense;
        $clientData['ssn'] = isset($resultSocialSecurity['ssn']) ? $resultSocialSecurity['ssn'] : '';
        $clientData["dob"] = isset($clientData['dob']) ? date('Y-m-d', strtotime($clientData['dob'])) : '';
        $clientData['user_id'] = $client;


        $clientAttachmentData = [
            [
                'user_id' => $client,
                'path' => $pathDriverLicense,
                'file_name' => $nameDriverLicense,
                'category' => 'DL',
                'type' => $driverLicenseExtension
            ],
            [
                'user_id' => $client,
                'path' => $pathSocialSecurity,
                'file_name' => $nameSocialSecurity,
                'category' => 'SS',
                'type' => $socialSecurityExtension
            ]
        ];

        if (empty(ClientAttachment::where('user_id', $client)->first())) {
            ClientAttachment::insert($clientAttachmentData);
        } elseif (empty(ClientAttachment::where('user_id', $client)->where('category', 'DL')->first())) {

            ClientAttachment::insert($clientAttachmentData[0]);
            ClientAttachment::where('user_id', $client)->where('category', 'SS')->update($clientAttachmentData[1]);
        } elseif (empty(ClientAttachment::where('user_id', $client)->where('category', 'SS')->first())) {

            ClientAttachment::insert($clientAttachmentData[1]);
            ClientAttachment::where('user_id', $client)->where('category', 'DL')->update($clientAttachmentData[0]);
        } else {
            ClientAttachment::where('user_id', $client)->where('category', 'DL')->update($clientAttachmentData[0]);
            ClientAttachment::where('user_id', $client)->where('category', 'SS')->update($clientAttachmentData[1]);

        }
        $c = Auth::user();

//        if(count($resultDriverLicense) != 9 || count($resultSocialSecurity) != 3){
//            $request->session()->put('bad',true);
//        }elseif ($c->clientDetails->registration_steps =='documents') {
//            $c->clientDetails->update(['registration_steps'=>'credentials']);
//        }

        if ($c->clientDetails->registration_steps == 'documents') {
            $c->clientDetails->update(['registration_steps' => 'credentials']);
        }
//        $request->session()->put('bad',true);


        if (empty(ClientDetail::where('user_id', $client)->first())) {
            User::where('id', $client)->update($user);
            ClientDetail::create($clientData);
        } else {
            UploadClientDetail::insert(array_merge($user, $clientData));
        }
        return redirect(route('client.details.edit', compact('client')))->with('success', "Please check your data");

    }

    public function uploadCreditReports()
    {
        return view('client_details.upload-credit-reports');
    }

    public function uploadPdf(Request $request, ReadPdfData $readPdfData, CreditReportUpload $creditReportUpload)
    {

        if (empty($request->file())) {
            return redirect('/client/details/upload-credit-reports')->with('error', 'Please upload files');
        }
        $validationUploadPdf = $creditReportUpload->validate($request['credit_report']);

        if ($validationUploadPdf[0] == 'error') {
            return redirect('/client/details/upload-credit-reports')->with('error', $validationUploadPdf[1]);
        }

        $userId = Auth::user()->id;

        $moveUploadFile = $creditReportUpload->moveUploadFile($userId, $request['credit_report'], $validationUploadPdf[1]);

//        @Todo: get data from second transunion pdf file
//        @Todo: CreditKarma payment history
        $clientReports = [];
        if (count($moveUploadFile) > 1) {
            $clientReports = $readPdfData->getTransUnionAccountDetailsData($moveUploadFile['attachments'][0]);
            $dataTUPH = $readPdfData->getTransUnionPaymentHistoryData($moveUploadFile['attachments'][1]);
            // Merge Payment History to Client Reports Data
            foreach ($clientReports as $key => &$clientReport) {
                $clientReport = array_merge($clientReport, $dataTUPH[$key]);
            }
        } else {
            switch ($moveUploadFile['attachments'][0]->category) {
                case "CK TU":
                    $clientReports = $readPdfData->getCreditKarmaData($moveUploadFile['attachments'][0]);
                    break;
                case "CK EF":
                    $clientReports = $readPdfData->getCreditKarmaData($moveUploadFile['attachments'][0]);
                    break;
                case "EX":
                    $clientReports = $readPdfData->getExprianData($moveUploadFile['attachments'][0]);
                    break;
                default:
                    return redirect('/client/details/upload-credit-reports')->with('error', "Error message: case when file is not known");
                    break;
            }
        }
        ClientReports::insert($clientReports);

        return redirect(route('client.details.index'))->with('success', "Your report uploaded");

    }

    public function continue()
    {
        $client = Auth::user();
        ClientDetail::where('user_id', $client->id)->update(['registration_steps' => 'review']);


        $uploadUserDetail = UploadClientDetail::where('user_id', $client->id)->first();
        return redirect(route('client.details.create'));
    }

    public function importantInformation(Request $request)
    {
        $userId = Auth::user()->id;
        if ($request->method() == "GET") {

            $client = User::where('id', $userId)->first();

            $secrets = DB::table('secret_questions')->select('question', 'id')->get();

            return view('client_details.important-information', compact('client', 'secrets'));

        } elseif ($request->method() == "POST") {

            $clientData = $request->except('_token');

            $full_name = explode(" ", $clientData["full_name"]);
            $clientData["first_name"] = array_shift($full_name);
            $clientData["last_name"] = implode(" ", $full_name);

            User::where('id', $userId)->update([
                'first_name' => $clientData["first_name"],
                'last_name' => $clientData["last_name"],
                'secret_questions_id' => $clientData["secret_questions_id"],
                'secret_answer' => $clientData["secret_answer"]

            ]);

            ClientDetail::where('user_id', $userId)->update([
                'phone_number' => $clientData["phone_number"],
                'sex' => $clientData["sex"]
            ]);

            return redirect()->to('/client/registration-steps');
        }
    }

    public function negativeItem()
    {

        $clientReportsTU = ClientReport::where('user_id',2)->where('type', "TU_DIS")->first();
        $clientReportsEX = ClientReport::where('user_id',2)->where('type', "EX_LOG")->first();

//        dd($clientReportsEX);


        return view('client_details.view_negative_item', compact('clientReportsEX','clientReportsTU'));
    }
    public function negativeItemStore(Request $request)
    {
        $dispute = $request->except('_token');
        $userId = Auth::user()->id;
        $disputeName = [];
        $disputeAddress = [];
        $disputePhone = [];
        $disputeExPublicRecord = [];
        $disputeExAccount = [];
        $disputeExInquiry = [];
        $disputeExStatement = [];
        $disputeTuPublicRecord = [];
        $disputeTuAccount = [];
        $disputeTuInquiry = [];
        $disputeTuStatement = [];


        foreach($dispute as $key => $value){

            if($key == 'ex_name' or $key == 'tu_name'){
                foreach($value  as $dispute_name){
                    $name = ClientReportName::where('id', $dispute_name)->first();
                    $disputeName[] =$name;
                }
            }

            if($key == 'ex_address' or $key == 'tu_address'){
                foreach($value  as $disputeAddresses){
                    $address = ClientReportAddress::where('id', $disputeAddresses)->first();
                    $disputeAddress[] =$address;
                }
            }

            if($key == 'ex_phone' or $key == 'tu_phone'){
                foreach($value  as $disputePhones){
                    $phone = ClientReportPhone::where('id', $disputePhones)->first();
                    $disputePhone[] = $phone;
                }
            }

            if($key == 'ex_public'){
                foreach($value  as $disputeExPublicRecords){
                    $exPublic = ClientReportExPublicRecord::where('id', $disputeExPublicRecords)->first();
                    $disputeExPublicRecord[] =$exPublic;
                }
            }

            if($key == 'ex_accounts'){
                foreach($value  as $disputeExAccounts){
                    $exAccount = ClientReportExAccount::where('id', $disputeExAccounts)->first();
                    $disputeExAccount[] = $exAccount;
                }
            }

            if($key == 'ex_inquiry'){
                foreach($value  as $disputeExInquiries){
                    $exInquiry = ClientReportExInquiry::where('id', $disputeExInquiries)->first();
                    $disputeExInquiry[] =$exInquiry;
                }
            }

            if($key == 'ex_statement'){
                foreach($value  as $disputeExStatements){
                    $exStatement = ClientReportExStatement::where('id', $disputeExStatements)->first();
                    $disputeExStatement[] =$exStatement;
                }
            }

            if($key == 'tu_public'){
                foreach($value  as $disputeTuPublicRecords){
                    $tuPublic = ClientReportTuPublicRecord::where('id', $disputeTuPublicRecords)->first();
                    $disputeTuPublicRecord[] =$tuPublic;
                }
            }

            if($key == 'tu_account'){
                foreach($value  as $disputeTuAccounts){
                    $tuAccount = ClientReportTuAccount::where('id', $disputeTuAccounts)->first();
                    $disputeTuAccount[] =$tuAccount;
                }

            }

            if($key == 'tu_inquiry'){
                foreach($value  as $disputeTuInquiries){
                    $tuInquiry = ClientReportTuInquiry::where('id', $disputeTuInquiries)->first();
                    $disputeTuInquiry[] =$tuInquiry;
                }
            }

            if($key == 'tu_statement'){
                foreach($value  as $disputeTuStatements){
                    $tuStatement = ClientReportTuStatement::where('id', $disputeTuStatements)->first();
                    $disputeTuStatement[] =$tuStatement;
                }
            }

        }

        $data = [
            'name'=>$disputeName,
            'address'=>$disputeAddress,
            'phone'=>$disputePhone,
            'ex_public'=>$disputeExPublicRecord,
            'ex_account'=>$disputeExAccount,
            'ex_inquiry'=>$disputeExInquiry,
            'ex_statement'=>$disputeExStatement,
            'tu_public'=>$disputeTuPublicRecord,
            'tu_account'=>$disputeTuAccount,
            'tu_inquiry'=>$disputeTuInquiry,
            'tu_statement'=>$disputeTuStatement

        ];


        return view('client_details.view_negative_show', compact('data'));

    }

    public function negativeItemContract(Request $request)
    {

        dd($request->all());
        $user = Auth::user();
        if($user->clientDetails->sex = "M"){
           $heSheIt = "he";
        }elseif($user->clientDetails->sex = "M"){
            $heSheIt = "she";
        }else{$heSheIt = "the client";}

        $sumDisp = null;

        if(empty($request->except('_token'))){
            return redirect()->back()
                ->withInput()
                ->withErrors("Nothing chosen");
        }

        foreach ($request->except('_token') as $item) {
            $sumDisp = $sumDisp + count($item);
        }
        if($sumDisp>1){
            $pluralItem = "all negative items";
            $plural = "items";
            $pluralViol = "violations";
        }else{
            $pluralItem = "negative";
            $plural = "item";
            $pluralViol = "violation";
        }



        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        \PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(false);

        $document = $phpWord->loadTemplate(public_path('/files/contract').'/PRUDENT_CONTRACT.docx');

        $document->setValue('DAY', (date("d")) );
        $document->setValue('MONTH', (date("M")) );
        $document->setValue('YEAR', (date("Y")) );
        $document->setValue('CLIENT_NAME', ($user->full_name()) );
        $document->setValue('HE_SHE_THE CLIENT', ($heSheIt));
        $document->setValue('PLURAL_ITEM', ($pluralItem));
        $document->setValue('ITEM_ITEMS', ($plural));
        $document->setValue('VIOLATION', ($pluralViol));
        $document->setValue('DATE', (date("d/M/Y")));


        $path='C:\xampp\htdocs\ccc\public\images\banks_logo\payoff.jpeg';
        $document->setImageValue('foto', array('path' => $path, 'width' => 100, 'height' => 100, 'ratio' => true));
        $length = 31;
        $cloneCount = (int)ceil($length/10);
        $countInRow = $length%10 +1;

        $document->cloneRow('row1', $cloneCount);
        if($countInRow <= 10){
            for($j = $countInRow; $j<=10; $j++){
                $document->setValue('logo'.$j.'#'.$cloneCount,'');
                $document->setValue('neg'.$j.'#'.$cloneCount, '');
            }
        }
        for($k = 1; $k<=$length; $k++){
            $document->setValue('row1#'.$k ,'');
        }
        $row = 1;
        for($k = 1; $k<=$length; $k++){



            $logo = $k %10==0?'logo10#'.$row:'logo'.$k%10 .'#'. $row;
            $neg = $k %10==0?'neg10#'.$row:'neg'.$k%10 .'#'. $row;

            $document->setImageValue($logo, array('path' => $path, 'width' => 50, 'height' => 50, 'ratio' => true));
            $document->setValue($neg, '1st Line<w:br />2nd Line');
            if($k %10 == 0){
                $row = $row+1;
            }

        }

//        $table = new Table(array('borderSize' => 12, 'borderColor' => 'black', 'width' => 6000));
//        $table->addRow();
//        $table->addCell()->addImage($path, array('width' => 100, 'height' => 100, 'ratio' => true));
////        $table->addCell(4500)->addImage( $path, array('width' => 530, 'height' => 75, 'marginTop' => -1 , 'marginLeft' => -1, 'marginRight' => -1));
//        $table->addCell(150)->addText(htmlspecialchars('${NEW_PHOTO/}'));
//        $table->addCell(150)->addText(htmlspecialchars(''));
//        $table->addCell(150)->addText(htmlspecialchars('321321321'));
//        $table->addCell(150)->addText(htmlspecialchars('321321321'));
//        $table->addCell(150)->addText(htmlspecialchars('321321321'));
//        $table->addRow();
//        $table->addCell(150)->addText(htmlspecialchars('321321321'));
//        $table->addCell(150)->addText(htmlspecialchars('321321321'));
//        $table->addCell(150)->addText(htmlspecialchars('321321321'));
//        $document->setComplexBlock('table', $table);
//        dd($document);
        $name = 'Doc_1'.date("Y_m_d_h_m").'.docx';

        $xxx = $name;

        $document->saveAs($name);
        rename($name, public_path()."/files/contract/{$name}");

        $file= public_path(). "/files/contract/{$name}";



//        $file= storage_path(). "/word/{$name}";
//
//        $headers = array(
//            //'Content-Type: application/msword',
//            'Content-Type: vnd.openxmlformats-officedocument.wordprocessingml.document'
//        );
//
//        $response = Response::download($file, $name, $headers);
//        ob_end_clean();
//
//        return $response;


        dd('test for send variabkes in word documents', $phpWord, $document);
    }



}
