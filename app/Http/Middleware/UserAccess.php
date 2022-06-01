<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use app\Models\includes\UserConst;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if (auth()->user()->is_active == 1){

            $roleId = 0;
            if($userType == 'manager'){
                $roleId = UserConst::MANAGER;
            }

            $requestUserRoleId = auth()->user()->role_id;
            
            if($requestUserRoleId == UserConst::ADMIN || $requestUserRoleId == $roleId){
                return $next($request);
            }
        }
        else{
            
            $email = auth()->user()->email;
            app('App\Http\Controllers\LoginController')->silentLogout($request);
    
            return back()->withErrors(['email' => 'Cet identifiant n\'est pas actif, veuillez contacter l\'administrateur.',
            ])->withInput(['email' => $email]);
        }

        return response()->view('login.index');
    }
}
