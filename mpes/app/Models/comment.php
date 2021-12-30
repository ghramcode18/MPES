<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public $with=['user_id','product_id'];
    public $table = 'comments';
    public $primaryKey = 'id';
    protected $fillable =   [
        'description' ,
        'user_id' ,
        'product_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User' , 'user_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\product' , 'product_id');
    }
    use HasFactory; 
}
