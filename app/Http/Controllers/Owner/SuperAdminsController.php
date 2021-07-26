<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\HomePageContent;
use Illuminate\Support\Facades\Validator;
use App\Events\LiveChat;
use Auth;

class SuperAdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    /**
     * @return \Illuminate\View\View "owner.index"
     *
     */
    public function index(Request $request)
    {
      $client = User::where('role','client')->orderby('id','desc')->take(10)->get();

        return view('owner.index',compact('client'));
    }


    public function create()
    {
        return view('owner.create');
    }


}
