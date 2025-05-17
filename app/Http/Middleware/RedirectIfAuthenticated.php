<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $user = Auth::user();

        if ($user) {
            switch ($user->role) {
                case 'admin':
                    
                    return redirect('/dashboard/admin');
                case 'guru':
                    return redirect('/dashboard/guru');
                case 'murid':
                    return redirect('/dashboard/murid');
                default:
                    return redirect('/'); 
            }
        }

        return $next($request);
    }
}
