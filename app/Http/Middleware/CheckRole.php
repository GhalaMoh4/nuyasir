<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || $user->role != $role) {
            return abort(403, 'ليس لديك الصلاحية للدخول لهذه الصفحة.');
        }

        return $next($request);
    }
}
