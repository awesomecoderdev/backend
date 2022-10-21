<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as JsonResponse;

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

        // for production only
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         // return redirect(RouteServiceProvider::HOME);

        //         return Response::json([
        //             "success" => true,
        //             "status"    => JsonResponse::HTTP_NOT_ACCEPTABLE,
        //             "message"   => "You are Already Logged in",
        //             "redirect"  => true
        //         ], JsonResponse::HTTP_OK);
        //     }
        // }

        return $next($request);
    }
}
