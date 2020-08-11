<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {                    
        if (!Auth::check()) return redirect('login');

        $user = Auth::user();

        foreach ($roles as $role)
        {
            if ($user->hasRole($role)) return $next($request);
        } 

        // nema prava, vratime na hlavni stranku
        return redirect('');
    }
}