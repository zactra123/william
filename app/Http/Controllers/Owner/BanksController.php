<?php

namespace App\Http\Controllers\Owner;

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
        return view('owner.bank.create');

    }

    public function store(Request $request)
    {
        $validation =  Validator::make($request, [
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

        $imagesBankLogo = $request->file("driver_license");
        $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
        $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
        if(!in_array($bankLogoExtension, $imageExtension)){
            return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
        }

        $path = "image/banks_logo";
        $nameBankLogo =str_replace(' ','_',strtolower($request->name)).date("m_d_y_h").'.'.$bankLogoExtension;
        $imagesBankLogo->move(public_path() . '/' . $path, $nameBankLogo);
        $pathLogo =  '/' . $path . $nameBankLogo;

        $bankLogo = BankLogo::create([
            'name'=>$request->name,
            'path'=>$pathLogo,

        ]);

        $dispute  = $request->dis;
        $ex  = $request->ex;
        $gv  = $request->gv;
        $lg  = $request->lg;
        $ps  = $request->ps;
        $phone  = $request->phone;
        if($dispute['street'] != null){
            $dispute['type'] =  "DISPUTE ADDRESS";
            $dispute['bank_logo_id'] = $bankLogo->id;

            BankAddress::create($dispute);
        }
        if($ex['street'] != null){
            $ex['type'] =  "EXECUTIVE OFFICE";
            $ex['bank_logo_id'] = $bankLogo->id;
            BankAddress::create($ex);

        }
        if($gv['street'] != null){
            $gv['type'] =  "GOVERNING ADOREE";
            $gv['bank_logo_id'] = $bankLogo->id;
            BankAddress::create($gv);

        }
        if($lg['street'] != null){
            $lg['type'] =  "LEGAL DEPARTMENT";
            $lg['bank_logo_id'] = $bankLogo->id;
            BankAddress::create($lg);

        }
        if($ps['street'] != null){
            $ps['type'] =  "PROCESS SERVER";
            $ps['bank_logo_id'] = $bankLogo->id;
            BankAddress::create($ps);

        }
        foreach($phone['type'] as $key => $type){
            if( $type != null && $phone['number'][$key] !=  null ){

                BankPhoneNumber::create([
                    'bank_logo_id'=> $id,
                    'type' =>$type,
                    'number'=>$phone['number'][$key]
                ]);
            }

        }

        return redirect('owner/bank/logo');

    }



    public function update(Request $request)
    {
        $id  = $request->id;
        $bankName = $request->name;
        if($bankName == null){
            BankLogo::whereId('$id')->udate(['name'=>$bankName]);
        }
        $dispute  = $request->dis;
        $ex  = $request->ex;
        $gv  = $request->gv;
        $lg  = $request->lg;
        $ps  = $request->ps;
        $phone  = $request->phone;
        if($dispute['street'] != null){
           $dispute['type'] =  "DISPUTE ADDRESS";
           $dispute['bank_logo_id'] = $id;

            $disputeAddress = DB::table('bank_addresses')->where('bank_logo_id', $id)
               ->where('type', "DISPUTE ADDRESS" );

           $checkAddress = $disputeAddress->first();
           if(empty($checkAddress)){
               BankAddress::create($dispute);
           }else{
               BankAddress::where('bank_logo_id', $id)
                   ->where('type', "DISPUTE ADDRESS" )->update($dispute);
           }
        }
        if($ex['street'] != null){
            $ex['type'] =  "EXECUTIVE OFFICE";
            $ex['bank_logo_id'] = $id;

            $exAddress = DB::table('bank_addresses')->where('bank_logo_id', $id)
               ->where('type', "EXECUTIVE OFFICE" );

           $checkEx = $exAddress->first();
           if(empty($checkEx)){
               BankAddress::create($ex);
           }else{
               BankAddress::where('bank_logo_id', $id)
                   ->where('type', "EXECUTIVE OFFICE" )->update($ex);
           }
        }
        if($gv['street'] != null){
            $gv['type'] =  "GOVERNING ADOREE";
            $gv['bank_logo_id'] = $id;

            $gvAddress = DB::table('bank_addresses')->where('bank_logo_id', $id)
               ->where('type', "GOVERNING ADOREE" );

           $checkGv = $gvAddress->first();
           if(empty($checkGv)){
               BankAddress::create($gv);
           }else{
               BankAddress::where('bank_logo_id', $id)
                   ->where('type', "GOVERNING ADOREE")->update($gv);
           }
        }
        if($lg['street'] != null){
            $lg['type'] =  "LEGAL DEPARTMENT";
            $lg['bank_logo_id'] = $id;

            $lgAddress = DB::table('bank_addresses')->where('bank_logo_id', $id)
               ->where('type', "LEGAL DEPARTMENT" );

           $checkLg = $lgAddress->first();
           if(empty($checkLg)){
               BankAddress::create($lg);
           }else{
               BankAddress::where('bank_logo_id', $id)
                   ->where('type', "LEGAL DEPARTMENT" )->update($lg);

           }
        }
        if($ps['street'] != null){
            $ps['type'] =  "PROCESS SERVER";
            $ps['bank_logo_id'] = $id;

            $psAddress = DB::table('bank_addresses')->where('bank_logo_id', $id)
               ->where('type', "PROCESS SERVER");

           $checkPs= $psAddress->first();
            if(empty($checkPs)){
                BankAddress::create($ps);
            }else{
                BankAddress::where('bank_logo_id', $id)
                    ->where('type', "PROCESS SERVER" )->update($ps);

            }
        }

       if(count($phone['type'])!= null && $phone['type'][0] !=null  ){
           BankPhoneNumber::where( 'bank_logo_id',  $id)->delete();

            foreach($phone['type'] as $key => $type){
                if( $type != null && $phone['number'][$key] !=  null ){

                    BankPhoneNumber::create([
                        'bank_logo_id'=> $id,
                        'type' =>$type,
                        'number'=>$phone['number'][$key]
                    ]);
                }

            }
       }

        return redirect('owner/bank/logo');

    }


    public function edit(Request $request)
    {
        $id  = $request->id;

        $banksLogos = DB::table('bank_logos')->whereId($id)->first();
        $banksAddress  = DB:: table('bank_addresses')->where('bank_logo_id', $id)->get();
        $banksPhoneNumbers  = DB:: table('bank_phone_numbers')->where('bank_logo_id', $id)->get();

        return view('owner.bank.edit', compact('banksLogos', 'banksAddress', 'banksPhoneNumbers'));

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


    public function showBankLogo()
    {
        $banksLogos = DB::table('bank_logos')->paginate(10);
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
