<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();

        // Middleware lainnya...

        Route::middlewareGroup('web', [
            \App\Http\Middleware\AdminAuth::class,
        ]);
    }
}
