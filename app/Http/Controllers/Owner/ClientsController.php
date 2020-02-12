<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

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
        dd($userId);
    }
    public function show($clientId)
    {
        $client = User::clients()->find($clientId);

        return view('owner.client.client-profile', compact('client'));
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
        dd('not work yet');

    }

    public function list()
    {
        $users = User::clients()
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('CONCAT(u.last_name, " ",u.first_name) AS full_name'))
            ->get();

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


}
