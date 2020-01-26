<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth;
use App\Client_detail;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }


    public function index()
    {
        dd('dasdas');
    }


    public function create()
    {
        dd('dasdas');
    }
    public function store(Request $request)
    {
        dd('dasdas');
    }

    public function destroy($userId)
    {
        dd($userId);
    }
    public function show(Request $request)
    {
        dd('dasdas');
    }

    public function update(Request $request)
    {
        dd('in update');

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
