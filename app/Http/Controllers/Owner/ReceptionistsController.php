<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\User;
use App\AllowedIp;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ReceptionistsController extends Controller
{
    /**
     * ReceptionistsController constructor.
     * Should access only logged in user with Super Admin("superadmin") Role
     * Super Admin can view receptionists list, create, update or delete an receptionist
     * Created receptionist should have Ip address(es), which require to access Admin pages
     */
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    /**
     * @return \Illuminate\View\View "owner.receptionist.index" with @receptionists
     * @receptionists Users with role "receptionist" paginated 10
     */
    public function index()
    {
        $receptionists = User::where('role', 'receptionist')
            ->paginate(10);
        return view('owner.receptionist.index', compact( 'receptionists'));

    }

    /**
     * @return \Illuminate\View\View "owner.receptionist.create"
     *
     */
    public function create()
    {
        return view('owner.receptionist.create');
    }

    /**
     * Create User with Receptionist Role (receptionist)
     * assign specific Ip Address(es) from which admin can access to the website
     * after creating admin sending confirmation Email, where admin can specify their password
     * @param Request $request
     * request structure [receptionist=>[first_name:required, last_name:required, email:required, ip_address:array,optional]]
     * @return redirect on success receptionist.index, on failed receptionist.create
     */
    public function store(Request $request)
    {
        $receptionist = $request->receptionist;

        $validation =  Validator::make($receptionist, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        if ($validation->fails()){
            // return view('owner.receptionist.create')->withErrors($validation);
            return view('owner.receptionist.create')->with('error','Your fields are empty please add data in it!');
        }
        $user = User::create([
            'first_name' => $receptionist['first_name'],
            'last_name' => $receptionist['last_name'],
            'email' => $receptionist['email'],
            'role'=>'receptionist',
        ]);
        foreach($receptionist['ip_address'] as $ipAddress){
            AllowedIp::create([
                'user_id'=> $user->id,
                'ip_address' => $ipAddress,
            ]);
        }

        $user->sendEmailVerificationNotification();

        return redirect(route('owner.receptionist.index'));
    }
    /**
     * Update User with Receptionist Role (receptionist)
     * @param $id
     * @return \Illuminate\View\View 'owner.receptionist.edit', @receptionist
     */
    public function edit($id)
    {
        $receptionist = User::where('id', $id)
            ->where('role', 'receptionist')
            ->first();

        return view('owner.receptionist.edit', compact('receptionist'));
    }

    /**
     * Update existing User with Receptionist Role (receptionist)
     * assign specific Ip Address(es) from which admin can access to the website
     * @param Request $request
     * request structure [receptionist=>[first_name:required, last_name:required, email:required, ip_address:array[ip_address, id],optional]]
     * @return redirect on success receptionist.index, on failed receptionist.edit
     */
    public function update(Request $request, $id)
    {
        $receptionist = $request->receptionist;

        $validation =  Validator::make($receptionist, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validation->fails()){
            // return redirect(route('owner.receptionist.edit', ["receptionist" => $id]))
            //     ->withInput()
            //     ->withErrors($validation);
                return redirect(route('owner.receptionist.edit', ["receptionist" => $id]))->with('error','Your fields are empty please add data in it!');
        }

        User::where('id', $id)
            ->update([
                'first_name' => $receptionist['first_name'],
                'last_name' => $receptionist['last_name'],
                'email' => $receptionist['email'],
                'role'=>'receptionist',
            ]);

        if(isset($request->receptionist['ip_address'])){
            foreach($request->receptionist['ip_address'] as $ip){
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

        return redirect(route('owner.receptionist.index'));
    }

    /**
     * Should remove existing Receptionist from database
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();

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
        try {
            AllowedIp::where('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'msg' => $e->getMessage()]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     *  Delete Receptionist
     * @param Request
     * @return JsonResponse
     */
     public function delete_receptionist($id)
     {
       $user = User::where('id',$id)->delete();

       AllowedIp::where('user_id',$id)->delete();

       return back()->with('success','You successfully delete receptionist!');


     }
}
