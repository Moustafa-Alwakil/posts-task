<?php

namespace App\Exceptions;

use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof ModelNotFoundException && $request->expectsJson()) {
            return response()->json([
                'message' => 'Not Found',
            ], Response::HTTP_NOT_FOUND);
        }

        if ($e instanceof AuthorizationException && $request->expectsJson()) {
            return response()->json([
                'message' => 'Unauthorized Action',
            ], Response::HTTP_FORBIDDEN);
        }

        return parent::render($request, $e);
    }
}
