<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$scopes): Response
    {
        $user = auth()->user();

        if ($user->is_admin) return $next($request);
        if ($user->patient && in_array('patient', $scopes)) return $next($request);
        if ($user->doctor && in_array('doctor', $scopes)) return $next($request);

        return abort(403);
    }
}
