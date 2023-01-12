<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use App\Providers\RouteServiceProvider;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {

        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        if (!Cache::has("resend-verification")) {
            Auth::user()->resendEmailVerificationNotification();
            Cache::remember('resend-verification', 60 * 2, function () { // disabled for 2 minutes
                return true;
            });

            return redirect()->to(base(route("verification.notice")))->with([
                'success' => __("A verification link has been sent to your email address.")
            ]);
        }

        return redirect()->to(base(route("verification.notice")))->withErrors([
            'error' => __('Too many attempts!. Please try again after few min.')
        ]);

        $request->user()->sendEmailVerificationNotification();
    }
}
