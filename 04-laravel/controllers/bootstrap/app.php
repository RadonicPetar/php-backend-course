<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\CheckAdmin::class,
            'course.header' => \App\Http\Middleware\AddCustomHeader::class,
            'check.categories' => \App\Http\Middleware\CheckCategories::class,
            'check.products' => \App\Http\Middleware\CheckProducts::class,
            'check.vozila' => \App\Http\Middleware\CheckVozila::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
