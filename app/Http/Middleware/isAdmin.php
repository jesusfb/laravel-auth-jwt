<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check session
        if(!session('isLogin')) {
            return redirect('/login')->with('loginFail', 'Please login !');
        }

        // Check role
        if(session('role') != 'Senior HRD') {
            return redirect('/')->with('message', 'Access Denied, please contact Senior HRD to access the page !');
        }

        return $next($request);
    }
}
