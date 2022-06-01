<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\includes\UserConst;

class LoginController extends Controller
{
    public function index() {
        return view('login.index');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $rules = ['email' => ['required', 'email'], 'password' => ['required']];
        $credentials = $request->validate($rules);
        
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended($this->authGetRoute());
        }
 
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Get authentication route.
     *
     * @param  void
     * @return string route
     */
    private function authGetRoute (){
        $route = '/';
        $userRole = Auth::user()["role_id"];

        if ($userRole == UserConst::ADMIN){
            $route = 'admin/users';
        }
        elseif ($userRole == UserConst::MANAGER){
            $route = 'admin/panel';
        }

        return $route;
    }

    /**
     * Log the user out of the application and redirect to login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->silentLogout($request);
        return redirect('login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function silentLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }
}
