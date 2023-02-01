<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener //implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle received Stripe webhooks.
     *
     * @param  \Laravel\Cashier\Events\WebhookReceived  $event
     * @return void
     */
    public function handle(WebhookReceived $event)
    {
        Log::channel("stripe")->info("Payload->listeners : " . json_encode($event->payload, JSON_PRETTY_PRINT)); // log
        Log::channel("stripe")->info("Event type => " . $event->payload['type']); // log

        if ($event->payload['type'] === 'invoice.payment_succeeded') {
        }
    }
}
