<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    public $table = 'discounts';
    public $primaryKey = 'id';
    protected $fillable =[
        'name',
        'discount_date',
        'discount'
    ];
    public function products()
    {
        return $this->belongsTo('App\Models\product');
    }
    use HasFactory;
}
