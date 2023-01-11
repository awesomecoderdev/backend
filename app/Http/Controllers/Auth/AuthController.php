<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Response as JsonResponse;

class AuthController extends Controller
{

    /**
     * Return list of oauth providers.
     *
     * @return  array
     */
    protected $providers = [
        'google'
    ];

    /**
     * Process the oauth.
     *
     * @param  \Laravel\Socialite\Facades\Socialite  $driver
     * @return \Illuminate\Http\Response
     */
    public function oauth($driver)
    {
        if (!$this->oauthIsProviderAllowed($driver)) {
            return redirect()->back()->with([
                "success" => __("Something went wrong. Please try after sometimes.")
            ]);
        }

        try {
            return Socialite::driver($driver)->redirect();
        } catch (Exception $e) {
            return redirect()->back()->with([
                "success" => __("Something went wrong. Please try after sometimes.")
            ]);
        }
    }

    /**
     * Process the oauth callback.
     *
     * @param  \Laravel\Socialite\Facades\Socialite  $driver
     * @return \Illuminate\Http\Response
     */
    public function oauthCallback($driver)
    {
        try {
            $providerUser = Socialite::driver($driver)->user();
            if (!empty($providerUser->email) && !empty($providerUser->user)) {
                $user = User::where('email', $providerUser->getEmail())->first();
                $first_name = $providerUser->user["given_name"] ? $providerUser->user["given_name"] : $providerUser->getName();
                $last_name = $providerUser->user["family_name"] ? $providerUser->user["family_name"] : "";

                // if user already found
                if ($user) {
                    // update the avatar and provider that might have changed
                    $user->update([
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'avatar' => $providerUser->getAvatar(),
                        'provider' => $driver,
                        'provider_id' => $providerUser->getId(),
                        'access_token' => $providerUser->token
                    ]);
                } else {
                    // create a new user
                    $user = User::create([
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'email' => $providerUser->getEmail(),
                        'avatar' => $providerUser->getAvatar(),
                        'provider' => $driver,
                        'provider_id' => $providerUser->getId(),
                        'access_token' => $providerUser->token,
                        // user can use reset password to create a password
                        'password' => Hash::make(md5($providerUser->getAvatar() . time() . $providerUser->getId())),
                    ]);
                }

                event(new Registered($user));

                Auth::login($user, true);
                return Redirect::to(RouteServiceProvider::HOME);
            }
        } catch (Exception $e) {
            return Redirect::to(RouteServiceProvider::HOME);
        }
    }

    /**
     * Check the specified driver.
     *
     * @param  \Laravel\Socialite\Facades\Socialite  $driver
     * @return bool|Response
     */
    private function oauthIsProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
    }
}
