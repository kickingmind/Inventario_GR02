<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
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
    //protected $redirectTo = '/aplicacion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /** public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/


    public function redirectPath()
    {
        if (Auth::user()->id_perfil == 4) {

            return '/operador';


        }elseif (Auth::user()->id_perfil == 3) {
            //return redirect()->to('admin');
             return '/aplicacion';
        }
    }

    
}
