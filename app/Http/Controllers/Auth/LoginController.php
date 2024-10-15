<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function showLogin(){
        session(['prevUrl' => url()->previous()]);
        return view('auth.login');
    }
    
    public function handleRedirectAuth(Request $request){
        switch ($request->driver) {
            case 'google': return Socialite::driver('google')->redirect(); 
            case 'facebook': return Socialite::driver('facebook')->redirect();
            case 'telegram':return Socialite::driver('telegram')->redirect();
            default: return '';
        }
    }
    public function googleCallback(){
        $user = Socialite::driver('google')->user();
        $user = User::updateOrCreate(['google_id' => $user->id],[
            'email' => $user->email,
            'first_name' => $user->name,
            'avatar' => $user->avatar,
            'provider' => 'google',
            'status' => 2,
            'last_active' => now(),
        ]);
        Auth::login($user);
        if(session()->get('prevUrl')){
            return redirect(session()->get('prevUrl'));
        }
        return redirect()->route('dashboard');
    }
    public function facebookCallback(){
        $user = Socialite::driver('facebook')->user();
        $user = User::updateOrCreate(['facebook_id' => $user->id],[
            'email' => $user->email,
            'first_name' => $user->name,
            'avatar' => $user->avatar,
            'provider' => 'google',
            'status' => 2,
            'last_active' => now(),
        ]);
        Auth::login($user);
        if(session()->get('prevUrl')){
            return redirect(session()->get('prevUrl'));
        }
        return redirect()->route('dashboard');
    }
    public function telegramCallback(){
        $user = Socialite::driver('telegram')->user();
        $user = User::updateOrCreate(['telegram_id' => $user->id],[
            'email' => $user->email,
            'first_name' => $user->name,
            'avatar' => $user->avatar,
            'provider' => 'google',
            'status' => 2,
            'last_active' => now(),
        ]);
        Auth::login($user);
        if(session()->get('prevUrl')){
            return redirect(session()->get('prevUrl'));
        }
        return redirect()->route('dashboard');
    }
}
