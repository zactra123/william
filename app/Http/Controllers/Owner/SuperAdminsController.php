<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SuperAdminsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'superadmin']);
    }

    public function index()
    {


        return view('owner.index');
    }


    public function create()
    {

        return view('owner.create');

    }


}
