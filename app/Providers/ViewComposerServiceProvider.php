<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Compose the navbar view with services
        View::composer('layouts.app', function ($view) {
            $services = Service::all(); // You might want to limit or order
            $view->with('services', $services);
        });
    }
}