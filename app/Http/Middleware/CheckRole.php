<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $userRoleId = Auth::check() ? Auth::user()->role_id : null;

        if ($userRoleId !== null && in_array($userRoleId, $roles)) {
            return $next($request);
        }
        return redirect('/');
    }
}
