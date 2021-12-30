<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'user_name',
        'email_app',
        'password',
        'real_email',
        'phone',
        'active',
        // 'user_id',
        // 'product_id'
    ];

    public function comments()
    {
        return $this->hasMany('App\Models\comment');
    }
    public function products()
    {
        return $this->hasMany('App\Models\product');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
