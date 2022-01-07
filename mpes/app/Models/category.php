<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public $table = 'categorys';
    public $primaryKey = 'id';
    protected $fillable =   [
        'category_name',
    ];

    public function product()
    {
        return $this->hasMany('App\Models\product');
    }
    public function scopeGetCategorieSlug($query, $category_slug)
    {
        return $query->leftJoin('category_product', 'category_product.product_id', '=', 'products.id')
                    ->leftJoin('product_categories', 'product_categories.id', '=', 'category_product.category_id')
                    ->where('product_categories.slug', $category_slug)
                    ->get(['products.*']);
    }
}
