<?php

namespace Merodiro\SimpleRoles\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        abort_unless(optional(Auth::user())->hasRole($role), Response::HTTP_FORBIDDEN);
        return $next($request);
    }
}
