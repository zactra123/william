<?php

namespace App\Http\Controllers\Owner;

use App\AccountType;
use App\BankAddress;
use App\BankLogo;
use App\BankPhoneNumber;
use App\EqualBank;
use App\Http\Controllers\Controller;

use Facade\FlareClient\Http\Exceptions\NotFound;
use http\Env\Response;
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
            'logo' => ['required', 'file'],
            'name'=>['required', 'string', 'max:255'],

        ]);
        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }


        if (empty($request['logo']) ) {
            return redirect()->back()
                ->withInput()
                ->with('error','Please upload files');
        }

        $imagesBankLogo = $request->file("logo");
        $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
        if(!in_array($bankLogoExtension, $imageExtension)){
            return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
        }

        $path = "image/banks_logo";
        $nameBankLogo =str_replace(' ','_',strtolower($request->name)).date("m_d_y_h").'.'.$bankLogoExtension;
        $imagesBankLogo->move(public_path() . '/' . $path, $nameBankLogo);
        $pathLogo =  '/' . $path . '/'.$nameBankLogo;

        $bank = BankLogo::create([
            'name'=>$request->name,
            'path'=>$pathLogo,

        ]);

        $new_account_types = collect($request->account_types)->map(function ($id){return ["account_type_id" =>$id]; });
        $bankAccounts = $bank->bankAccounts()->createMany($new_account_types);
        foreach ( $bankAccounts as $bankAccount) {
            $account_addresses =  $request->bank_address[$bankAccount->account_type_id];
            foreach($account_addresses as $account_address) {
                if (
                    empty($account_address['street']) &&
                    empty($account_address['city']) &&
                    empty($account_address['state']) &&
                    empty($account_address['zip']) &&
                    empty($account_address['fax_number']) &&
                    empty($account_address['phone_number'])
                ) {
                    continue;
                }
                $bankAccount->accountAddresses()->create($account_address);
            }
        }

        return redirect()->route('owner.bank.show', ['type'=> $bank->type??'all']);

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


            if(file_exists(public_path($deleteOldLogo)) && $deleteOldLogo != "/images/banks_logo/") {
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


        return redirect()->route('owner.bank.show', ['type'=> $bank->type??'all']);

    }


    public function edit(Request $request)
    {
        $id  = $request->id;
        $bank = BankLogo::find($id);
        $bank_addresses = $bank->bankAccounts()->with('accountAddresses');
        $bank_addresses  = $bank_addresses->get()->pluck('accountAddresses', 'account_type_id')->toArray();
        $account_types = AccountType::all()->pluck('name', 'id')->toArray();
        $bank_accounts = $bank->bankAccounts->pluck('id', 'account_type_id')->toArray();

        return view('owner.bank.edit', compact('bank', 'account_types', 'bank_accounts', 'bank_addresses'));

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


    public function showBankLogo($type, Request $request)
    {
        if (!in_array($type,['all', 'untyped']) && !in_array($type, array_keys(BankLogo::TYPES))){
            redirect()->route('owner.bank.show', ['type'=> 'all']);
        }
        $banksLogos = BankLogo::where('name', 'LIKE', "%{$request->term}%");

        switch ($type) {
            case 'untyped':
                    $banksLogos = $banksLogos->whereNull('type');
                break;
            case 'all':
                break;
            default:
                $banksLogos = $banksLogos->where('type', '=', $type);
        }
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

        if(file_exists(public_path($delete->first()->path)) &&  $delete->first()->path != "/images/banks_logo/"  ){
            unlink(public_path($delete->first()->path));
            $delete->delete();
        }else{
            $delete->delete();
        }
        return response()->json(['status' => 'success']);


    }


    public function equalBanks(Request $request)
    {
        if($request->isMethod("post")){
            $banksLogo = BankLogo::find($request->bank_logo["id"]);
            $existing_names = $banksLogo->equalBanks()->get()->pluck('name')->toArray();
            $eqs = explode(',', $request->equal_banks);
            foreach( $eqs as $eb) {
                if (!in_array($eb, $existing_names)) {
                    $banksLogo->equalBanks()->create(["name" => $eb]);
                }
            }
            return redirect()->route('owner.bank.equal');
        }

        $banksLogos = BankLogo::with('equalBanks')->get();
        return view('owner.bank.equal_banks',compact('banksLogos'));
    }


    public function banks(Request $request)
    {

        $banks = BankLogo::with('equalBanks')
            ->select('bank_logos.*')
            ->leftJoin('equal_banks', 'bank_logos.id', '=', 'equal_banks.bank_logo_id')
            ->where('bank_logos.name', 'LIKE', "%{$request->search_key}%")
            ->orWhere('equal_banks.name', 'LIKE', "%{$request->search_key}%")
            ->limit(15)
            ->get()
            ->toArray();
        $result = [];

        foreach($banks as $bank) {
            $searchable =  collect($bank['equal_banks'])->map(function ($eb){return $eb["name"]; })->toArray();
            $searchable[] = $bank['name'];
            $result[] = [
                "id" => $bank['id'],
                "name" => $bank['name'],
                "searchable" => implode(' ', $searchable)
            ];
        }

        return response()->json($result);
    }

    public function removeEqualBank(Request $request)
    {
        EqualBank::find($request->equal_bank_id)->delete();

        return response()->json('success');
    }
}
