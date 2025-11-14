<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response for API.
     */
    public function render($request, Throwable $e)
    {
        // Handle API requests with JSON responses
        if ($request->is('api/*')) {
            return $this->handleApiException($request, $e);
        }

        return parent::render($request, $e);
    }

    /**
     * Handle API exceptions
     */
    protected function handleApiException($request, Throwable $exception)
    {
        $statusCode = 500;
        $message = 'Internal Server Error';

        if ($exception instanceof ValidationException) {
            $statusCode = 422;
            $message = 'Validation Error';
            return response()->json([
                'success' => false,
                'message' => $message,
                'errors' => $exception->errors(),
            ], $statusCode);
        }

        if ($exception instanceof AuthenticationException) {
            $statusCode = 401;
            $message = 'Unauthenticated';
        } elseif ($exception instanceof ModelNotFoundException) {
            $statusCode = 404;
            $message = 'Resource not found';
        } elseif ($exception instanceof NotFoundHttpException) {
            $statusCode = 404;
            $message = 'Endpoint not found';
        } elseif ($exception instanceof MethodNotAllowedHttpException) {
            $statusCode = 405;
            $message = 'Method not allowed';
        } elseif ($exception instanceof HttpException) {
            $statusCode = $exception->getStatusCode();
            $message = $exception->getMessage() ?: 'HTTP Error';
        }

        // Development mode: include exception details
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (config('app.debug')) {
            $response['debug'] = [
                'exception' => get_class($exception),
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'trace' => $exception->getTraceAsString(),
            ];
        }

        return response()->json($response, $statusCode);
    }
}
