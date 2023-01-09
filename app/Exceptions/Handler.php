<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use BadMethodCallException;
use Illuminate\Database\QueryException;
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
        //
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Throwable $e)
    {
        $subdomain = strtok(preg_replace('#^https?://#', '', rtrim($request->url(), '/')), '.');
        $error = $subdomain == "api";

        if ($e instanceof NotFoundHttpException || $e instanceof RouteNotFoundException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_NOT_FOUND,
                    'message'   =>  "Not Found.",
                    'request' =>  $subdomain,
                ], JsonResponse::HTTP_NOT_FOUND);
            }
        }

        if ($e instanceof MethodNotAllowedHttpException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_NOT_FOUND,
                    'message'   =>  "Not Found.",
                ], JsonResponse::HTTP_NOT_FOUND);
            }
        }

        if ($e instanceof ModelNotFoundException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_NOT_FOUND,
                    'message'   =>  "Model Not Found.",
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
            }
        }


        if ($e instanceof QueryException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                    'message'   => "Unauthenticated Access.",
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
            }
        }


        if ($e instanceof AuthenticationException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_UNAUTHORIZED,
                    'message'   => "Unauthenticated Access.",
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK); // HTTP_UNAUTHORIZED
            }
        }


        if ($e instanceof HttpException || $e instanceof InvalidSignatureException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => $e->getStatusCode(),
                    'message'   => __("Unauthenticated."),
                    // 'message'   => $e->getMessage(),
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
            }
        }


        if ($e instanceof MethodNotAllowedHttpException || $e instanceof BadMethodCallException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    // 'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    'status'    => $e->getStatusCode(),
                    'message'   =>  "Method Not Allowed.",
                    // 'message'   => $e->getMessage(),
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK);
            }
        }


        if ($e instanceof ThrottleRequestsException) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => $e->getStatusCode(),
                    'message'   =>  "Unauthenticated Access.",
                    // "message"   => $e->getMessage(),
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK); // HTTP_METHOD_NOT_ALLOWED
            }
        }


        if ($e instanceof Throwable) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    'message'   => $e->getMessage(),
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK); // HTTP_METHOD_NOT_ALLOWED
            }
        }


        if ($e instanceof Throwable) {
            if ($error) {
                return Response::json([
                    'success'   => false,
                    'status'    => JsonResponse::HTTP_METHOD_NOT_ALLOWED,
                    'message'   => $e->getMessage(),
                    'err'   => $e->getMessage(),
                ], JsonResponse::HTTP_OK); // HTTP_METHOD_NOT_ALLOWED
            }
        }


        return parent::render($request, $e);
    }
}
