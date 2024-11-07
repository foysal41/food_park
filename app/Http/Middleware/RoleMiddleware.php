<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        /*
            1. Normal User can't access our admin dashboard
            2. added new parameter $role. পরে এই  $role parameter middleware পাসস করে দিব
            3. if এর মদ্ধে জা করতাসি, user table এর মদ্ধে role column দুইটা তালিকা আছে। admin and user. মানে আমারা check করবো যে ইউজার টা login করসে সে কি admin বা user.
            4. finally return করে দিব dashbaod পেজ এ
            */

        if($request->user()->role === $role){
            return $next($request);
        }

        return to_route('dashboard');

    }
}
