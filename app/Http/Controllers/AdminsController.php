<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ClientDetail;
use Illuminate\Http\Request;
use Response;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {

        return view('admin.index');
    }

    public function list()
    {
        $users = DB::table('users')
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('CONCAT(u.last_name, " ",u.first_name) AS full_name'))
            ->where('users.role', 'client')
            ->get();

        return view('admin.user-list', compact( 'users'));

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
        return view('admin.affiliate-list', compact('users'));
    }

    public function clientProfile($clientId)
    {
        $client = User::clients()->find($clientId);


       return view('admin.client-profile', compact('client'));


    }

    public function clientReportNumber(Request $request)
    {

        $data = $request->except('_token');

        $fullName = explode(' ',$data['full_name']);
        $firstName = $fullName['0'];
        $lastName = !emtpy($fullName['1'])?$fullName['1']:"";

        $update = User::where('id', $data['user_id'])->update([
            'first_name'=> strtoupper($firstName),
            'full_name'=> strtoupper($lastName)
        ]);

        $updateClient = ClientDetail::where('user_id', $data['user_id'])
            ->update([
                'sex' =>$data['sex'],
                'address' => strtoupper($data['address']),
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

    public function getNotifications()
    {
        $appointments = Message::where("call_date", ">", date("Y-m-d H:i:s"))
            ->where("call_date", "<", date("Y-m-d H:i:s", strtotime("+10 minutes")))
            ->get();


        return Response::json($appointments);
    }

}
