<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = 'RouteServiceProvider::HOME';

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $get = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        //login with email n username
        $input = filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($input=>$get['username'], 'password'=> $get['password'])))
        {
            if (auth()->user()->type == 'admin'){
                return redirect()->route('dashboard-admin');
            }
            elseif(auth()->user()->type == 'customer'){
                return redirect()->route('welcome');
            }
            elseif(auth()->user()->type == 'petShop'){
                return redirect()->route('dashboard-petShop');
            }
            elseif(auth()->user()->type == 'vetClinic'){
                return redirect()->route('dashboard-vetClinic');
            }
            elseif(auth()->user()->type == 'veterinary'){
                return redirect()->route('dashboard-veterinary');
            }
        }
        else{
            return redirect()->route('login')->with('error', 'Sorry, Email or Password is INVALID!');
        }
    }
}
