<?php


namespace App\Http\Controllers;
use Socialite;
use Illuminate\Http\Request;
use App\User;
use App\ClientDetail;
use App\SocialAccount;
use Illuminate\Auth\Events\Verified;

class SocialAuthController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect(Request $request)
    {

        return Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->scopes([
            'email'
        ])->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
        $facebookUser = Socialite::driver('facebook')->fields([
            'first_name', 'last_name', 'email', 'gender', 'birthday'
        ])->stateless()->user();


        $account = SocialAccount::where('provider','facebook')
            ->where('provider_user_id',$facebookUser->user['id'])
            ->first();

        if (!$account) {

            $user = User::where('email', $facebookUser->user['email'])->first();
            if ($user) {
                return redirect()->to('/login')
                    ->withErrors("User with this mail was already registered!!");
            }

            $account = new SocialAccount([
                'provider_user_id' => $facebookUser->user['id'],
                'provider' => 'facebook'
            ]);

            $user = User::create([
                'email' => $facebookUser->user['email'],
                'first_name' => $facebookUser->user['first_name']?? '',
                'last_name'=> $facebookUser->user['last_name']?? '',
                'role'=>'client'
            ]);
            if(isset($facebookUser->user['birthday'])){
                ClientDetail::create([
                    'user_id' => $user->id,
                    'dob' => $facebookUser->user['birthday'],
                    'registration_steps' => 'documents'

                ]);
            }else{
                ClientDetail::create([
                    'user_id' => $user->id,
                    'registration_steps' => 'documents'
                ]);
            }

            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }


            $account->user()->associate($user);
            $account->save();

            auth()->login($account->user);
            return redirect()->to('/client/registration-steps')->with('success','Congrats! You just did something really wise');
        }

        auth()->login($account->user);
        return redirect()->to('/client/details');
    }



    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();

    }

    public function callbackGoogle()
    {

        $googleUser = Socialite::driver('google')->stateless()->user();

        $account = SocialAccount::where('provider','google')
            ->where('provider_user_id',$googleUser->user['id'])
            ->first();
        if (!$account) {
            $account = new SocialAccount([
                'provider_user_id' => $googleUser->user['id'],
                'provider' => 'google'
            ]);
            $user = User::where('email', $googleUser->user['email'])->first();


            if ($user) {

                return redirect()->to('/login')
                    ->withErrors(['error'=> "User with this mail was already registered!!"]);
            }

            $user = User::create([
                'email' => $googleUser->user['email'],
                'first_name' => $googleUser->user['given_name'] ?? '',
                'last_name'=> $googleUser->user['family_name'] ?? '',
                'role'=>'client'
            ]);
            ClientDetail::create([
                'user_id' => $user->id,
                'registration_steps'=> 'documents',

            ]);

            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }


            $account->user()->associate($user);
            $account->save();
            auth()->login($account->user);

            return redirect()->to('/client/registration-steps')->with('success','Congrats! You just did something really wise');
        }

        auth()->login($account->user);
        if (empty(auth()->user()->clientDetails)){

            return redirect()->to('/client/registration-steps');
        }else{
            return redirect()->to('/client/details');
        }




    }






}
