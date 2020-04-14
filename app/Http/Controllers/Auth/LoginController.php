<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;
use App\User;
use Str;
use Hash;
use App\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    
    protected function authenticated(Request $request, $user)
    {
        if (Auth::user()->roles->pluck('name')->contains('admin')) {
            return redirect('admin/users');
        }
        else {
            return redirect('http://127.0.0.1:8000/');
        }
    }
    
    public function github() {
        return Socialite::driver('github')->redirect();
    }
    
    public function githubRedirect() {
        $user = Socialite::driver('github')->user();
        
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);
        
        $userRole = Role::where('name','user')->first();
        $user->roles()->attach($userRole);
        
        Auth::login($user, true);
        
        return redirect('http://127.0.0.1:8000/');
    }
    
    
}
