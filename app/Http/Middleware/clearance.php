<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class clearance {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {        
        // if (!Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
        // {
        //     return $next($request);
        // }

        if ($request->is('posts/create'))//If user is creating a post
         {
            if (!Auth::user()->hasPermissionTo('Create'))
         {
                abort('401');
            } 
         else {
                return $next($request);
            }
        }

        if ($request->is('posts/*/edit')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('Edit')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
         {
            if (!Auth::user()->hasPermissionTo('Delete')) {
                abort('401');
            } 
         else 
           {
                return $next($request);
            }
        }

        // if ($request->is('jobs'))//If user is creating a post
        //  {
          
        //         abort('404');
          
        // }

        return $next($request);
    }
}