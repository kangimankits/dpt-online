<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
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
        $this->renderable(function (TooManyRequestsHttpException $e) {
            return response()->json(['message' => 'Terlalu banyak permintaan, coba beberapa saat lagi.'], $e->getStatusCode());
        });

        $this->renderable(function (NotFoundHttpException $e) {
            if(!request()->ajax()){
                return redirect()->route('core');
            }
        });

        $this->renderable(function (HttpException $e) {
            $prev = $e->getPrevious();

            return match(true){
                $prev instanceof TokenMismatchException => response()->json(['message' => 'Token tidak valid, coba segarkan halaman!'], $e->getStatusCode()),
                $prev instanceof ModelNotFoundException => response()->json(['message' => 'Data tidak ditemukan.'], $e->getStatusCode()),
                default => false,
            };
        });
    }
}
