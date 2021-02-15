<?php

namespace App\Http\Controllers\Employer;
use App\EqualCourt;
use App\Http\Controllers\Controller;
use App\Court;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourtsController extends Controller
{

    /**
     * CourtsController constructor.
     * Should access logged in users with Super Admin,  admin and receptionist
     * ("superadmin","admin", "receptionist") Roles
     * Users can view furnisher list, create, update or delete an furnishers
     * Created furnisher (bank, credit union etc..)
     *
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admins']);
    }

    /**
     * @return \Illuminate\View\View "furnishers.logo_new" with @banksLogos
     * @banksLogos  form "bank_logo table" all furnishers
     * @banksLogos furnishers paginated 20
     */
    public function index(Request $request)
    {

//        if(!is_null($request->term)){
//            $phoneFaxZip =preg_replace('/[^0-9a-zA-Z]/', '', $request->term);
//
//            $courts = Court::join('bank_addresses', 'bank_logos.id', '=', 'bank_addresses.bank_logo_id')
//                ->leftJoin('equal_banks', 'bank_logos.id', '=', 'equal_banks.bank_logo_id')
//                ->where(function($query) use($request, $phoneFaxZip)  {
//                    $query->whereRaw("REPLACE(REPLACE(REPLACE(REPLACE(bank_logos.name, ',', ''), '.', ''), '\'', ''),'\"', '') LIKE '%{$request->term}%'")
//                        ->orWhere('bank_addresses.name', 'LIKE', "%{$request->term}%")
//                        ->orWhereRAW("CONCAT(COALESCE(bank_addresses.street, ''), ' ', COALESCE(bank_addresses.city, ''), ' ', COALESCE(bank_addresses.state, '')) LIKE '%{$request->term}%'")
//                        ->orWhere('equal_banks.name', 'LIKE', "%{$request->term}%");
//                    if ($phoneFaxZip) {
//                        $query = $query->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(bank_addresses.phone_number, ',', ''), '.', ''), '(', ''), ')', ''), ' ', ''), '-', '') LIKE '%{$phoneFaxZip}%'")
//                            ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(bank_addresses.fax_number, ',', ''), '.', ''), '(', ''), ')', ''), ' ', ''), '-', '') LIKE '%{$phoneFaxZip}%'")
//                            ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(bank_addresses.zip, ',', ''), '.', ''), '(', ''), ')', ''), ' ', ''), '-', '') LIKE '%{$phoneFaxZip}%'");
//                    }
//
//                });
//
//        }else{
//            $banksLogos = Court::where('bank_logos.name', 'LIKE', "%{$request->term}%");
//        }
//
//        if(!is_null($request->types)){
//            $banksLogos = $banksLogos->whereIn('bank_logos.type', $request->types);
//        }
//
//
//
//        if (!empty($request->character)) {
//            if ($request->character == '#'){
//                $banksLogos = $banksLogos->whereRaw("TRIM(LOWER(name)) NOT REGEXP '^[a-z]'");
//            } else {
//                $banksLogos = $banksLogos->whereRaw("LOWER(`name`) LIKE '{$request->character}%'");
//            }
//        }
//        $banksLogos =Court::groupBy('bank_logos.id')->select('bank_logos.*')->orderBy('bank_logos.name')->paginate(20);
        return view('employer.court.index');

    }

    /**
     *  Newly created furnishers can have multiple addresses
     * @return \Illuminate\View\View "furnishers.create" with @account_types
     * @account_types form "account_types table"
     */
    public function create()
    {
        return view('employer.court.create');
    }

    /**
     * Create furnisher with type bank, credit union, CRA, med services provider, etc...
     * @param Request $request
     * request structure []
     * @return redirect on success admins.bank.show, on failed furnishers.create
     */
    public function store(Request $request)
    {
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
                'courts',
                "court_$time.$ext",
                ['disk'=>'s3', 'visibility'=>'public']
            );
        }
        $courtInfo = $request->court;
        $courtInfo['path'] = $pathLogo;
        $court = Court::create($courtInfo);

        $judges_infos = $request->judge;

        foreach ( $judges_infos as $judge) {
            $court->courtJudges()->create($judge);
        }

        $equalCourts = $request->equal_courts;
        if($equalCourts != null){
            $eqs = explode(',', $equalCourts);
            foreach($eqs as $name){
                $data = [
                    'court_id' => $court->id,
                    'name'=>strtoupper($name)
                ];
                EqualCourt::create($data);
            }
        }

        return redirect()->route('admins.court.index');
    }


    /**
     * Update Furnishers
     * @param $id
     * @return \Illuminate\View\View 'furnishers.edit', @bnak, @account_types,
     * @bank_addresses, @bank_types, @registredAgent,
     *  @bank edited furnishers
     * @account_types form "account_types table"
     * @bank_addresses edited furnishers addresses sorted in first executive address
     */
    public function edit(Request $request)
    {

        $id  = $request->id;
        $bank = BankLogo::findOrFail($id);
        $banks = BankLogo::all()->pluck('name', 'id')->toArray();

        // Show only collection account types
        if ($bank->type == 3) {
            $keywordId = AccountTypeKeys::where('key_word', 'collection')->first()->id;
            $accType = AccountTypeKeyWord::where('account_type_key_id', $keywordId)
                ->pluck('account_type_id')->toArray();
            $account_types = AccountType::whereIn('id', $accType)->pluck('name', 'id')->toArray();
        }elseif(in_array($bank->type, [4,5,6,7])){
            $account_types = [];
        }else{
            $keyWords = AccountTypeKeys::get()->pluck('key_word','id')->toArray();
            $keywordId = null;
            foreach ($keyWords as $key=>$words) {
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
        }
//        $bank_addresses = $bank->bankAddresses;
        $bank_addresses = $bank->bankAddresses()
            ->orderBy(\DB::raw('CASE WHEN type = "executive_address" THEN 0
                                WHEN type = "registered_agent" THEN 1
                                ELSE 2 END'))
            ->orderBy('type')
            ->get();

        $bank_types = $bank->bankTypes()->pluck('account_types.name')->toArray();
        $registredAgent = BankLogo::where('type', 'registered_agent')->pluck('name', 'id')->toArray();

        return view('furnishers.edit', compact('bank', 'account_types', 'bank_addresses', 'bank_types', 'registredAgent', 'banks'));
    }

    /**
     * Update existing Furnishers
     * @param Request $request
     * request structure []
     * @return redirect on success admin.index, on failed furnishers.edit
     */
    public function update(Request $request)
    {
        if($request->term != null){

            $banksLogos = BankLogo::where('name', 'LIKE', "%{$request->term}%");
            $banksLogos = $banksLogos->orderBy('name')->paginate(20);
            return view('owner.bank.logo_new',compact('banksLogos'));
        }
        $id  = $request->id;
        $bank = BankLogo::find($id);
        $bankLogo = $request->bank;
        if (!empty($request->bank["additional_information"]["collection_type"])){
            $bank_additonal_information = $bank->toArray()["additional_information"];
            $bank_additonal_information["collection_type"] = $request->bank["additional_information"]["collection_type"];
            $bankLogo["additional_information"] = $bank_additonal_information;
        }

        if($request->logo != null){
            $imagesBankLogo = $request->file("logo");
            $imageExtension = ['pdf', 'gif', 'png', 'jpg', 'jpeg', 'tif', 'bmp'];
            $bankLogoExtension = strtolower($imagesBankLogo->getClientOriginalExtension());
            if(!in_array($bankLogoExtension, $imageExtension)){
                return redirect()->back()->with('error','Please upload the correct file format (PDF, PNG, JPG)');
            }

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
            $bank->update($bankLogo);

        }

        $addresses_ids = [];
        $account_addresses =  $request->bank_address;
        // Only mortgage lander can have trusty
        if ($bank->type != 29) {
            unset($account_addresses['trusty']);
        }
        foreach ($account_addresses as $addresses) {
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
        $removeArray = array_values(array_diff($existing_names, $eqs));
        if(!empty($removeArray)){
            $removeExistingName= $bank->equalBanks()->whereIn('name', $removeArray)->delete();
            $existing_names = $bank->equalBanks->pluck('name')->toArray();
        }

        foreach($eqs as $eb) {
            if (!in_array($eb, $existing_names)) {
                $bank->equalBanks()->create(["name" => strtoupper($eb)]);
            }
        }

//        return redirect()->route('admins.bank.show');
        return redirect()->back();

    }

    /**
     * Should remove existing Court from database
     * @param $id
     * @return JsonResponse
     */
    public function destroy(Request $request)
    {
        $logId = $request->id;

        $delete = Court::find($logId);

        if($delete->checkUrlAttribute()) {
            Storage::delete($delete->path);
        }
        $delete->delete();
        if($request->ajax()){
            return response()->json(['status' => 'success']);
        }
        return redirect()->route('admins.court.index');
    }

}
