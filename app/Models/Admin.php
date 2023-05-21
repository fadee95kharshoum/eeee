<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles, HasProfilePhoto,TwoFactorAuthenticatable;


    /**
     *  Type Of User [ Super Admin, Admin ]
     *
     * @var array
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'status',
        'phone',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    //Type Of User


    // Ralations
    /**
     * Get all of the uploaded Cards for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uploads(): HasMany
    {
        return $this->hasMany(Upload::class);
    }

    /**
     * Get all of the Custom uploaded Cards for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customs(): HasMany
    {
        return $this->hasMany(Custom::class);
    }
}
