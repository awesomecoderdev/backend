<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsSubscribed
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
        if ($request->user() && !$request->user()->subscribed('Plagiarism')) {
            // This user is not a paying customer...
            return redirect()->route("client.subscriptions")->withErrors([
                "warning" => __("No subscriptions found."),
            ])->with([
                "redirect" => route("client.subscriptions"),
            ]);
        }

        return $next($request);
    }
}
