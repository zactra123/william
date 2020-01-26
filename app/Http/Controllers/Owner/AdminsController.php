<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\NegativeType;
use App\AdminSpecification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    public function create()
    {
        $negativeType = NegativeType::all()
            ->pluck('name', 'id')
            ->toArray();
        return view('owner.admin.create', compact('negativeType'));
    }

    public function store(Request $request)
    {

        $admin = $request->admin;
        $admin ['password_confirmation'] = $admin['password'];
        $validation =  Validator::make($admin, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'negative_types' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validation->fails()){
            $negativeType = NegativeType::all()
                ->pluck('name', 'id')
                ->toArray();
            return view('owner.admin.create', compact('negativeType'))->withErrors($validation);
        }

        $userId = User::create([
            'first_name' => $admin['first_name'],
            'last_name' => $admin['last_name'],
            'email' => $admin['email'],
            'password' => Hash::make($admin['password']),
            'role'=>'admin',
        ])->id;

        foreach($admin['negative_types'] as $negativeTypes){
            AdminSpecification::create([
                'user_id' => $userId,
                'negative_types_id' => $negativeTypes,
            ]);
        }

        return redirect('owner/admin/list');
    }

    public function edit(Request $request)
    {
        dd($request);

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

    public function list()
    {

        $admins = User::where('role', 'admin')
            ->get();

        return view('owner.admin.list', compact( 'admins'));

    }



}
