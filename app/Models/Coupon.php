<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    /**
     * The order belong to user.
     *
     * @return  \App\Models\User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
