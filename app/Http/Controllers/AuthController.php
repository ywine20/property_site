<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    // > User::create(["name"=> "larainfo","email"=>"larainfo@gmail.com","password"=>bcrypt("123456"),"phone"=>"0987654321"]);
    public function register(Request $request){

        $validator = Validator::make($request->all(), [ 
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:16|confirmed',
         ]);

         if ($validator->fails()) {
            return response()->json(['status'=>'0','error' => $validator->errors()->toArray()], 422);
        }else{
             
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            

            return redirect()->back();

            return response()->json(['status'=>'1','user'=>$user], 200);

        }
        
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|exists:users,email',
            'password' => 'required|min:6|max:16',

         ]);

         if ($validator->fails()) {
            return response()->json(['status'=>'0','error' => $validator->errors()->toArray()], 422);
        }else{

            $credentials = $request->only('email', 'password');
            if (auth()->guard('user')->attempt($credentials)) {
                // authentication successful
                $user = Auth::user();
                $token = $user->createToken('auth_token')->accessToken;
                return response()->json(['token' => $token,"status"=>1,]);
            } else {
                // authentication failed
                $validator->errors()->add('password', "The password doesn't match");

                return response()->json(['error' => $validator->errors()], 401);
            }
            // return response()->json(['status'=>1,'validateRequire'=>'success']);
        }

    }

    
    public function logout()
    {
        auth()->guard('user')->logout();
        return redirect('/');
    }
}
