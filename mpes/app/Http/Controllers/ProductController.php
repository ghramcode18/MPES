<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    
    public function Update($id, Request $request)
    {

        $product = product::find($id)->get();
       //$product = Product::find->get();
        if($request->product_name != null)
        {
            DB::table('products')
            ->where('id', $id)
            ->update(['product_name'=>$request->product_name]);
        }
        if($request->price != null)
        {
            DB::table('products')
            ->where('id', $id)
            ->update(['price'=>$request->price]);
        }
        if($request->image != null)
        {
            DB::table('products')
            ->where('id', $id)
            ->update(['image'=>$request->image]);
        }
        if($request->type != null)
        {
            DB::table('products')
            ->where('id', $id)
            ->update(['type'=>$request->type]);
        }
        if($request->amount_products != null)
        {
            DB::table('products')
            ->where('id', $id)
            ->update(['amount_products'=>$request->amount_products]);
        }

        return ['Update done...'];
        }


    public function Add(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_name'=>['string'],
            'expiry_date'=>['required'],
            'image'=>['required','string'],
            'type'=>['required','string'],
            //'num_likes'=>['required','numeric'],
            'price'=>['required','numeric'],
            'amount_products'=>['required','numeric'],
            'user_id'=>['required','numeric'],
        ]);
        if($validator->fails()){
            return $validator->errors()->all();
        }
        $product = Product::query()->create([
            'product_name' => $request->product_name,
            'expiry_date' => $request->expiry_date,
            'image' => $request->image,
            'type' => $request->type,
            //'num_likes' => $request->num_likes,
            'num_likes' => 0 ,
            'price' => $request->price,
            'amount_products' => $request->amount_products,
            'user_id' => $request->user_id
        ]);
        if($product->save())
        return ['status'=>'Product created successfully.'];

    }

    public function ShowDetails($id)
    {
           $product = Product::find($id);
           $product->view +=1 ;
           $product->update();  
           return  $product;//->load(['user']);
    }

    
    public function Pagination(){

        $product = product::all();
        $product = product::paginate(3);
        return $product ;
    }

    public function UserProduct($user_id){

       return Product::where('user_id','like','%'.$user_id.'%')->get();

    }
    public function ShowDetailsWithEmail($id)
    {
           $product = Product::find($id);
           $product->view +=1 ;
           $product->update();  
           return  $product;//->load(['user']);
    }

    public function addProduct(Request $request)
    {
        # Done.....

        $validator = Validator::make($request->all(), [
            'product_name'=>['string'],
            'expiry_date'=>['required'],
            'image'=>['required','string'],
            'type'=>['required','string'],
            'num_likes'=>['required','numeric'],
            'price'=>['required','numeric'],
            'amount_products'=>['required','numeric'],
            'user_id'=>['required','numeric'],
            'category_id'=>['required','numeric'],

        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        $product = Product::query()->create([
            'product_name' => $request->product_name,
            'expiry_date' => $request->expiry_date,
            'discount_value' => $request->discount_value,
            'image' => $request->image,
            'type' => $request->type,
            'num_likes' => $request->num_likes,
            'price' => $request->price,
            'amount_products' => $request->amount_products,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,



        ]);
        foreach ($request->discounts as $discount){
            $product->discounts()->create([
                'name' => $discount['name'],
                'discount' => $discount['discount'],
                'discount_date' => $discount['discount_date'],


           ]);
         }
        if($product->save())
        return ['status'=>'Product created successfully.'];

    }
}
