<?php

namespace App\Http\Controllers;

use App\Models\CustomerProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerProfileRequest;
use App\Http\Requests\UpdateCustomerProfileRequest;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerProfileController extends Controller
{

    public function __construct()
    {
        // $this->middleware('customer.auth');
    }

    public function profile($id){
        $user = User::findOrFail($id);
        return view("customer.profile",["user"=>$user]);
    }
    public function profileSetting($id){
        $user = User::findOrFail($id);
        return view("customer.profile-setting",["user"=>$user]);
    }

    public function redeem($id){
        $user = User::findOrFail($id);
        return view("customer.redeem",["user"=>$user]);
    }

    public function changeImage(Request $request){

        $user = Auth::guard('user')->user();
        $validator = Validator::make($request->all(),[
            'profile_img' => 'required|mimes:jpeg,png,jpg|max:1024|dimensions:ratio=1/1'
        ],
        [
            'profile_img.mimes' => 'Profile image must be a file of type: jpeg, png, jpg.',
            'profile_img.dimensions' => 'Profile image must be ratio 1/1',

        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>'0','error' => $validator->errors()->toArray(),'request'=>$request->all()], 422);
        }else{
            $userProfile = $user->profile_img;
            $uploadFileName = $request->file('profile_img')->getClientOriginalName();
    
            if($request->hasFile('profile_img')){
                    if($userProfile != 'user.png'){
                        Storage::delete('public/images/client-profile/'.$user->profile_img);
                    }
            }
            
            $profileImg = $request->file('profile_img');
            $profileImgName = "profile_".uniqid().".".$profileImg->getClientOriginalExtension();
            $profileImgPath = $profileImg->storeAs('public/images/client-profile',$profileImgName);
            $user->profile_img = $profileImgName;
            $user->save();
        
            return response()->json(['status'=>'1','message' => 'Profile image updated successfully','profile_name'=>$profileImgName],200);
        }

    
    }

    public function changeInfo(Request $request){


        $user = Auth::guard('user')->user();
        $validator = Validator::make($request->all(),[
            "username"=>"required|min:3|max:50|",
            "email" => "required|email|unique:users,email,".$user->id,
            "phone"=>"nullable",
            "tier"=> 'nullable|in:bronze,silver,gold,platinum,diamond',
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>'0','error' => $validator->errors()->toArray(),'request'=>$request->all()], 422);
        }else{
              //Change Password
              $user->name = ucwords($request->username);
              $user->email = $request->email;
              $user->phone = $request->phone;
              $user->save();
              return response()->json(['status'=>'1','message' => 'Profile Info updated successfully','userInfo'=>$user],200);

        }
    }

    public function changePassword(Request $request){
      
        $validator = Validator::make($request->all(), [ 
            'currentPassword' => ['required',new MatchOldPassword],
            'newPassword' => 'required|string|min:6|max:16',
            'confirmPassword'=>'required|same:newPassword'
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>'0','error' => $validator->errors()->toArray(),'request'=>$request->all()], 422);
        }else{
              //Change Password
         $user = auth()->guard('user')->user();
         $user->password = Hash::make($request->newPassword);
         $user->save();
// add data to the session
         return response()->json(['status'=>'1','message' => 'Password updated successfully']);
        }
        
    }
      

    
}
