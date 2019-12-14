<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth;
use App\User;
use App\Client_detail;

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
        $users = User::where('role', 'client')
            ->select('id', 'first_name', 'last_name', 'email')
            ->get()
            ->toArray();
        return view('owner.client.list', compact( 'users'));

    }


}
