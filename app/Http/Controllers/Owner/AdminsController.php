<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\AllowedIp;
use App\NegativeType;
use App\AdminSpecification;
use Illuminate\Support\Facades\Validator;

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

        foreach($admin['ip_address'] as $ipAddress){

            AllowedIp::create([
                'user_id'=> $user->id,
                'ip_address' => $ipAddress
            ]);
       }

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

        User::where('id', $admin['id'])
            ->update([
                'first_name' => $admin['first_name'],
                'last_name' => $admin['last_name'],
                'email' => $admin['email'],
                'role'=>'admin',
        ]);

        AdminSpecification::where('user_id', $admin['id'])->delete();

        foreach($admin['negative_types'] as $negativeTypes){
            AdminSpecification::create([
                'user_id' => $admin['id'],
                'negative_types_id' => $negativeTypes,
            ]);
        }
        if(isset($request->admin['ip_address'])){
            foreach($request->admin['ip_id']  as $key =>$id){

                if( AllowedIp::where('id', $id)->first()!= null){
                    AllowedIp::where('id', $id)->update(['ip_address'=> $request->admin['ip_address'][$key]]);
                }
            }
        }
        if(isset($request->admin['ip_address_new'])){
            foreach($request->admin['ip_address_new'] as $newIp){
                AllowedIp::create([
                    'user_id'=> $admin['id'],
                    'ip_address'=> $newIp
                ]);
            }
        }

        return redirect('owner/admin/list');
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            AdminSpecification::where('user_id', $id)->delete();
            AllowedIp::where('user_id', $id)->delete();
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

    public function deleteIp(Request $request)
    {
       $id = $request->id;

        try {
            AllowedIp::where('id', $id)->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

}
