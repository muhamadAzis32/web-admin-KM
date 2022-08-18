<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    protected function unauthenticated($request, AuthenticationException $exception)
{
    if ($request->expectsJson()) {
        $json = [
            'isAuth'=>false,
            'message' => $exception->getMessage()
        ];
        return response()
            ->json($json, 401);
    }
    $guard = array_get($exception->guards(),0);
    switch ($guard) {
        default:
            $login = 'login';
            break;
    }
    return redirect()->guest(route($login));
}
}
