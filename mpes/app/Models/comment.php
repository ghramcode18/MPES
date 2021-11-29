<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public $table = 'comments';
    public $primaryKey = 'id';
    protected $fillable =   [
        'description'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
    use HasFactory; 
}
