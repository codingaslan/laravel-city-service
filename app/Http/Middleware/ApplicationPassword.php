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
        if (!isset($request->app_password) || $request->app_password !== config('app.application_password', 'DEFAULT_PASSWORD')) {
            //dd($request);
            return \response()->json([
                'status' => false,
                'code' => 'E000',
                'msg' => 'Unauthenticated. 1',
            ]);
        }
        return $next($request);
    }
}
