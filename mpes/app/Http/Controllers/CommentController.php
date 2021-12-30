<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function AddComment(Request $request)
    {
        $validator = Validator::make($request->all(), [ //auth id 
            'description' => ['required' , 'string' ],
            'user_id' => ['required' , 'numeric' ],
            'product_id' => ['required' , 'numeric' ]
        ]);
        if($validator->fails()){
            return $validator->errors()->all();
        }

        $comment = comment::query()->create([
            'description' => $request->description,
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id
        ]);

         if($comment->save())
         return $comment;

    }

    

}
