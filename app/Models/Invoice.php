<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, HasUuids;

    /**
     * The order belong to Invoice.
     *
     * @return  \App\Models\Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
