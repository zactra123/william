<?php

namespace App\Http\Controllers\Owner;

use App\AccountType;
use App\AccountTypeKeys;
use App\AccountTypeKeyWord;
use App\BankAddress;
use App\BankLogo;
use App\BankPhoneNumber;
use App\EqualBank;
use App\Http\Controllers\Controller;

use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Storage;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use ParagonIE\Sodium\File;
use function RingCentral\Psr7\str;

class BanksController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    public function create()
    {
        $account_types = AccountType::all()->pluck('name', 'id')->toArray();
        return view('owner.bank.create', compact( 'account_types'));
    }

    public function store(Request $request)
    {

        if($request->term != null){

            $banksLogos = BankLogo::where('name', 'LIKE', "%{$request->term}%");

            $banksLogos = $banksLogos->orderBy('name')->paginate(16);
            return view('owner.bank.logo_new',compact('banksLogos'));
        }

        $validation =  Validator::make($request->all(), [
            'name'=>['required', 'string', 'max:255'],

        ]);
        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        $pathLogo = '';
        if (!empty($request['logo']) ) {


            $imagesBankLogo = $request->file("logo");
            $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
            $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
            if(!in_array($bankLogoExtension, $imageExtension)){
                return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
            }


            $ext = $request->file('logo')->getClientOriginalExtension();
            $time = time();
            $pathLogo = $request->file('logo')->storeAs(
                'bank_logos',
                "furnisher_$time.$ext",
                ['disk'=>'s3', 'visibility'=>'public']
            );


        }
        $bank = BankLogo::create([
            'name'=>$request->name,
            'path'=>$pathLogo,
        ]);

        $account_addresses =  $request->bank_address;
        foreach ( $account_addresses as $addresses) {
            foreach($addresses as $address) {

                $address['bank_logo_id'] = $bank->id;
                BankAddress::create($address);
            }
        }

        $equalBanks = $request->equal_banks;
        if($equalBanks != null){
            $eqs = explode(',', $equalBanks);
            foreach($eqs as $name){
                $data = [
                    'bank_logo_id' => $bank->id,
                    'name'=>$name
                ];
                EqualBank::create($data);
            }
        }

        return redirect()->route('owner.bank.show', ['type'=> $bank->type??'all']);

    }

    public function edit(Request $request)
    {
        $id  = $request->id;
        $bank = BankLogo::find($id);
        $keyWords = AccountTypeKeys::get()->pluck('key_word','id')->toArray();
        $keywordId = null;
        foreach($keyWords as $key=>$words){
            if (strpos(strtoupper($bank->name),$words) !== false) {
                $keywordId = $key;
                break;
            }
        }
        if($keywordId !=null){
            $accType = AccountTypeKeyWord::where('account_type_key_id', $keywordId)
                ->pluck('account_type_id')->toArray();
            $account_types = AccountType::whereIn('id', $accType)->pluck('name', 'id')->toArray();
        }else{
            $account_types = AccountType::where('type', true)->pluck('name', 'id')->toArray();
        }

        $bank_addresses = $bank->bankAddresses;
        $bank_types = $bank->bankTypes()->pluck('account_types.name')->toArray();



        return view('owner.bank.edit', compact('bank', 'account_types', 'bank_accounts', 'bank_addresses', 'bank_types'));

    }

    public function update(Request $request)
    {
        if($request->term != null){

            $banksLogos = BankLogo::where('name', 'LIKE', "%{$request->term}%");

            $banksLogos = $banksLogos->orderBy('name')->paginate(16);
            return view('owner.bank.logo_new',compact('banksLogos'));
        }
        $id  = $request->id;
        $bank = BankLogo::find($id);

        if($request->logo != null){
            $imagesBankLogo = $request->file("logo");
            $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
            $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
            if(!in_array($bankLogoExtension, $imageExtension)){
                return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
            }
            $bankLogo = $request->bank;
            $ext = $request->file('logo')->getClientOriginalExtension();
            $time = time();
            $pathLogo = $request->file("logo")->storeAs(
                'bank_logos',
                "furnisher_$time.$ext",
                ['disk'=>'s3', 'visibility'=>'public']
            );
            $bankLogo['path'] = $pathLogo;

            if($bank->checkUrlAttribute()) {
                Storage::delete($bank->path);
            }

            $bank->update($bankLogo);
        }else{
            $bank->update($request->bank);

        }

        $addresses_ids = [];
        foreach ($request->bank_address as $addresses) {
            foreach ($addresses as $address){
                $address['account_type_id'] = intval($address['account_type_id']) !=0 ?intval($address['account_type_id']): null;

                $bank_address = $bank->bankAddresses()->firstorCreate(
                    [
                        "type" => $address['type'],
                        "account_type_id" => $address['account_type_id']
                    ]);
                $bank_address->update($address);
                $addresses_ids[] = $bank_address->id;
            }
        }
        if ($addresses_ids){
            $bank->bankAddresses()->whereNotIn('id', $addresses_ids)->delete();
        }


        $existing_names = $bank->equalBanks->pluck('name')->toArray();
        $eqs = explode(',', $request->equal_banks);
        foreach($eqs as $eb) {
            if (!in_array($eb, $existing_names)) {
                $bank->equalBanks()->create(["name" => $eb]);
            }
        }

        return redirect()->route('owner.bank.show');

    }

    public function  deleteBankPhone(Request $request)
    {
        try {
            BankPhoneNumber::whereId($request->id)->delete();;

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }


    public function showBankLogo(Request $request)
    {
        $banksLogos = BankLogo::where('name', 'LIKE', "%{$request->term}%");

        if (!empty($request->character)) {
            if ($request->character == '#'){
                $banksLogos = $banksLogos->whereRaw("TRIM(LOWER(name)) NOT REGEXP '^[a-z]'");

            } else {
                $banksLogos = $banksLogos->whereRaw("LOWER(`name`) LIKE '{$request->character}%'");
            }
        }
        $banksLogos = $banksLogos->orderBy('name')->paginate(16);
        return view('owner.bank.logo_new',compact('banksLogos'));

    }

    public function deleteBankLogo(Request $request)
    {

        $logId = $request->id;

        $delete = BankLogo::find($logId);
        if($delete->checkUrlAttribute()) {
            Storage::delete($delete->path);
        }
        $delete->delete();
        return response()->json(['status' => 'success']);


    }


    public function types(Request $request)
    {
        if($request->isMethod("post")){

            $check_type = AccountType::firstWhere("name", $request->account_type["name"]);
            if ($check_type) {
                return redirect()->route('owner.bank.types')
                    ->withErrors("FURNISHER TYPE ALREADY EXIST");
            }
            $accountType = AccountType::create($request->account_type);
            $key_words = explode(',', $request->account_type_keys["key_word"]);
            $accountTypeKeys = [];

            foreach($key_words as $key) {
                $accountKeys = AccountTypeKeys::firstOrCreate(
                    ['key_word' =>$key]
                )->id;
                $accountTypeKeys[]= ["account_type_key_id" => $accountKeys];
            }
            if(!empty($accountTypeKeys)) {
                $accountType->AccountTypeKeyWord()->createMany($accountTypeKeys);
            }
            return redirect()->route('owner.bank.types');

        }

        $accountTypes = AccountType::with('accountKeys')->get();

        return view('owner.bank.types',compact('accountTypes'));
    }


    public function delete_types($id)
    {
        AccountType::destroy($id);
        return response()->json(['status' => 'success']);
    }


    public function keywords(Request $request)
    {
        $result = AccountTypeKeys::where('account_type_keys.key_word', 'LIKE', "%{$request->search_key}%")->get(["id","key_word"]);

        return response()->json($result);
    }

    public function removeEqualBank(Request $request)
    {
        EqualBank::find($request->equal_bank_id)->delete();

        return response()->json('success');
    }

    public function banKName(Request $request)
    {
        $bankName = $request->bank_name;
        $keyWords = AccountTypeKeys::get()->pluck('key_word','id')->toArray();
        $keywordId = null;
        foreach($keyWords as $key=>$words){
            if (strpos(strtoupper($bankName),$words) !== false) {
                $keywordId = $key;
                break;
            }
        }
        if($keywordId !=null){
            $accType = AccountTypeKeyWord::where('account_type_key_id', $keywordId)
                ->pluck('account_type_id')->toArray();
            $account_types = AccountType::whereIn('id', $accType)->pluck('name', 'id')->toArray();
        }else{
            $account_types = AccountType::where('type', true)->pluck('name', 'id')->toArray();
        }
        $data = $account_types;
        return Response::json($data);
    }

    public function update_type_keywords(Request $request)
    {
        $account_type = AccountType::find($request->account_type);
        if (!$account_type) {
//            throw error that account Type not found
        }

        $key_word_ids = [];
        foreach ($request->keywords as $key) {
            $keyword = AccountTypeKeys::firstorCreate(['key_word' => strtoupper($key)]);
            $type_keyword = $account_type->accountTypeKeyWord()->firstOrCreate([
                'account_type_key_id' => $keyword->id,
            ]);

            $key_word_ids[] = $type_keyword->id;
        }
        $account_type->accountTypeKeyWord()->whereNotIn('id', $key_word_ids)->delete();
        return response()->json(['status' => 'success']);
    }

    public function update_type_default(Request $request)
    {
        $account_type = AccountType::find($request->account_type);
        if (!$account_type) {
//            throw error that account Type not found
        }

        $account_type->update(['type' => (int) ($request->type == "true")]);
        return response()->json(['status' => 'success']);
    }


    public function storeBanksData()
    {
        $banks_file = storage_path('furnishers/banks.json');


        $banks = json_decode(file_get_contents($banks_file), true);
        $bank_logos = json_decode(file_get_contents(storage_path('furnishers/bank_logo.json')), true);
        $blanks = [];
        $bank_names = array_column($banks, 'bank_name');

//        dd(array_sum(array_map("count", $bank_logos)) , count($bank_names));
        $banks_with_logo = [];
        foreach ($bank_logos as $b_l) {

            foreach ($b_l as $bank) {

                $i  =  array_search($bank["name"], $bank_names);
                if (!$i) {
                    $blanks[] = $bank;
                } else {

                    $banks[$i]['path'] = $bank['path'];
                    unset($bank_names[$i]);
                }
            }
        }
        $t = [];

        foreach($blanks as $b_2){

            $i  =  preg_grep("/^".$b_2["name"].".*/mi", $bank_names);

            if (!$i or empty($i)) {
                $blanks1[] = $b_2;
            } else {

                $banks[ key($i)]['path'] = $b_2['path'];
                unset($bank_names[ key($i)]);
                $t[key($i)] =  $banks[ key($i)];
                $t[ key($i)]['path'] = $b_2['path'];
                $t[ key($i)]['equal_name'] = $b_2['name'];
            }

        }
        dd($t, $bank_names);
        $t = [];
        foreach($blanks1 as $b_3)
        {
           $name = substr($b_3["name"], 0, intdiv(strlen($b_3["name"]),2));
            $j  =  preg_grep("/".$name.".*/mi", $bank_names);

            if (!$j or empty($i)) {
                $blanks2[] = $b_3;
            } else {
                $t[key($j)] =  $banks[ key($j)];
                $t[ key($j)]['path'] = $b_3['path'];
                $t[ key($j)]['equal_name'][] = $b_3['name'];
            }

        }
        dd($t, $blanks1, $blanks2);


        dd($blanks1, $blanks2);
        $banks = json_decode(file_get_contents(storage_path('furnishers/credit_unions.json')), true);
        foreach($banks as $bank_data) {

            $bank = BankLogo::firstorCreate(['name' => $bank_data['bank_name']]);

            $phone = $bank_data["phone_number"] != 'null' ? substr(str_replace('-', '', $bank_data["phone_number"]), -10): null;
            $bank->bankAddresses()->firstorCreate(
                [
                    "type" => 'registered_agent'
                ]
            );
            $address = $bank->bankAddresses()->firstorCreate(
                [
                    "type" => 'executive_address'
                ]
            );
            $address->update(
                [
                    "street" => $bank_data["address"],
                    "city" =>$bank_data["city"],
                    "state" =>$bank_data["state"],
                    "zip" => $bank_data["zip_code"],
                    "phone_number" =>$phone,
                ]);
        }
        dd('ok');
    }

}
