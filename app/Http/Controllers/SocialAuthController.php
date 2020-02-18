<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialAccountService;

class SocialAuthController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->scopes([
            'email', 'user_birthday'
        ])->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialAccountService $service)
    {
        $facebook_user = Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->user();
        dd($facebook_user);
        $user = $service->createOrGetUser(Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->user());
        dd('asdasd', $user);
        auth()->login($user);
        return redirect()->to('/home');
    }



    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();

//        return Socialite::driver('google')->fields([
//            'first_name', 'last_name', 'email', 'gender', 'birthday'
//        ])->scopes([
//            'email', 'user_birthday'
//        ])->redirect();
    }


    public function callbackGoogle(SocialFacebookAccountService $service)
    {

        $google_user = Socialite::driver('google')->user();
        dd($google_user);

//        $google_user = Socialite::driver('google')->fields([
//            'first_name', 'last_name', 'email', 'gender', 'birthday'
//        ])->user();
//        dd($google_user);
//        $user = $service->createOrGetUser(Socialite::driver('google')->fields([
//            'first_name', 'last_name', 'email', 'gender', 'birthday'
//        ])->user());
//        dd('asdasd', $user);
//        auth()->login($user);
//        return redirect()->to('/home');
    }






}