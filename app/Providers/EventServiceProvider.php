<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Order;
use App\Observers\UserObserver;
use App\Observers\OrderObserver;
use Illuminate\Support\Facades\Event;
use App\Listeners\StripeEventListener;
use Illuminate\Auth\Events\Registered;
use Laravel\Cashier\Events\WebhookReceived;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        WebhookReceived::class => [
            StripeEventListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // UserObserver
        User::observe(UserObserver::class);
        // OrderObserver
        Order::observe(OrderObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
