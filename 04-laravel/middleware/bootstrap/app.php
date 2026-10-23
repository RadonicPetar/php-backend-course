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
            'simple'=>\App\Http\Middleware\SimpleMiddleware::class,
            'admin'=>\App\Http\Middleware\CheckAdmin::class,
            'age'=>\App\Http\Middleware\CheckAge::class,
            'min.age'=>\App\Http\Middleware\CheckMinimumAge::class,
            'welcome'=>\App\Http\Middleware\AddWelcomeMessage::class,
            'course.header'=>\App\Http\Middleware\AddCustomHeader::class,
            'log.after'=>\App\Http\Middleware\LogAfterRequest::class,
            'api.key'=>\App\Http\Middleware\CheckApiKey::class,
            'check.categories'=>\App\Http\Middleware\CheckCategories::class,
            'check.categories.log'=>\App\Http\Middleware\CheckCategoriesLog::class,
            'check.products' => \App\Http\Middleware\CheckProducts::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
