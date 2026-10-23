<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Note;
use App\Policies\NotePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        Note::class=>NotePolicy::class,
    ];
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
