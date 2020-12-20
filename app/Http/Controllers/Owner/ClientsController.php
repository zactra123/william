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
        $users = User::clients()
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('CONCAT(u.last_name, " ",u.first_name) AS full_name'))
            ->paginate(10);

        return view('owner.client.index', compact( 'users'));
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

        echo json_encode(['success'=>1,'data'=>$data]);
        return;

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
