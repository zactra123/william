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


class AffiliatesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }


    public function index()
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

    public function destroy($userId)
    {
        try {
            $user = User::find($userId);
            $user->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    public function pricing(Request $request)
    {
        if ($request->method()=="POST") {
            $pricing = $request->except(['_token']);
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
                return view('owner.affiliate.pricing._form', compact('pricing', 'default'))->withErrors($validator);
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
            return view('owner.affiliate.pricing._form', compact('pricing', 'default'));
        }

        $affiliates = User::affiliates()->get()->pluck('full_name', 'id')->toArray();

        $default_price_list = DisputesPricing::default();

        return view('owner.affiliate.pricing.list', compact('affiliates', 'default_price_list'));
    }

    public function pricing_affiliate(Request $request)
    {
        $default = DisputesPricing::default();
        $pricing = DisputesPricing::where("user_id", $request->id)->first();
        if (!$pricing) {
            $pricing = new DisputesPricing(["user_id"=>$request->id]);
        }
        return view('owner.affiliate.pricing._form', compact('pricing', 'default'));
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
