<?php

namespace App\Http\Controllers\Receptionist;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ClientReport;
use App\Todo;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use App\User;
use App\ClientDetail;
use Response;
use PDF;



use App\Client_detail;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth',  'receptionist']);
    }

    public function list()
    {
        $users = DB::table('users')
            ->leftJoin('affiliates', 'affiliates.user_id', '=', 'users.id')
            ->leftJoin('users as u', 'u.id', '=', 'affiliates.affiliate_id')
            ->select('users.id as id', 'users.first_name as first_name', 'users.last_name as last_name',
                'users.email as email', DB::raw('CONCAT(u.last_name, " ",u.first_name) AS full_name'))
            ->where('users.role', 'client')
            ->paginate(10);

        return view('receptionist.client.list', compact( 'users'));

    }
    public function profile($clientId)
    {
        $client = User::clients()->find($clientId);
        $toDos = Todo::where('client_id', $clientId)->get();
        $user = User::where('role', 'admin')->get()->pluck('full_name', 'id')->toArray();

        return view('receptionist.client.profile', compact('client', 'user','toDos'));


    }
    public function clientToDo(Request $request)
    {

        $toDo = Todo::find($request->id);

        $view = view('helpers.to-do-form', compact('toDo'))->render();

        return response()->json(['status' => 200, 'view' => $view]);


    }




}
