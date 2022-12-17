<?php

namespace App\Models;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * Display the specified resource.
     *
     * @return  \App\Models\Coupon
     */
    public function coupon()
    {
        return $this->hasMany(Coupon::class);
    }
}
