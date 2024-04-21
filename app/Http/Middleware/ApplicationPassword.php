<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationPassword
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!isset($request->app_passwprd) || $request->app_passwprd !== config('application_password', 'DEFAULT_PASSWORD')) {
            return \response()->json([
                'status' => false,
                'code' => 'E000',
                'msg' => 'Unauthenticated. '
            ]);
        }
        return $next($request);
    }
}
