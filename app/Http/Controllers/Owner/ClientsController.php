<?php


namespace App\Http\Controllers\Owner;

use App\DisputesPricing;
use App\Http\Controllers\Controller;
use App\Jobs\ScrapeReports;
use App\Services\Screaper;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Validator;


class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }


    public function index()
    {
        dd('not work yet');
    }


    public function create()
    {
        dd('not work yet');
    }
    public function store(Request $request)
    {
        dd('not work yet');
    }

    public function destroy($userId)
    {
        try {
            $user = User::find($userId);
            $user->delete();

//            $path = 'files/client/details/image/'.$userId;
//            dd(\File::exists(public_path($path)), $userId, \File::deleteDirectory(public_path($path)));
//            if (\File::exists($path)) \File::deleteDirectory($path);
//
//            dd($user);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }
    public function show($clientId)
    {
        $client = User::clients()->find($clientId);

        return view('owner.client.client-profile2', compact('client'));
    }

    public function clientReportNumber(Request $request)
    {

        $data = $request->except('_token');

        $fullName = explode(' ',$data['full_name']);
        $firstName = $fullName['0'];
        $lastName = !emtpy($fullName['1'])?$fullName['1']:"";

        $update = User::where('id', $data['user_id'])->update([
            'first_name'=>$firstName,
            'full_name'=>$lastName
        ]);

        $updateClient = ClientDetail::where('user_id', $data['user_id'])
            ->update([
                'sex' =>$data['sex'],
                'address' => $data['address'],
                'phone_number'=> $data['phone_number'],

            ]);

//        @Todo: haskanal vortex enq pahum report numbernere
//        ReportNumber::cretae([
//
//            'user_id'=>$data['user_id'],
//            'ex_number'=>$data['ex_number'],
//            'eq_number'=>$data['eq_number'],
//            'tu_number'=>$data['tu_number'],
//            'ftc_number'=>$data['ftc_number'],
//            'dr_number'=>$data['dr_number'],
//        ]);

        echo json_encode(['success'=>1,'data'=>$data]);
        return;

    }

    public function update(Request $request)
    {
    }

    public function list()
    {
        $users = User::clients()
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('CONCAT(u.last_name, " ",u.first_name) AS full_name'))
            ->paginate(10);

        return view('owner.client.list', compact( 'users'));

    }

    public function affiliateList()
    {
        $users = DB::table('users')
                ->leftJoin('affiliates', 'affiliate_id', '=', 'users.id')
                ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                    'users.email as email', DB::raw('COUNT(affiliates.affiliate_id) as client'))
                ->where('role', 'affiliate')
                ->groupBy('users.id')
                ->get();
        return view('owner.client.affiliate', compact('users'));
    }

    public function pricing(Request $request)
    {
        if ($request->method()=="POST") {
            $pricing = $request->except(['_token', 'auto_repo']);
            $validate =new DisputesPricing();

            $validator =Validator::make($pricing,
                $validate->rules
            );

            if ($validator->fails()) {
                $default = DisputesPricing::default();
                $pricing = DisputesPricing::where("user_id", $request->user_id)->first();
                if (!$pricing) {
                    $pricing = new DisputesPricing(["user_id" => $request->user_id]);
                }
                dd($validator);
                return view('owner.pricing._form', compact('pricing', 'default'))->withErrors($validator);
            }

            if(isset($pricing['user_id'])){
                $disputePricing = DisputesPricing::where('user_id', $pricing['user_id']);
                if(!empty($disputePricing->first())){
                    $disputePricing = $disputePricing->update($pricing);
                }else{
                    $disputePricing = $disputePricing->create($pricing);
                }
            }else{
                $disputePricing = DisputesPricing::where('user_id', null);
                if(!empty($disputePricing->first())){
                    $disputePricing = $disputePricing->update($pricing);
                }else{
                    $disputePricing = $disputePricing->create($pricing);
                }
            }
            $default = DisputesPricing::default();
            $pricing = DisputesPricing::where("user_id", $request->user_id)->first();
            if (!$pricing) {
                $pricing = new DisputesPricing(["user_id" => $request->user_id]);
            }
            return view('owner.pricing._form', compact('pricing', 'default'));
        }

        $affiliates = User::affiliates()->get()->pluck('full_name', 'id')->toArray();

        $default_price_list = DisputesPricing::default();

        return view('owner.pricing.list', compact('affiliates', 'default_price_list'));
    }

    public function pricing_affiliate(Request $request)
    {
        $default = DisputesPricing::default();
        $pricing = DisputesPricing::where("user_id", $request->id)->first();
        if (!$pricing) {
            $pricing = new DisputesPricing(["user_id"=>$request->id]);
        }
        return view('owner.pricing._form', compact('pricing', 'default'));
    }


    public function scrape($client_id)
    {
//        $scraper = new Screaper($client_id);
//        $scraper->transunion_membership();
        $client = User::find($client_id);
        ScrapeReports::dispatch($client, [], 'experian_login');
        dd("test");
    }

}
