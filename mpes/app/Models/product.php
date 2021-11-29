<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'product_name',
        'expiry_date',
        'image',
        'type',
        'num_likes',
        'price',
        'amount_products'
    ];
    public function comments()
    {
        return $this->hasMany('App\Models\comment');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function discounts()
    {
        return $this->hasMany('App\Models\discount');
    }

    use HasFactory;
}
