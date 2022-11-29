<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\SendVerificationEmail;
use App\Notifications\ResendVerificationEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'provider_id',
        'provider',
        'access_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerificationEmail());
    }

    /**
     * Resend the email verification notification.
     *
     * @return void
     */
    public function resendEmailVerificationNotification()
    {
        return $this->notify(new ResendVerificationEmail());
    }

    /**
     * Return the user full name.
     *
     * @return string
     */
    public function name()
    {
        return "$this->first_name $this->last_name";
    }

    /**
     * Return the user full name.
     *
     * @return string
     */
    public function admin(): bool
    {
        return ($this->isAdmin != null && $this->isAdmin == 1) ? true : false;
    }

    /**
     * Return the user full name.
     *
     * @return string
     */
    public function supperadmin(): bool
    {
        return ($this->isSupperAdmin != null && $this->isSupperAdmin == 1) ? true : false;
    }

    /**
     * Get the entity's notifications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->latest();
    }

    /**
     * Determine if the user has verified their email address.
     *
     * @return bool
     */
    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }
}
