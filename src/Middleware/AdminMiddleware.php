<?php

namespace Merodiro\SimpleAdmin\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (optional(Auth::user())->admin === 1) {
            return $next($request);
        }

        return abort(Response::HTTP_FORBIDDEN);
    }
}
