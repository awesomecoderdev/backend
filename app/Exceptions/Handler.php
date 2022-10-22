<?php

namespace App\Exceptions;

use BadMethodCallException;
use Throwable;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Http\Response as JsonResponse;
use Illuminate\Support\Facades\Response;

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
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_NOT_FOUND,
                'message'   =>  "Not Found.",
            ], JsonResponse::HTTP_NOT_FOUND);
        });

        $this->renderable(function (AuthenticationException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                'message'   => "Unauthenticated Access.",
                'err'   => $e->getMessage(),
            ], JsonResponse::HTTP_UNAUTHORIZED);
        });

        $this->renderable(function (HttpException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                'message'   => "Unauthenticated.",
                // 'message'   => "Method Not Allowed.",
                // 'message'   => $e->getMessage(),
            ], JsonResponse::HTTP_UNAUTHORIZED);
        });

        $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                'message'   =>  "Method Not Allowed.",
                'err'   => $e->getMessage(),
            ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });

        $this->reportable(function (Throwable $e) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                'message'   => $e->getMessage(),
            ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });


        $this->reportable(function (BadMethodCallException $e) {
            return Response::json([
                'success'   => false,
                'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                'message'   => $e->getMessage(),
            ], JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        });
    }
}
