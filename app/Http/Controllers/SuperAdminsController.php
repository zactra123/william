<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    public function index()
    {


        return view('owner.index');
    }


    public function create()
    {

        return view('owner.create');

    }
    public function store(Request $request)
    {
        $admin = $request->admin;
        $admin ['password_confirmation'] = $admin['password'];
        $validation =  Validator::make($admin, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validation->fails()){
            return view('owner.create')->withErrors($validation);
        }

        User::create([
            'first_name' => $admin['first_name'],
            'last_name' => $admin['last_name'],
            'email' => $admin['email'],
            'password' => Hash::make($admin['password']),
            'role'=>'admin',
        ]);

        return redirect('owner/admin-list');
    }

    public function destroy(Request $request)
    {
        dd($request);
    }
    public function show(Request $request)
    {
        dd('in show');
    }

    public function update(Request $request)
    {
        dd('in update');

    }

    public function adminList()
    {
        $admins = User::where('role', 'admin')
            ->select('id', 'first_name', 'last_name', 'email')
            ->get()
            ->toArray();
        return view('owner.admin-list', compact( 'admins'));

    }
    public function adminDestroy($admin)
    {
        dd($admin);
    }


    public function userList()
    {
        $users = User::where('role', 'client')
            ->select('id', 'first_name', 'last_name', 'email')
            ->get()
            ->toArray();

        return view('owner.user-list', compact( 'users'));
    }
    public function userShow()
    {
        dd("sdfghjk");
    }
    public function userDestroy($userId)
    {
        dd($userId);

    }

}
