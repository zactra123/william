<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;
use App\AllowedIp;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ReceptionistsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    public function create()
    {

        return view('owner.receptionist.create');
    }

    public function store(Request $request)
    {
        $receptionist = $request->receptionist;


        $validation =  Validator::make($receptionist, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($validation->fails()){

            return view('owner.receptionist.create')->withErrors($validation);
        }
        $user = User::create([
            'first_name' => $receptionist['first_name'],
            'last_name' => $receptionist['last_name'],
            'email' => $receptionist['email'],
            'role'=>'receptionist',
        ]);
        foreach($receptionist['ip_address'] as $ipAddress){

            AllowedIp::create([
                'user_id'=>$user->id,
                'ip_address' => $ipAddress,
            ]);
        }



        $user->sendEmailVerificationNotification();

        return redirect('owner/receptionist/list');
    }

    public function edit($id)
    {
        $receptionist = User::where('id', $id)
            ->where('role', 'receptionist')
            ->first();


        return view('owner.receptionist.edit', compact('receptionist'));
    }

    public function update(Request $request, $id)
    {
        $receptionist = $request->admin;
        $receptionist['id'] = $id;

        $validation =  Validator::make($receptionist, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        User::where('id', $receptionist->id)
            ->update([
                'first_name' => $receptionist['first_name'],
                'last_name' => $receptionist['last_name'],
                'email' => $receptionist['email'],
                'role'=>'receptionist',
            ]);


        return redirect('owner/receptionist/list');
    }

    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    public function list()
    {
        $receptionists = User::where('role', 'receptionist')
            ->get();

        return view('owner.receptionist.list', compact( 'receptionists'));

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
