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

        $validation =  Validator::make($admin, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'negative_types' => ['required'],
        ]);

        if ($validation->fails()){
            $negativeType = NegativeType::all()
                ->pluck('name', 'id')
                ->toArray();
            return view('owner.admin.create', compact('negativeType'))->withErrors($validation);
        }
        $user = User::create([
            'first_name' => $admin['first_name'],
            'last_name' => $admin['last_name'],
            'email' => $admin['email'],
            'role'=>'admin',
        ]);

        $userId = $user->id;

        foreach($admin['negative_types'] as $negativeTypes){
            AdminSpecification::create([
                'user_id' => $userId,
                'negative_types_id' => $negativeTypes,
            ]);
        }

        $user->sendEmailVerificationNotification();

        return redirect('owner/admin/list');
    }

    public function edit($id)
    {
        $admin = User::where('id', $id)
            ->where('role', 'admin')
            ->first();

        $negativeType = NegativeType::all()
            ->pluck('name', 'id')
            ->toArray();

        return view('owner.admin.edit', compact('admin', 'negativeType'));
    }

    public function update(Request $request, $id)
    {
        $admin = $request->admin;
        $admin['id'] = $id;

        $validation =  Validator::make($admin, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'negative_types' => ['required'],
        ]);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        User::where('id', $admin->id)
            ->update([
                'first_name' => $admin['first_name'],
                'last_name' => $admin['last_name'],
                'email' => $admin['email'],
                'password' => Hash::make($admin['password']),
                'role'=>'admin',
        ]);

        AdminSpecification::where('user_id', $admin['id'])->delete();

        foreach($admin['negative_types'] as $negativeTypes){
            AdminSpecification::create([
                'user_id' => $admin['id'],
                'negative_types_id' => $negativeTypes,
            ]);
        }

        return redirect('owner/admin/list');
    }


    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            AdminSpecification::where('user_id', $id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    public function show(Request $request)
    {
        dd('in show');
    }

    public function list()
    {

        $admins = User::where('role', 'admin')
            ->get();

        return view('owner.admin.list', compact( 'admins'));

    }





}
