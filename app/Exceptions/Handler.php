<?php

namespace App\Exceptions;

use Throwable;
use BadMethodCallException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Response as JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{

    /**
     * Register any application services.
     *
     * @return void
     */
    // protected function __construct()
    // {
    // app()->setLocale("bn");
    // }

    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        // if (Session::has('locale')) {
        //     App::setLocale(Session::get('locale'));
        // }


        // $this->renderable(function (NotFoundHttpException $e, $request) {
        //     return Response::json([
        //         'success'   => false,
        //         'status'    => JsonResponse::HTTP_NOT_FOUND,
        //         'message'   =>  "Not Found.",
        //     ], JsonResponse::HTTP_NOT_FOUND);
        // });
        $this->renderable(function (NotFoundHttpException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), JsonResponse::HTTP_NOT_FOUND);
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_NOT_FOUND,
                    'message'   =>  "Not Found.",
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
            }
        });



        $this->renderable(function (ModelNotFoundException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), JsonResponse::HTTP_NOT_FOUND);
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_NOT_FOUND,
                    'message'   =>  "Model Not Found.",
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
            }
        });


        $this->renderable(function (RouteNotFoundException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), JsonResponse::HTTP_NOT_FOUND);
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_NOT_FOUND,
                    'message'   =>  "Not Found.",
                ], JsonResponse::HTTP_OK);
            }
        });


        $this->renderable(function (QueryException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), JsonResponse::HTTP_UNAUTHORIZED);
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                    'message'   => "Unauthenticated Access.",
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
            }
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), JsonResponse::HTTP_UNAUTHORIZED);
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                    'message'   => "Unauthenticated Access.",
                    // 'err'   => $e->getMessage(),
                    // ], JsonResponse::HTTP_UNAUTHORIZED);
                ], JsonResponse::HTTP_OK);
            }
        });

        $this->renderable(function (HttpException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), $e->getStatusCode());
            } else {
                // app()->setLocale("bn");
                return Response::json([
                    'success'   => false,
                    'status'    => $e->getStatusCode(),
                    // 'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                    'message'   => __("Unauthenticated."),
                    // 'message'   => "Method Not Allowed.",
                    // 'message'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
                // ], JsonResponse::HTTP_UNAUTHORIZED);
            }
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), $e->getStatusCode());
            } else {
                return Response::json([
                    'success'   => false,
                    // 'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    'status'    => $e->getStatusCode(),
                    'message'   =>  "Method Not Allowed.",
                    // 'message'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
                // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
        });

        $this->renderable(function (InvalidSignatureException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), $e->getStatusCode());
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => $e->getStatusCode(),
                    'message'   =>  "Method Not Allowed.",
                ], JsonResponse::HTTP_OK);
                // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
        });

        $this->renderable(function (ThrottleRequestsException $e, $request) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), $e->getStatusCode());
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => $e->getStatusCode(),
                    'message'   =>  "Unauthenticated Access.",
                ], JsonResponse::HTTP_OK);
                // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
        });



        $this->reportable(function (Throwable $e) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    // 'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    'message'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
                // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
        });


        $this->reportable(function (BadMethodCallException $e) {
            if (Auth::check() && Auth::user()->admin()) {
                return response()->view('errors.error', compact("e"), JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            } else {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    'message'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
                // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
        });
    }
}
