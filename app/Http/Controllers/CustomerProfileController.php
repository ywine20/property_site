<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Assets;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\CustomerProfile;
use App\Rules\MatchOldPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCustomerProfileRequest;
use App\Http\Requests\UpdateCustomerProfileRequest;

class CustomerProfileController extends Controller
{

    public function __construct()
    {
        // $this->middleware('customer.auth');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        $assets = Assets::where('customer_id', $id)->get();
      
        if (isset($assets) && count($assets) > 0) {
            $projectIds = [];
            foreach ($assets as $asset) {
                $projectId = $asset->project_id;
                array_push($projectIds, $projectId);
            }
            $customerProjects = collect();
            foreach ($projectIds as $projectId) {
                $project = Project::where('id', $projectId)
                    ->with('town', 'city', 'assets')->first();
                if ($project) {
                    $customerProjects->push($project);
                }
            }
            // dd($customerProjects->toArray());
            return view("customer.profile", ["user" => $user, 'customerProjects' => $customerProjects, 'assets' => $assets]);
            // return view('customer.profile')->with('redeemSuccess', 'Congratulation! Your code has been successfully redeemed. Thank you for your loyalty and support.');
        } else {
            return view("customer.profile", ["user" => $user, 'assets' => $assets]);
        }
        
    }

    public function profileSetting($id)
    {
        $user = User::findOrFail($id);
        return view("customer.profile-setting", ["user" => $user]);
    }

    public function redeem($id)
    {
        $user = User::findOrFail($id);
        return view("customer.redeem", ["user" => $user]);
    }

    public function changeImage(Request $request)
    {

        $user = Auth::guard('user')->user();
        $userProfile = $user->profile_img;
        $uploadFileName = $request->file('profile_img')->getClientOriginalName();




        if ($request->hasFile('profile_img')) {
            if ($userProfile != 'user.png') {
                Storage::delete('public/images/client-profile/' . $user->profile_img);
            }
        }

        $profileImg = $request->file('profile_img');
        $profileImgName = "profile_" . uniqid() . "_" . $profileImg->getClientOriginalName();
        $profileImgPath = $profileImg->storeAs('public/images/client-profile', $profileImgName);
        $user->profile_img = $profileImgName;
        $user->save();

        return response()->json(['message' => 'Profile image updated successfully', 'request' => $userProfile, 'filename' => $uploadFileName]);
    }

    public function changeInfo(Request $request)
    {


        $user = Auth::guard('user')->user();

        $request->validate([
            // "username" => "required|unique:user,name,".$user->id."|min:3|max:50",
            "username" => "required|min:3|max:50|",
            "email" => "required|email|unique:users,email," . $user->id,
            "phone" => "required",
            "tier" => 'nullable|in:bronze,silver,gold,platinum,diamond',

        ]);

        $user->name = ucwords($request->username);
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->update();
        return redirect()->back()->with('success', 'profile update successful');
    }


    public function changePassword(Request $request)
    {


        if (!Hash::check($request->get('current-password'), auth()->guard('user')->user()->password)) {
            //the password matches
            return redirect()->back()->with('password-error', 'your current password does not matches with the password.');
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with('password-error', 'new password cannot be same as your current password');
        }

        return $request;
        $request->validate([
            'currentPassword' => ['required', new MatchOldPassword],
            'newPassword' => 'required|string|min:6|max:16',
            'confirmPassword' => 'required|same:new-password'
        ]);

        $auth = auth()->guard('user')->user();
        $authPassword = auth()->guard('user')->user()->password;
        $currentPassword = $request->currentPassword;

        if (!Hash::check($currentPassword, $authPassword)) {
            return response()->json(['status' => '1', 'message' => "Current Password doesn't match."], 200);
        } else {
            return response()->json(['status' => '1', 'message' => "Current Password  match."], 200);
        }

        return response()->json([
            'auth' => $auth,
            'authPassword' => $authPassword,
            'currentPassword' => $currentPassword,
        ], 200);

        $validator = Validator::make($request->all(), [
            'currentPassword' => ['required', new MatchOldPassword],
            'newPassword' => 'required|string|min:6|max:16',
            'confirmPassword' => 'required|same:newPassword'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => '0', 'error' => $validator->errors()->toArray(), 'request' => $request->all()], 422);
        } else {


            //Change Password
            $user = auth()->guard('user')->user();
            $user->password = Hash::make($request->newPassword);
            $user->save();

            return response()->json(['status' => '1', 'message' => 'Password updated successfully']);
        }
    }




    //  return redirect()->to(url()->previous()."#change_password_form")->with('client-success','Password is Updated');

    // return redirect()->route('profile.setting',$user->id)->with('client-success','Password is Updated');


}
