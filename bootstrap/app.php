<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        // commands: __DIR__.'/../routes/console.php',
        // health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (NotFoundHttpException $e) {
            if(!request()->ajax()){
                return redirect()->route('core');
            }
        });

        $exceptions->renderable(function (HttpException $e) {
            $prev = $e->getPrevious();

            return match(true){
                $prev instanceof TokenMismatchException => response()->json(['message' => 'Token tidak valid, coba segarkan halaman!'], $e->getStatusCode()),
                $prev instanceof ModelNotFoundException => response()->json(['message' => 'Data tidak ditemukan.'], $e->getStatusCode()),
                default => false,
            };
        });
    })->create();
