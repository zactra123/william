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
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use ParagonIE\Sodium\File;

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

            $path = "images/banks_logo";
            $nameBankLogo =str_replace(' ','_',strtolower($request->name)).date("m_d_y_h").'.'.$bankLogoExtension;
            $imagesBankLogo->move(public_path() . '/' . $path, $nameBankLogo);
            $pathLogo =  '/' . $path . '/'.$nameBankLogo;

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

        $existing_names = $bank->equalBanks->pluck('name')->toArray();
        $eqs = explode(',', $request->equal_banks);
        foreach($eqs as $eb) {
            if (!in_array($eb, $existing_names)) {
                $bank->equalBanks()->create(["name" => $eb]);
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

        $bank_addresses = $bank->bankAccounts()->with('accountAddresses');
        $bank_addresses  = $bank_addresses->get()->pluck('accountAddresses', 'account_type_id')->toArray();
        $bank_accounts = $bank->bankAccounts->pluck('id', 'account_type_id')->toArray();



        return view('owner.bank.edit', compact('bank', 'account_types', 'bank_accounts', 'bank_addresses'));

    }

    public function update(Request $request)
    {
        $id  = $request->id;
        $bank = BankLogo::find($id);

        if($request->logo != null){
            $imagesBankLogo = $request->file("logo");
            $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
            $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
            if(!in_array($bankLogoExtension, $imageExtension)){
                return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
            }

            $path = "images/banks_logo";
            $nameBankLogo =str_replace(' ','_',strtolower($request->name)).date("m_d_y_h").'.'.$bankLogoExtension;
            $imagesBankLogo->move(public_path() . '/' . $path, $nameBankLogo);
            $pathLogo =  '/' . $path . '/'.$nameBankLogo;
            $bankLogo = $request->bank;
            $bankLogo['path'] = $pathLogo;
            $deleteOldLogo = $bank->path;

            if(file_exists(public_path($deleteOldLogo)) && !is_dir(public_path($deleteOldLogo))) {
                unlink(public_path($deleteOldLogo));
            }
            $bank->update($bankLogo);
        }else{
            $bank->update($request->bank);

        }


        $existing_accounts = $bank->bankAccounts->pluck('account_type_id')->toArray();
        $new_account_types = array_diff($request->account_types??[], $existing_accounts);
        $removed_account_types = array_diff($existing_accounts, $request->account_types??[]);
        $new_account_types = collect($new_account_types)->map(function ($id){return ["account_type_id" =>$id]; });

        $bank->bankAccounts()->createMany($new_account_types);
        $bank->bankAccounts()->whereIn('account_type_id', $removed_account_types)->delete();
        $bankAccounts = $bank->bankAccounts()->whereIn('account_type_id',$request->account_types??[])->get();
        foreach ( $bankAccounts as $bankAccount) {
            $removed_bank_account_address = [];
            $bank_account_address = [];

            $account_addresses =  $request->bank_address[$bankAccount->account_type_id];
            foreach($account_addresses as $account_address) {
                if (
                    empty($account_address['name']) &&
                    empty($account_address['street']) &&
                    empty($account_address['city']) &&
                    empty($account_address['state']) &&
                    empty($account_address['zip']) &&
                    empty($account_address['fax_number']) &&
                    empty($account_address['phone_number'])
                ) {
                    if(!empty($account_address['id'])) {
                        $removed_bank_account_address[] =  $account_address['id'];
                    }
                    continue;
                }

                $bank_account_address = $account_address;
                if (!empty($account_address['id'])) {
                    $bankAccount->accountAddresses()->find($account_address['id'])->update($bank_account_address);
                } else {
                    $bankAccount->accountAddresses()->create($bank_account_address);
                }

            }

            $bankAccount->accountAddresses()->whereIn('id',$removed_bank_account_address)->delete();
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

        $delete = BankLogo::where('id', $logId);

        if(file_exists(public_path($delete->first()->path)) &&  !is_dir(public_path($delete->first()->path))  ){
            unlink(public_path($delete->first()->path));
            $delete->delete();
        }else{
            $delete->delete();
        }
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


}
