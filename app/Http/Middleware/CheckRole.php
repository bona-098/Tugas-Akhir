<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        //jika akun yang login sesuai dengan role 
        //maka silahkan akses
        //jika tidak sesuai akan diarahkan ke home
    
        // $roles = array_slice(func_get_args(), 2);
    
        // foreach ($roles as $role) { 
        //     $user = \Auth::user()->role;
        //     if( $user == $role){
        //         return $next($request);
        //     }
        // }
    
        if (auth()->user() && in_array(auth()->user()->role, $roles))
        {
            return $next($request);
        }
        
        return redirect('/');
    }

}