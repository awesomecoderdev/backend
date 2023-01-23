<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class LogChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function send($notifiable, Notification $notification)
    {

        if (method_exists($notifiable, 'routeNotificationForLog')) {
            $id = $notifiable->routeNotificationForLog($notifiable);
        } else {
            $id = $notifiable->getKey();
        }

        $data = method_exists($notification, 'toLog')
            ? $notification->toLog($notifiable)
            : $notification->toArray($notifiable);

        if (empty($data)) {
            return;
        }

        Log::info("Send notification to {$notifiable->fullname()}[$notifiable->id] " . json_encode($data));

        return true;
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }
}
