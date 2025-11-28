<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 //use Laravel\Socialite\Socialite;
use Laravel\Socialite\Facades\Socialite; 
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{

    // Github Login Start
    public function githubredirect()
    {
        return Socialite::driver('github')->redirect();
    }
    public function githubcallback()
    {
        $providerUser = Socialite::driver('github')->user();

        $user = User::where('social_id', $providerUser->getId())
            ->orWhere('email', $providerUser->getEmail())
            ->first();
        if (!$user) {
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'social_id' => $providerUser->getId(),
                'social_name'=>'GitHub',
                'password' => str()->random(6),
            ]);
        }
        Auth::login($user, true);
        return redirect('/');

    }

    //End

    //Facebook Login Start
    public function facebookredirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function facebookcallback()
    {
        $providerUser = Socialite::driver('facebook')->user();
        dd($providerUser);

    }
    //End


}
