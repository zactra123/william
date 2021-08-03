<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Events\LiveChat;
use App\HomePageContent;
use App\User;
use App\Todo;
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
      $receptionist = User::where('role','receptionist')->get();
      $crediteducation = HomePageContent::all();
      $pendingtodo = Todo::where('status','0')->get();
      $compeletetodo = Todo::where('status','1')->get();
      return view('owner.index',compact('client','receptionist','crediteducation','pendingtodo','compeletetodo'));
    }


    public function create()
    {
        return view('owner.create');
    }


}
