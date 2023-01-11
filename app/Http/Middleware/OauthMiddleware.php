<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class OauthMiddleware
{
    protected $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $output = $next($request);
        $subdomain = strtok(preg_replace('#^https?://#', '', rtrim($request->url(), '/')), '.');
        if ($subdomain == "oauth") {
            $route = $request->route() != null ? $request->route()->getName() : false;
            if (!$route) {
                return redirect()->to(base(route("login")))->withErrors([
                    "error" => __("Something went wrong. Please try after sometimes.")
                ]);
            }
        };

        return $output;
    }
}
