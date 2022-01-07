<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $with = ['category','discounts'];


    protected $table = 'products';
    protected $fillable = [
        'id',
        'product_name',
        'expiry_date',
        'image',
        'type',
        'num_likes',
        'price',
        'user_id',
        'category_name',
        "category_id",
        'amount_products'

    ];
    public $timestamps;
    public function comments()
    {
        return $this->hasMany('App\Models\comment');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function discounts()
    {
        return $this->hasMany('App\Models\discount')->orderBy('discount_date');
    }



    public function Category()
    {
        return $this->belongsTo('App\Models\category', 'category_id');

    }
    use HasFactory;
}
