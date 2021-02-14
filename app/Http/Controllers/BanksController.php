<?php

namespace App\Http\Controllers;

use App\AccountType;
use App\AccountTypeKeys;
use App\AccountTypeKeyWord;
use App\BankAddress;
use App\BankLogo;
use App\BankPhoneNumber;
use App\EqualBank;
use App\Http\Controllers\Controller;

use App\State;
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

    /**
     * BanksController constructor.
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
    public function showBankLogo(Request $request)
    {
        if(!is_null($request->term)){
            $phoneFaxZip =preg_replace('/[^0-9a-zA-Z]/', '', $request->term);

            $banksLogos = BankLogo::join('bank_addresses', 'bank_logos.id', '=', 'bank_addresses.bank_logo_id')
                ->leftJoin('equal_banks', 'bank_logos.id', '=', 'equal_banks.bank_logo_id')
                ->where(function($query) use($request, $phoneFaxZip)  {
                    $query->whereRaw("REPLACE(REPLACE(REPLACE(REPLACE(bank_logos.name, ',', ''), '.', ''), '\'', ''),'\"', '') LIKE '%{$request->term}%'")
                        ->orWhere('bank_addresses.name', 'LIKE', "%{$request->term}%")
                        ->orWhereRAW("CONCAT(COALESCE(bank_addresses.street, ''), ' ', COALESCE(bank_addresses.city, ''), ' ', COALESCE(bank_addresses.state, '')) LIKE '%{$request->term}%'")
                        ->orWhere('equal_banks.name', 'LIKE', "%{$request->term}%");
                        if ($phoneFaxZip) {
                            $query = $query->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(bank_addresses.phone_number, ',', ''), '.', ''), '(', ''), ')', ''), ' ', ''), '-', '') LIKE '%{$phoneFaxZip}%'")
                                ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(bank_addresses.fax_number, ',', ''), '.', ''), '(', ''), ')', ''), ' ', ''), '-', '') LIKE '%{$phoneFaxZip}%'")
                                ->orWhereRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(bank_addresses.zip, ',', ''), '.', ''), '(', ''), ')', ''), ' ', ''), '-', '') LIKE '%{$phoneFaxZip}%'");
                        }

                });

        }else{
            $banksLogos = BankLogo::where('bank_logos.name', 'LIKE', "%{$request->term}%");
        }

        if(!is_null($request->types)){
            $banksLogos = $banksLogos->whereIn('bank_logos.type', $request->types);
        }

        if ($request->no_logo) {
            $banksLogos = $banksLogos->where('bank_logos.path', null);
        }


        if (!empty($request->character)) {
            if ($request->character == '#'){
                $banksLogos = $banksLogos->whereRaw("TRIM(LOWER(name)) NOT REGEXP '^[a-z]'");
            } else {
                $banksLogos = $banksLogos->whereRaw("LOWER(`name`) LIKE '{$request->character}%'");
            }
        }
        $banksLogos = $banksLogos->groupBy('bank_logos.id')->select('bank_logos.*')->orderBy('bank_logos.name')->paginate(20);
        return view('furnishers.logo_new',compact('banksLogos'));

    }

    /**
     *  Newly created furnishers can have multiple addresses
     * @return \Illuminate\View\View "furnishers.create" with @account_types
     * @account_types form "account_types table"
     */
    public function create()
    {
        $account_types = AccountType::all()->pluck('name', 'id')->toArray();
        $banks = BankLogo::all()->pluck('name', 'id')->toArray();
        return view('furnishers.create', compact( 'account_types', 'banks'));
    }

    /**
     * Create furnisher with type bank, credit union, CRA, med services provider, etc...
     * @param Request $request
     * request structure []
     * @return redirect on success admins.bank.show, on failed furnishers.create
     */
    public function store(Request $request)
    {
        if ($request->term != null) {
            $banksLogos = BankLogo::where('name', 'LIKE', "%{$request->term}%");
            $banksLogos = $banksLogos->orderBy('name')->paginate(20);
            return view('furnishers.logo_new',compact('banksLogos'));
        }

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
            ->get()->mapWithKeys(function ($address) {
                return [$address->type => $address];
            });

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
     * Should remove existing Furnisher from database
     * @param $id
     * @return JsonResponse
     */
    public function deleteBankLogo(Request $request)
    {
        $logId = $request->id;

        $delete = BankLogo::find($logId);
        if($delete->checkUrlAttribute()) {
            Storage::delete($delete->path);
        }
        $delete->delete();
        if($request->ajax()){
            return response()->json(['status' => 'success']);
        }
        return redirect()->route('admins.bank.show');
    }

    /**
     * On change bank name returned  account types of the depend on the furnisher
     * types and account types keywords from date base     *
     * @param $bank_name
     * @return JsonResponse
     */
    public function banKName(Request $request)
    {
        $bankName = $request->bank_name;
        $type = $request->type;

        // Don't show any type if medical service provider or CRAs was selected
        if (in_array($type, [3,4,5,6,7])) {

            return Response::json([]);
        }

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

    /**
     * autocomplete furnisher registered agent addresses from database
     * @param $search_key
     * @return JsonResponse registered agent addresses
     */
    public function address_autocomplete(Request $request)
    {
        $addresses = BankAddress::where('type', $request->type)
            ->where('name', "like", "%{$request->search_key}%")->groupBy('name')->get()->toArray();

        return response()->json($addresses);
    }

    /**
     * autocomplete furnisher registered agent addresses from database
     * @param $search_key
     * @return JsonResponse registered agent addresses
     */
    public function parent_bank(Request $request)
    {
        $banks = BankLogo::where('name', "like", "%{$request->search_key}%")->groupBy('name')->get()->toArray();

        return response()->json($banks);
    }

    /**
     * @return \Illuminate\View\View "furnishers.types" with @accountTypes
     * @accountTypes  form "account_types table"
     *
     * Create account types with type default or not
     * Add keyword on account type keys table
     * @param Request $request
     * request structure ['account_type'=>['name', 'type'], 'account_type_keys'=>['key_word']]
     * @return redirect on success furnishers.types, on failed return back with errors
     *
     */
    public function types(Request $request)
    {
        if($request->isMethod("post")){

            $accountType =$request->account_type;
            $validation =  Validator::make($accountType, [
                'name'=>['required', 'string', 'max:255'],
            ]);

            if ($validation->fails()){
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            }
            $check_type = AccountType::firstWhere("name", $request->account_type["name"]);
            if ($check_type) {
                return redirect()->route('admins.bank.types')
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
            return redirect()->route('admins.bank.types');
        }
        $accountTypes = AccountType::with('accountKeys')->get();
        return view('furnishers.types',compact('accountTypes'));
    }

    /**
     * Update account type key words
     * @param $request
     * @return JsonResponse
     */
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

    /**
     * Update account type  types (default or not)
     * @param $request
     * @return JsonResponse
     */
    public function update_type_default(Request $request)
    {
        $account_type = AccountType::find($request->account_type);
        if (!$account_type) {
            return response('Account Type not found', 404);
        }

        $account_type->update(['type' => (int) ($request->type == "true")]);
        return response()->json(['status' => 'success']);
    }

    /**
     * Should remove existing account types from database
     * @param $id
     * @return JsonResponse
     */
    public function delete_types($id)
    {
        AccountType::destroy($id);
        return response()->json(['status' => 'success']);
    }

    /**
     * Selectize key word for added
     * @param $request->search_key
     *@return JsonResponse
     */
    public function keywords(Request $request)
    {
        $result = AccountTypeKeys::where('account_type_keys.key_word', 'LIKE', "%{$request->search_key}%")->get(["id","key_word"]);
        return response()->json($result);
    }

    /**
     * @return \Illuminate\View\View "furnishers.judicial_day" with
     * @accountTypes  form "states table"
     *
     * Create mortgage judicial non judicial days for state
     *
     */
    public function mortgageDays(Request $request)
    {
        if($request->type == 'non_judicial'){
            $states = State::where('type', 1)->orderBy('name')->get();
        }elseif($request->type == 'judicial'){
            $states = State::where('type', 2)->orderBy('name')->get();
        }else{
            $states = State::all()->sortBy('name');
        }

        $stateArr = State::select(DB::raw('CONCAT(full_name, "(",name,")") AS name'), 'id')->pluck('name', 'id')->toArray();
        if ($request->method()=="POST") {
            $id =$request->id;
            $days = $request->except(['_token', 'id']);
            State::whereId($id)->update($days);
        }

        return view('furnishers.judicial_day', compact('stateArr', 'states'));
    }

    public function state(Request $request)
    {
        $state =  State::whereId($request->id)->first();
        return view('furnishers._form', compact('state'));
    }



}
