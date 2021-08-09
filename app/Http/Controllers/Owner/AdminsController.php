<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Todo;
use App\AllowedIp;
use App\NegativeType;
use App\AdminSpecification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller
{
    /**
     * AdminsController constructor.
     * Should access only logged in user with Super Admin("superadmin") Role
     * Super Admin can view admins list, create, update or delete an admin
     * Created admin should have Ip address(es), which require to access Admin pages
     * Super Admin can assign multiple Negative Types, on which Admin should work on
     */
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    /**
     * @return \Illuminate\View\View "owner.admin.index" with @admins
     * @admins Users with role "admin" paginated 10
     */
    public function index()
    {
        $admins = User::where('role', 'admin')
            ->paginate(10);
        $todolist = Todo::orderby('id','desc')->take(10)->get();
        return view('owner.admin.index', compact('admins','todolist'));
    }

    /**
     *  Newly created admins can have multiple negative Types
     *  Using Negative Types to determine on which Disputes admin should work
     * @return \Illuminate\View\View "owner.admin.create" with @negativeType
     * @negativeType form "negative_types table"
     */
    public function create()
    {
        $negativeType = NegativeType::all()
            ->pluck('name', 'id')
            ->toArray();
        return view('owner.admin.create', compact('negativeType'));
    }

    /**
     * Create User with Admin Role (admin)
     * assign specific Ip Address(es) from which admin can access to the website
     * assign specific Negative Types which should be stored on "admin_specifications" table
     * after creating admin sending confirmation Email, where admin can specify their password
     * @param Request $request
     * request structure [admin=>[first_name:required, last_name:required, email:required, negative_types:array,required, ip_address:array,optional]]
     * @return redirect on success admin.index, on failed admin.create
     */
    public function store(Request $request)
    {
        $admin = $request->admin;
        $validation =  Validator::make($admin, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'negative_types' => ['required'],
        ]);

        if($validation->fails()){
            return redirect(route('owner.admin.create'))->withErrors($validation);
        }

        $user = User::create([
            'first_name' => $admin['first_name'],
            'last_name' => $admin['last_name'],
            'email' => $admin['email'],
            'role'=>'admin',
        ]);

        foreach($admin['ip_address'] as $key => $value){
        foreach ($value as $key => $ipAddress) {
          AllowedIp::create([
              'user_id'=> $user->id,
              'ip_address' => $ipAddress
          ]);
        }

       }

        foreach($admin['negative_types'] as $negativeTypes){
            AdminSpecification::create([
                'user_id' => $user->id,
                'negative_types_id' => $negativeTypes,
            ]);
        }

        $user->sendEmailVerificationNotification();

        return redirect('owner/admin');
    }

    /**
     * Update User with Admin Role (admin)
     * @param $id
     * @return \Illuminate\View\View 'owner.admin.edit', @admin, @negativeType
     */
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

    /**
     * Update existing User with Admin Role (admin)
     * assign specific Ip Address(es) from which admin can access to the website
     * assign specific Negative Types which should be stored on "admin_specifications" table
     * @param Request $request
     * request structure [admin=>[first_name:required, last_name:required, email:required, negative_types:array,required, ip_address:array[ip_address, id],optional]]
     * @return redirect on success admin.index, on failed admin.edit
     */
    public function update(Request $request, $id)
    {
        $admin = $request->admin;

        $validation =  Validator::make($admin, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'negative_types' => ['required'],
        ]);

        if ($validation->fails()){
            return redirect(route('owner.admin.edit', ["admin"=>$id]))
                ->withInput()
                ->withErrors($validation);
        }

        User::where('id', $id)
            ->update([
                'first_name' => $admin['first_name'],
                'last_name' => $admin['last_name'],
                'email' => $admin['email'],
                'role'=>'admin',
        ]);

        AdminSpecification::where('user_id', $id)->delete();

        foreach($admin['negative_types'] as $negativeTypes){
            AdminSpecification::create([
                'user_id' => $id,
                'negative_types_id' => $negativeTypes,
            ]);
        }
        if(isset($request->admin['ip_address'])){
            foreach($request->admin['ip_address'] as $ip){
                if (!empty($ip['id'])) {
                    if( AllowedIp::where('id', $ip['id'])->first()!= null){
                        AllowedIp::where('id', $ip['id'])->update(['ip_address'=> $ip['ip_address']]);
                    }
                } else {
                    AllowedIp::create([
                        'user_id'=> $id,
                        'ip_address'=> $ip['ip_address']
                    ]);
                }
            }
        }
        return redirect(route('owner.admin.index'));
    }

    /**
     * Should remove existing Admin from database
     * @param $id
     * @return JsonResponse
     */
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

    /**
     * Should Remove Allowed Ip address from database
     * @param Request $request structure [id:allowed_ips.id,required]
     * @return JsonResponse
     */
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

    /**
     * @param Request $request
     * request structure [password:required]
     * @param $adminId
     * @return \Illuminate\View\View
     */
    public function changePassword(Request $request,$adminId)
    {
        if($request->method()=="PUT"){
            $changePassword = $request->except("_token");

            $validation = Validator::make($changePassword, [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            if ($validation->fails()){
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            }

            User::whereId($adminId)->update([ 'password' => Hash::make($changePassword['password'])]);

            if(User::whereId($adminId)->first()->role == "admin"){
                return redirect(route('owner.admin.index'));
            }else{
                return redirect('owner.receptionist.index');
            }
        }

        $admin = User::where('id',$adminId)->whereIn('role', ['admin','receptionist'])->first();
        return view('owner.admin.change-password', compact('admin'));
    }

    /**
     * @param Request $request
     * Delete Admin
     * @param $adminId
     * @return \Illuminate\View\View
     */
     public function delete_admin($id)
     {
        $admin = User::where('id',$id)->delete();

        AllowedIp::where('user_id',$id)->delete();

        AdminSpecification::where('user_id',$id)->delete();

        return back()->with('success','You successfully delete admin!');
     }

}
