<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => ['required' , 'string' ],
            'email_app' => ['required' , 'string' , 'regex:/(.*)@(google|gmail)\.com/i', 'unique:users' ],
            'password' => ['required' , 'string' ],
           // 'real_email' => ['required' , 'string' ],
          //  'phone' => ['required' , 'numeric' ],
        ]);

        if($validator->fails()){
            return $validator->errors()->all();
        }

        $request['password'] = Hash::make($request['password']);
        $user = User::query()->create([
            'user_name' => $request->user_name ,
            'email_app' => $request->email_app,
            'password' => $request->password,
          //  'real_email' => $request->real_email,
         //   'phone' => $request->phone,
            'active' => true
        ]);

        if($user->save())
        return $user ; //['status'=>'Register Done...'];
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
        $user->active = true;
        $user->update();
        return $user;
        
    }

    public function Logout($id)
    {
        $user = User::find($id);
        $user->active = false ;
        $user->update();  
        return ['The Account is Logged Out...'];
    }

    public function EditUser($id, Request $request)
    {

        $user = User::find($id)->get();

        if($request->user_name != null)
        {
            DB::table('users')
            ->where('id', $id)
            ->update(['user_name'=>$request->user_name]);
        }
        if($request->email_app != null)
        {
            DB::table('users')
            ->where('id', $id)
            ->update(['email_app'=>$request->email_app]);
        }
        if($request->password != null)
        {
            DB::table('users')
            ->where('id', $id)
            ->update(['password'=>$request->password]);
        }
        if($request->real_email != null)
        {
            DB::table('users')
            ->where('id', $id)
            ->update(['real_email'=>$request->real_email]);
        }
        if($request->phone != null)
        {
            DB::table('users')
            ->where('id', $id)
            ->update(['phone'=>$request->phone]);
        }

        return ['Update done...'];
        }


}
