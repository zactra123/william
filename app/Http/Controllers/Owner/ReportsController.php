<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\User;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    /*
     * The index action show registered clients report
     */
    public function index(Request $request)
    {

        $dates = $request->all();
        $dates["from"] = isset($dates["from"]) ? $dates["from"] : date('Y-m-01');
        $dates["to"] = isset($dates["to"]) ? $dates["to"] : date('Y-m-d');

        $clients = User::clients()
                    ->where("created_at", ">", $dates["from"])
                    ->where("created_at", "<", $dates["to"]);
          $users = User::where('role','client')->where("created_at", ">", $dates["from"])->where("created_at", "<", $dates["to"])->orderby('id','desc')->get();
        return view('owner.report.index', compact(['clients','dates','users']));

    }
}
