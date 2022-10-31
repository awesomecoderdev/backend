<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Without field.
     *
     * @return array
     */
    public $without = [
        'id',
        // 'created_at',
        'updated_at',
        // 'email',
        'email_verified_at'
    ];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if (Auth::check()) {
            if (!Auth::user()->isAdmin) {
                $this->without = array_merge($this->without, ['isAdmin',]);
            }
        }
        return [
            $this->merge(Arr::except(parent::toArray($request), $this->without))
        ];
    }
}
