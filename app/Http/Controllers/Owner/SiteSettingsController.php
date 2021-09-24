<?php


namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\AllowedIp;
use Response;
use Auth;
use Hash;

class SiteSettingsController extends Controller
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
     * @return \Illuminate\View\View "owner.receptionist.index" with @receptionists
     * @receptionists Users with role "receptionist" paginated 10
     */
    public function index()
    {
      return view('owner.site_settings.index');
    }


}
