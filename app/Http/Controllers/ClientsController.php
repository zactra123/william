<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
use User;

use App\Client_detail;

class ClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'client']);
    }


    public function index()
    {
        return view('client.index');
    }

}
