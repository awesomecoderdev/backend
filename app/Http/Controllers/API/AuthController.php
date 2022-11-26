<?php

namespace App\Http\Controllers\API;

use Exception;
use Carbon\Carbon;
use Faker\Factory;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\AuthUserRequest;
use App\Notifications\LogNotification;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use App\Notifications\SendNotification;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Response as JsonResponse;
use App\Http\Requests\VerifyEmailVerificationRequest;

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
     * Display status of the ping.
     *
     * @return \Illuminate\Http\Response
     */
    public function ping(Request $request)
    {
        // Auth::user()->sendEmailVerificationNotification();

        return Response::json([
            "success" => true,
            'status'  => JsonResponse::HTTP_OK,
            "message" => "Successfully Authorized.",
            "auth" => Auth::check(),
            "theme" => Session::get("theme", "light"),
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        // Auth::user()->sendEmailVerificationNotification();

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "verified" => Auth::user()->hasVerifiedEmail(),
            "alert" => Auth::user()->unreadNotifications()->count() !== 0,
            "auth" => UserResource::make(
                Auth::user()
            ),
            // "notifications" => Auth::user()->notifications
        ], JsonResponse::HTTP_ACCEPTED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function register(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_CREATED,
            "message" => "User successfully created!",
            "verified" => Auth::user()->hasVerifiedEmail(),
            "auth" => UserResource::make(
                Auth::user()
            ),
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(AuthUserRequest $request)
    {

        if (!Auth::check()) {
            if (Auth::guard('web')->attempt(["email" => $request->email, "password" => $request->password])) {
                $user = Auth::user();
                // DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->delete();
                // $token = $user->createToken($user->name)->plainTextToken;
                return Response::json(
                    [
                        "success" => true,
                        'status'    => JsonResponse::HTTP_ACCEPTED,
                        "message" => "Successfully Authorized.",
                        "verified" => Auth::user()->hasVerifiedEmail(),
                        "auth" => UserResource::make(
                            Auth::user()
                        ),
                        // "notifications" => Auth::user()->notifications
                    ],
                    JsonResponse::HTTP_OK
                );
            }
        }

        return Response::json([
            'success'   => false,
            'status'    => JsonResponse::HTTP_UNAUTHORIZED,
            'message'   => 'Unauthorized Access.',
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Process the oauth.
     *
     * @param  \Laravel\Socialite\Facades\Socialite  $driver
     * @return \Illuminate\Http\Response
     */
    public function oauth($driver)
    {
        if (!$this->oauthIsProviderAllowed($driver)) {
            return Response::json([
                "success" => false,
                'status'    => JsonResponse::HTTP_NOT_ACCEPTABLE,
                "message" => "{$driver} is not currently supported",
            ], JsonResponse::HTTP_OK);
        }

        try {
            // return Socialite::driver($driver)->redirect();
            // return Socialite::driver($driver);
            $oauth = Socialite::driver($driver)->redirect()->getTargetUrl();
            return Response::json([
                "success" => true,
                'status'    => JsonResponse::HTTP_ACCEPTED,
                "message" => "Successfully Authorized.",
                "oauth" => $oauth
            ], JsonResponse::HTTP_OK);
        } catch (Exception $e) {
            // You should show something simple fail message
            return Response::json([
                "success" => false,
                'status'    => JsonResponse::HTTP_NOT_ACCEPTABLE,
                "message" => $e->getMessage(),
            ], JsonResponse::HTTP_OK);
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

                Auth::login($user);
                return Redirect::to(env("APP_FRONTEND_URL") . "/?oauth=true");
            }
        } catch (Exception $e) {
            $err = $e->getMessage();
            return Redirect::to(env("APP_FRONTEND_URL"))->withErrors("hello", "How are you");
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function notifications(Request $request)
    {
        // Notification::send(User::all(), new UserNotification("Hello how are you."));
        // $request->user()->notify(new SendNotification([
        //     "title" => "User Notification",
        //     "message" => "Hello how are you.",
        // ]));

        // $faker = Factory::create();

        // for ($i = 0; $i < 10; $i++) {
        //     $request->user()->notify(new SendNotification([
        //         "title" => $faker->text,
        //         "message" => $faker->text,
        //     ]));
        // }


        // $notifications = Cache::remember("notifications_" . $request->user()->id, 60 * 60, function () use ($request) {
        //     return $request->user()->notifications;
        // });

        $notifications = $request->user()->notifications;
        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "alert" => Auth::user()->unreadNotifications()->count() !== 0,
            "data" => $notifications,
        ], JsonResponse::HTTP_OK);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function markAsReadNotification(Request $request)
    {
        Cache::forget("notifications_" . $request->user()->id);
        $request->user()->unreadNotifications->when($request->input('id'), function ($query) use ($request) {
            return $query->where('id', $request->input("id"));
        })->markAsRead();

        $notifications = Cache::remember("notifications_" . $request->user()->id, 60 * 60, function () use ($request) {
            return $request->user()->notifications;
        });

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "alert" => Auth::user()->unreadNotifications()->count() !== 0,
            "data" => $notifications,
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function verification(VerifyEmailVerificationRequest $request, User $user)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return Response::json([
                "success" => true,
                'status'    => JsonResponse::HTTP_OK,
                "message" => "Your account is already verified.",
                "verified" => $request->user()->hasVerifiedEmail(),
                "redirect" => true,
            ], JsonResponse::HTTP_ACCEPTED);
        }

        if ($request->user()->markEmailAsVerified()) {
            $request->fulfill();
        }

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_OK,
            "message" => "Your account has been successfully verified.",
            "verified" => $request->user()->hasVerifiedEmail(),
            "redirect" => true,
        ], JsonResponse::HTTP_ACCEPTED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function resendVerification()
    {
        if (!Cache::has("resend-verification")) {
            Auth::user()->resendEmailVerificationNotification();
            Cache::remember('resend-verification', 60 * 2, function () { // disabled for 2 minutes
                return true;
            });
            return Response::json([
                "success" => true,
                'status'  => JsonResponse::HTTP_OK,
                "message" => "We have sent an email with a confirmation link to your email address.",
            ], JsonResponse::HTTP_OK);
        }

        return Response::json([
            "success" => false,
            'status'  => JsonResponse::HTTP_BAD_REQUEST,
            "message" => 'Something went wrong. Please try again after few min.',
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function logout(User $user)
    {
        Session::flush();
        Auth::guard('web')->logout();
        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Logout.",
        ], JsonResponse::HTTP_OK);


        // if (Session::flush() && Auth::guard('web')->logout()) {
        //     return Response::json([
        //         "success" => true,
        //         'status'    => JsonResponse::HTTP_ACCEPTED,
        //         "message" => "Successfully Logout.",
        //     ], JsonResponse::HTTP_OK);
        // } else {
        //     return Response::json([
        //         'success'   => false,
        //         'status'    => JsonResponse::HTTP_BAD_REQUEST,
        //         'message'   => 'Something went wrong.',
        //     ], JsonResponse::HTTP_OK);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function charts(Request $request)
    {

        $orders = Order::where("user_id", 1)->select(DB::raw('count(id) as `count`'), DB::raw("CONCAT_WS('-',DAY(created_at),MONTH(created_at),YEAR(created_at)) as date"))
            ->groupBy('date')
            ->orderBy("count")
            ->get();

        $orders = $orders->groupBy(function ($date) {
            return Carbon::parse($date->date)->format('M-Y');
        }, false);

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
            "data" => $orders
        ], JsonResponse::HTTP_OK);
    }
}
