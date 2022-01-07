<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\category;
class CategoryController extends Controller
{
    public function searchByCategory(string $category_name)
    {
        # Done...



     // dd(product::where('product_name', $product_name)->get());
    return  category::where('category_name', $category_name)->get();


    }
}
