<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\AllowedIp;
use App\SiteSettings;
use Response;
use Auth;
use Hash;

class TranslationController extends Controller
{
    /**
     * ReceptionistsController constructor.
     * Should access only logged in user with Super Admin("superadmin") Role
     * Super Admin can view receptionists list, create, update or delete an receptionist
     * Created receptionist should have Ip address(es), which require to access Admin pages
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Return View Translation Settings
     */
    public function index()
    {
      return view('owner.translation.index');
    }

    /**
     * Create Translation
     */
     public function create()
     {
       return view('owner.translation.create');
     }

}
