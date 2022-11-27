<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;


    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $today = date("Ymd");

    //         // $orderNumbers = Order::select("id")->where("id", "like", "{$today}%")->pluck("id");

    //         // do {
    //         //     $orderNumber = $today . rand(1000000, 9999999);
    //         // } while ($orderNumbers->contains($orderNumber));

    //         $model->id = $today;
    //     });
    // }
}
