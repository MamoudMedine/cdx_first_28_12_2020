<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    protected $maxAttempts = 1;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/test';
    protected function redirectTo() {
        if(Auth::user()->roles == ["ROLE_CODEX"]) {
            return redirect()->route('dashboard_codex');
        }
        
        if(Auth::user()->roles == ["ROLE_ADMIN"]) {
            return redirect()->route('dashboard_admin');
        }
        
        if(Auth::user()->roles == ["ROLE_COOPEC"]) {
            return redirect()->route('dashboard_coopec');
        }
        
        if(Auth::user()->roles == ["ROLE_ADMIN_READ_ONLY"]) {
            return redirect()->route('dashboard_cro');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required',
            'password' => 'required',
        ], [
            "nom_utilisateur.required" => "Le nom d'utilisateur est requis",
            "password.required" => "Le mot de pasee est requis",
        ]);
    }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'nom_utilisateur';
    }
}