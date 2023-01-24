<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plan extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'meta' => AsCollection::class,
    ];

    /**
     * Interact with the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    // protected function meta(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => Collection::make($value),
    //         set: fn ($value) => strtolower($value),
    //     );
    // }

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
