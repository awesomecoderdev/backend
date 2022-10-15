<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as JsonResponse;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Response::json([
            "success" => true,
            "check" => Auth::check(),
            "message" => "Successfully Authorized.",
            "auth" => Auth::user(),
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return Response::json([
            "success" => true,
            "message" => "User successfully created!",
            "data" => $request->all(),
        ], JsonResponse::HTTP_CREATED);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth(AuthUserRequest $request)
    {
        if (Auth::guard('web')->attempt(["email" => $request->email, "password" => $request->password])) {
            $user = Auth::user();
            // DB::table('personal_access_tokens')->where('tokenable_id', $user->id)->delete();
            // $token = $user->createToken($user->name)->plainTextToken;
            return Response::json(
                [
                    "success" => true,
                    "message" => "Successfully Authorized.",
                    // "token" => $token,
                    "user" => $user,
                ],
                JsonResponse::HTTP_OK
            );
            // )->withCookie(Cookie::make('next_cors', $token, (60 * 24), "/", "localhost",));
        }
        return Response::json([
            'success'   => false,
            'message'   => 'Unauthorized access.',
        ], JsonResponse::HTTP_OK);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        // return $request->user()->notifications;
        // $request->user()->notify(new UserRegisteredNotification($request->user()));
        // Notification::send(User::all(), new UserNotification("Hello how are you."));

        // return DB::table('notifications')->select(["id", "created_at", "read_at", "data"])->where("notifiable_id", $request->user()->id)->get();

        // return new UserCollection(
        //     Cache::remember("user_" . $request->user()->id, 60 * 60, function () use ($request) {
        //         return $request->user();
        //     })
        // );

        return Response::json([
            "success" => true,
            "message" => "Successfully Authorized.",
            "user" => Auth::user(),
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
            "message" => "Successfully Authorized.",
            "data" => $notifications,
        ], JsonResponse::HTTP_OK);

        // ->withHeaders(
        //     [
        //         // "Set-Cookie" =>  Cookie::make('NEXT-CSRF', $request->user()->currentAccessToken()->token, (60 * 24), "/", ".localhost", true, true, false, "strict")
        //         "X-AwesomeCoder" => PersonalAccessToken::findToken($request->user()->currentAccessToken()->token),
        //     ]
        // )->withCookie(Cookie::make('NEXT-CSRF', $request->user()->currentAccessToken()->token, (60 * 24), "/", ".localhost", true, true, false, "strict"));
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
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
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Session::flush() && Auth::guard('web')->logout()) {
            return Response::json([
                "success" => true,
                "message" => "Successfully Logout.",
            ], JsonResponse::HTTP_OK);
        } else {
            return Response::json([
                'success'   => false,
                'message'   => 'Something went wrong.',
            ], JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
