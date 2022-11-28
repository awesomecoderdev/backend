<?php

namespace AwesomeCoder\ShoppingCart;

use Illuminate\Auth\Events\Logout;
use Illuminate\Session\SessionManager;
use Illuminate\Support\ServiceProvider;

class ShoppingCartServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('cart', 'AwesomeCoder\ShoppingCart\Cart');

        $this->app['events']->listen(Logout::class, function () {
            if ($this->app['config']->get('cart.destroy_on_logout')) {
                $this->app->make(SessionManager::class)->forget('cart');
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
