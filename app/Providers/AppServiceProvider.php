<?php

namespace App\Providers;

use App\Broadcasting\LogChannel;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // You can use whatever name your want
        Notification::extend('log', function ($app) {
            return new LogChannel();
        });
    }
}
