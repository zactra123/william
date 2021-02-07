<?php

namespace App\Http\Controllers;

use App\Authority;
use Illuminate\Http\Request;

class AuthoritiesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admins']);
    }

    public function index()
    {
        $authorities = Authority::paginate(20);
        return view('furnishers.authority.index', compact('authorities'));
    }

    public function create()
    {
        return view('furnishers.authority.create');
    }
    public function store(Request $request)
    {

        $additionalInformation = $request->additional_information;

        $validation =  Validator::make($request->bank, [
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
            'name' => $request->bank['name'],
            'path'=> $pathLogo,
            'type'=> $request->bank['type'],
            'additional_information' => $additionalInformation
        ]);

        $account_addresses =  $request->bank_address;
        // Only mortgage lander can have trusty
        if ($bank->type != 29) {
            unset($account_addresses['trustee']);
        }

        foreach ( $account_addresses as $addresses) {
            foreach($addresses as $address) {
                $bank->bankAddresses()->create($address);
            }
        }

        $equalBanks = $request->equal_banks;
        if($equalBanks != null){
            $eqs = explode(',', $equalBanks);
            foreach($eqs as $name){
                $data = [
                    'bank_logo_id' => $bank->id,
                    'name'=>strtoupper($name)
                ];
                EqualBank::create($data);
            }
        }
        if($request->ajax()){

            return response()->json(['parent_id'=>$bank->id, 'parent_name'=>$bank->name]);
        }

        return redirect()->route('admins.bank.show', ['type'=> $bank->type??'all']);


    }

    public function edit($id)
    {
        $authorities = Authority::whereId($id)->first();
        return view("furnishers.authority.edit", compact('authorities'));
    }

    public function update(Request $request)
    {

    }



    public function destroy(Request $request)
    {
        $id = $request->id;
        $delete = Authority::find($id);
        if(file_exists($delete->first()->path)){
            unlink($delete->first()->path);
        }
        $delete->delete();

        if($request->ajax()){
            return response()->json(['status' => 'success']);
        }
        return redirect()->route('furnishers.authority.index');
    }

}
