<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification as Notification;

class DatabaseNotification extends Notification
{
    use HasFactory;

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $hidden = ["type", "notifiable_type", "notifiable_id"];
}
