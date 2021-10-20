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
        $this->middleware(["auth"]);
    }

  /**
   * Return View Site Settings
   */
    public function index()
    {
        $sitesettings = SiteSettings::where("id", "1")->first();
        return view("owner.site_settings.index", compact("sitesettings"));
    }

  /**
   * Update Slider
   */
    public function update_slider(Request $request)
    {
        $checkdata = SiteSettings::where("id", "1")->first();

        if (empty($checkdata)) {
            $slider = new SiteSettings();
            $slider->first_slider_title = $request->first_slider_title;
            $slider->first_slider_text = $request->first_slider_text;
            $slider->first_slider_button_text = $request->first_slider_button_text;
            $slider->first_slider_button_link = $request->first_slider_button_link;
            $slider->second_slider_title = $request->second_slider_title;
            $slider->second_slider_text = $request->second_slider_text;
            $slider->second_slider_button_text = $request->second_slider_button_text;
            $slider->second_slider_button_link = $request->second_slider_button_link;
            $slider->third_slider_title = $request->third_slider_title;
            $slider->third_slider_text = $request->third_slider_text;
            $slider->third_slider_button_text = $request->third_slider_button_text;
            $slider->third_slider_button_link = $request->third_slider_button_link;

            if ($request->hasFile("first_slider_image")) {
                $slider->first_slider_image = url("/storage/app/".$request->first_slider_image->store("images"));
            }

            if ($request->hasFile("second_slider_image")) {
                $slider->second_slider_image = url("/storage/app/".$request->second_slider_image->store("images"));
            }

            if ($request->hasFile("third_slider_image")) {
                $slider->third_slider_image = url("/storage/app/".$request->third_slider_image->store("images"));
            }

            $slider->save();
            return back()->with("success", "You successfully update slider!");

        } else {
            $slider = SiteSettings::where("id", "1")->update([
                "first_slider_title" => $request->first_slider_title,
                "first_slider_text" => $request->first_slider_text,
                "first_slider_button_text" => $request->first_slider_button_text,
                "first_slider_button_link" => $request->first_slider_button_link,
                "second_slider_title" => $request->second_slider_title,
                "second_slider_text" => $request->second_slider_text,
                "second_slider_button_text" => $request->second_slider_button_text,
                "second_slider_button_link" => $request->second_slider_button_link,
                "third_slider_title" => $request->third_slider_title,
                "third_slider_text" => $request->third_slider_text,
                "third_slider_button_text" => $request->third_slider_button_text,
                "third_slider_button_link" => $request->third_slider_button_link,
            ]);

            if ($request->hasFile("first_slider_image")) {
                SiteSettings::where("id", "1")->update([
                    "first_slider_image" => url( "/storage/app/".$request->first_slider_image->store("images")),
                ]);
            }

            if ($request->hasFile("second_slider_image")) {
                SiteSettings::where("id", "1")->update([
                    "second_slider_image" => url( "/storage/app/".$request->second_slider_image->store("images")),
                ]);
            }

            if ($request->hasFile("third_slider_image")) {
                SiteSettings::where("id", "1")->update([
                    "third_slider_image" => url(  "/storage/app/".$request->third_slider_image->store("images")),
                ]);
            }

            return back()->with("success", "You successfully update slider!");
        }
    }

  /**
   * Upadte Footer
   */
    public function update_footer(Request $request)
    {
        $checkdata = SiteSettings::where("id", "1")->first();

        if (empty($checkdata)) {
            $slider = new SiteSettings();
            $slider->address = $request->address;
            $slider->phone = $request->phone;
            $slider->email = $request->email;
            $slider->twitter_link = $request->twitter_link;
            $slider->facebook_link = $request->facebook_link;
            $slider->instagram_link = $request->instagram_link;
            $slider->skype_link = $request->skype_link;
            $slider->linkedin_link = $request->linkedin_link;
            $slider->save();

            return back()->with("success", "You successfully update footer!");
        } else {
            $slider = SiteSettings::where("id", "1")->update([
                "address" => $request->address,
                "phone" => $request->phone,
                "email" => $request->email,
                "twitter_link" => $request->twitter_link,
                "facebook_link" => $request->facebook_link,
                "instagram_link" => $request->instagram_link,
                "skype_link" => $request->skype_link,
                "linkedin_link" => $request->linkedin_link,
            ]);

            return back()->with("success", "You successfully update footer!");
        }
    }
}
