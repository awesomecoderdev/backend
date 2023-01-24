<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    /**
     * Set routing primary key.
     *
     * @return  \App\Models\Plan
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
