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

class SettingControl extends Controller
{
  /**
   * ReceptionistsController constructor.
   * Should access only logged in user with Super Admin("superadmin") Role
   * Super Admin can view receptionists list, create, update or delete an receptionist
   * Created receptionist should have Ip address(es), which require to access Admin pages
   */
    public function __construct()
    {
        $this->middleware(["auth"]);
    }

  /**
   * @return \Illuminate\View\View "owner.receptionist.index" with @receptionists
   * @receptionists Users with role "receptionist" paginated 10
   */
    public function index()
    {
        return view("owner.setting.index");
    }

  /**
   * Update Profile
   */
    public function update_profile(Request $request)
    {
        User::where("id", Auth::user()->id)->update([
            "first_name" => $request->fisrt_name,
            "last_name" => $request->last_name,
            "phone" => $request->phone,
            "bio" => $request->bio,
            "address" => $request->address,
            "twitter" => $request->twitter,
            "facebook" => $request->facebook,
            "googleplus" => $request->googleplus,
            "linkedin" => $request->linkedin,
        ]);
        if ($request->hasFile("photo")) {
            $titleImage = $request->file("photo");
            $titleImageExtension = strtolower(
                $titleImage->getClientOriginalExtension()
            );

            $path = "image/profile/";
            $titleImageName =
                "title_image_" .
                date("Y_m_d_h_m_s") .
                "." .
                $titleImageExtension;
            $titleImage->move(public_path() . "/" . $path, $titleImageName);
            $pathTitleImage = "/" . $path . $titleImageName;
            User::where("id", Auth::user()->id)->update([
                "photo" => $pathTitleImage,
            ]);
        }
        return back()->with("success", "You successfully Updated Profile!");
    }

  /**
   * Change Password
   */
    public function change_userpasword(Request $request)
    {
        $oldpassword = User::where("id", Auth::user()->id)->first();
        if (hash::check($request->oldpassword, $oldpassword->password)) {
            if (
                $request->newpassword != null &&
                $request->newpassword != $request->confirmpassword
            ) {
                return back()->with("error", "New Password and confirm Password doesnot matched!");
                // return null;
                // $user->password = Hash::make($request->newpassword);
            }
            if (
                $request->newpassword != null &&
                $request->newpassword == $request->confirmpassword
            ) {
                User::where("id", Auth::user()->id)->update([
                    "password" => Hash::make($request->newpassword),
                ]);
            }

            return back()->with("success", "Password has successfully updated!");
        } else {
            return back()->with("error", "Old Password not Matched!");
        }
    }
}
