<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
            case 'petowner':
                if (Auth::guard('petowner')->check()) {
                    return redirect()->route('pet-owner.dashboard');
                }
                break;
            case 'boardingcenter':
                if (Auth::guard('boardingcenter')->check()) {
                    return redirect()->route('pet-boardingcenter.dashboard');
                }
                break;
            case 'admin':
                if (Auth::guard('admin')->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;
        }

        return $next($request);
    }
}
