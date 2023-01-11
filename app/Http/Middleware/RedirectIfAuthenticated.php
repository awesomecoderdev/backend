<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        $subdomain = strtok(preg_replace('#^https?://#', '', rtrim($request->url(), '/')), '.');
        $error = $subdomain == "api";

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($error) {
                    return Response::json([
                        "success" => true,
                        "status"    => \Illuminate\Http\Response::HTTP_NOT_ACCEPTABLE,
                        "message"   => __("You are already logged in"),
                        "redirect"  => true
                    ],  \Illuminate\Http\Response::HTTP_OK);
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}
