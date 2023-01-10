<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidSubDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $subdomain = strtok(preg_replace('#^https?://#', '', rtrim($request->url(), '/')), '.');
        abort_if(!in_array($subdomain, config("app.subdomains")), \Illuminate\Http\Response::HTTP_NOT_FOUND);

        return $next($request);
    }
}
