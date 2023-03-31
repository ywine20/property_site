<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    // > User::create(["name"=> "larainfo","email"=>"larainfo@gmail.com","password"=>bcrypt("123456"),"phone"=>"0987654321"]);
    public function register(Request $request){

        $validator = Validator::make($request->all(), [ 
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:16',
            'password_confirmation' => 'required|same:password',
        ]);

         if ($validator->fails()) {
            return response()->json(['status'=>'0','error' => $validator->errors()->toArray(),'request'=>$request->all()], 422);
        }else{
            $user = new User();
            $user->name = ucwords($request->name);
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $length = 32; 
            $secret = bin2hex(random_bytes($length));
            $userId = $user->id;
            $time = Carbon::now();
            $token = Hash::make("$userId|$time|$secret");

            $credentials = $request->only('email', 'password');
            auth()->guard('user')->attempt($credentials);
            return response()->json(['status'=>'1','user'=>$user, 'access_token'=>$token], 200);

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
                $length = 32;
                $secret = bin2hex(random_bytes($length));

                $user = User::where('email',$request->email)->first();
                $userId = $user->id; 
                $time = Carbon::now();
                
                
                $token = Hash::make("$userId|$time|$secret");

                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer', "status" => 1, 'user' => $user
                ]);
            } else {
                // authentication failed
                $validator->errors()->add('password', "The password doesn't match");

                return response()->json(['error' => $validator->errors()], 401);
            }
        }

    }


    public function logout(Request $request)
    {
        // $user = Auth::guard('user')->user();
        auth()->guard('user')->logout();
        return redirect('/');
    }


    public function forgotPassword(Request $request){
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email|exists:users',
        ]);

         if ($validator->fails()) {
            return response()->json(['status'=>'0','error' => $validator->errors()->toArray(),'request'=>$request->all()], 422);
        }else{

        return response()->json(['forgotPassword'=>'send email','request'=>$request->all()],200);
        }
    }
}
