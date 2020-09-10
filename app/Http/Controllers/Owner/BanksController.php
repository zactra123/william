<?php

namespace App\Http\Controllers\Owner;

use App\AccountType;
use App\BankAddress;
use App\BankLogo;
use App\BankPhoneNumber;
use App\Http\Controllers\Controller;

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

        return redirect('owner/bank/logo');

    }



    public function update(Request $request)
    {
        $id  = $request->id;
        $bank = BankLogo::find($id);
        $bank->update($request->bank);
        $existing_accounts = $bank->bankAccounts->pluck('account_type_id')->toArray();
        $new_account_types = array_diff($request->account_types, $existing_accounts);
        $removed_account_types = array_diff($existing_accounts, $request->account_types);
        $new_account_types = collect($new_account_types)->map(function ($id){return ["account_type_id" =>$id]; });

        $bank->bankAccounts()->createMany($new_account_types);
        $bank->bankAccounts()->whereIn('account_type_id', $removed_account_types)->delete();
        $bankAccounts = $bank->bankAccounts()->whereIn('account_type_id',$request->account_types)->get();
        foreach ( $bankAccounts as $bankAccount) {
            $removed_bank_account_address = [];
            $bank_account_address = [];

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


        return redirect('owner/bank/logo');

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


    public function showBankLogo(Request $request)
    {
        $banksLogos = DB::table('bank_logos')->where('name', 'LIKE', "%{$request->term}%")->paginate(10);
        return view('owner.bank.logo',compact('banksLogos'));

    }

    public function deleteBankLogo(Request $request)
    {

        $logId = $request->id;

        $delete = BankLogo::where('id', $logId);

        if(file_exists(public_path($delete->first()->path))){
            unlink(public_path($delete->first()->path));
            $delete->delete();
        }else{
            $delete->delete();
        }
        return response()->json(['status' => 'success']);


    }





}
