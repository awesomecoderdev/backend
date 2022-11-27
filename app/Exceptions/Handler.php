<?php

namespace App\Exceptions;

use BadMethodCallException;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Http\Response as JsonResponse;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Handler extends ExceptionHandler
{
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
        // $this->renderable(function (NotFoundHttpException $e, $request) {
        //     return Response::json([
        //         'success'   => false,
        //         'status'    => JsonResponse::HTTP_NOT_FOUND,
        //         'message'   =>  "Not Found.",
        //     ], JsonResponse::HTTP_NOT_FOUND);
        // });
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_NOT_FOUND,
                'message'   =>  "Not Found.",
            ], JsonResponse::HTTP_OK);
        });

        $this->renderable(function (RouteNotFoundException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_NOT_FOUND,
                'message'   =>  "Not Found.",
            ], JsonResponse::HTTP_OK);
        });


        $this->renderable(function (QueryException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                'message'   => "Unauthenticated Access.",
                'err'   => $e->getMessage(),
            ], JsonResponse::HTTP_OK);
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                'message'   => "Unauthenticated Access.",
                // 'err'   => $e->getMessage(),
                // ], JsonResponse::HTTP_UNAUTHORIZED);
            ], JsonResponse::HTTP_OK);
        });

        $this->renderable(function (HttpException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => $e->getStatusCode(),
                // 'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                // 'message'   => "Unauthenticated.",
                'message'   => "Method Not Allowed.",
                // 'message'   => $e->getMessage(),
            ], JsonResponse::HTTP_OK);
            // ], JsonResponse::HTTP_UNAUTHORIZED);
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            return Response::json([
                'success'   => false,
                // 'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                'status'    => $e->getStatusCode(),
                'message'   =>  "Method Not Allowed.",
                // 'message'   => $e->getMessage(),
            ], JsonResponse::HTTP_OK);
            // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });

        $this->renderable(function (InvalidSignatureException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => $e->getStatusCode(),
                'message'   =>  "Method Not Allowed.",
            ], JsonResponse::HTTP_OK);
            // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });

        $this->renderable(function (ThrottleRequestsException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => $e->getStatusCode(),
                'message'   =>  "Unauthenticated Access.",
            ], JsonResponse::HTTP_OK);
            // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });



        $this->reportable(function (Throwable $e) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                // 'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                'message'   => $e->getMessage(),
            ], JsonResponse::HTTP_OK);
            // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });


        $this->reportable(function (BadMethodCallException $e) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                'message'   => $e->getMessage(),
            ], JsonResponse::HTTP_OK);
            // ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });
    }
}
