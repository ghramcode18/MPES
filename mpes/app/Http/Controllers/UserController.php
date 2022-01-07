<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => ['required' , 'string' ],
            'email_app' => ['required' , 'string' , 'regex:/(.*)@(google|gmail)\.com/i', 'unique:users' ],
            'password' => ['required' , 'string' ],
            'real_email' => ['required' , 'string' ],
            'phone' => ['required' , 'numeric' ],
            'active'
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        $request['password'] = Hash::make($request['password']);
        $user = User::query()->create([
            'user_name' => $request->user_name ,
            'email_app' => $request->email_app,
            'password' => $request->password,
            'real_email' => $request->real_email,
            'phone' => $request->phone,
            'active' => $request->active
        ]);

        if($user->save())
        return ['status'=>'Register Done...'];
    }


    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_app' => ['required' , 'string' ],
            'password' => ['required' , 'string' ],
        ]);
        if($validator->fails()){
            return $validator->errors()->all();
        }

        if(! Auth::attempt(request(['email_app' , 'password'])))
        {
            throw new AuthenticationException();
        }
        $user = Auth::user();
        return $user;

    }


}
