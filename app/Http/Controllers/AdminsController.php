<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;

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


}
