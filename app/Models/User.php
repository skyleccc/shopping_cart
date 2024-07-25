<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

        // Tell Eloquent to use a custom timestamp column
        const CREATED_AT = 'userLastModified';
        const UPDATED_AT = 'userLastModified'; 

    protected $primaryKey = 'userID';
    protected $fillable = [
        'username', 'password', 'userFname', 'userLname', 'userType'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shoppingCart()
    {
        return $this->hasOne(ShoppingCart::class, 'userID');
    }
}