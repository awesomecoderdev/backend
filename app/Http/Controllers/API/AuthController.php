<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\VerifyEmailVerificationRequest;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as JsonResponse;

class AuthController extends Controller
{
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
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function notifications(Request $request)
    {
        // $request->user()->notify(new UserNotification("Hello how are you."));
        // Notification::send(User::all(), new UserNotification("Hello how are you."));

        $notifications = Cache::remember("notifications_" . $request->user()->id, 60 * 60, function () use ($request) {
            return $request->user()->notifications;
        });

        return Response::json([
            "success" => true,
            'status'    => JsonResponse::HTTP_ACCEPTED,
            "message" => "Successfully Authorized.",
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
            Auth::user()->sendEmailVerificationNotification();
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
        if (Session::flush() && Auth::guard('web')->logout()) {
            return Response::json([
                "success" => true,
                'status'    => JsonResponse::HTTP_ACCEPTED,
                "message" => "Successfully Logout.",
            ], JsonResponse::HTTP_OK);
        } else {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_BAD_REQUEST,
                'message'   => 'Something went wrong.',
            ], JsonResponse::HTTP_OK);
        }
    }
}
