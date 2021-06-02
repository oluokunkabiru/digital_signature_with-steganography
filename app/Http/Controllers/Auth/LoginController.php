<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $redirectTo;
    public function redirectTo()
    {
        switch(Auth::user()->role){
            case 'staff':
            $this->redirectTo = route('staffDashboard'); //'/'. app()->getLocale(). '/users/admin';
            return $this->redirectTo;
                break;
            case 'student':
                    $this->redirectTo = route('staffDashboard'); //'/'. app()->getLocale(). '/users/dashboard';
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = route('welcome') ;//'/'. app()->getLocale(). '/login';
                return $this->redirectTo;
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
