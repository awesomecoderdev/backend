<?php

namespace App\Models;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, HasUuids;

    /**
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The invoice belong to user.
     *
     * @return  \App\Models\Invoice
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id');
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $today = date("Ymd");

    // $orderNumbers = Order::select("id")->where("id", "like", "{$today}%")->pluck("id");

    // do {
    //     $orderNumber = $today . rand(1000000, 9999999);
    // } while ($orderNumbers->contains($orderNumber));

    //         $model->id = $today;
    //     });
    // }
}
