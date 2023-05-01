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
// use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Facades\Image as InterventionImage;
use Intervention\Image\Facades\Image;

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
        $validator = Validator::make(
            $request->all(),
            [
                'profile_img' => 'required|mimes:jpeg,png,jpg|max:1024'
            ],
            [
                'profile_img.mimes' => 'Profile image must be a file of type: jpeg, png, jpg.',
                'profile_img.dimensions' => 'Profile image must be ratio 1/1',

            ]
        );

        if ($validator->fails()) {
            return response()->json(['status' => '0', 'error' => $validator->errors()->toArray(), 'request' => $request->all()], 422);
        } else {
            $userProfile = $user->profile_img;
            // $uploadFileName = $request->file('profile_img')->getClientOriginalName();



            // delete local image
            if ($request->hasFile('profile_img')) {
                if ($userProfile != 'user.png') {
                    Storage::delete('public/images/client-profile/' . $user->profile_img);
                }
            }

            // store new image 
            $file = $request->file('profile_img');
            $profileImg = Image::make($file->path())->fit(300);
            $profileImgName = "profile_" . uniqid() . "." . $file->getClientOriginalExtension();
            // $profileImgPath = $profileImg->storeAs('public/images/client-profile/', $profileImgName);
            $profileImg->save(storage_path("app/public/images/client-profile/{$profileImgName}"));

            $user->profile_img = $profileImgName;
            $user->save();

            return response()->json(['status' => '1', 'message' => 'Profile image updated successfully', 'profile_name' => $profileImgName], 200);
        }
    }

    public function changeInfo(Request $request)
    {


        $user = Auth::guard('user')->user();
        $validator = Validator::make($request->all(), [
            "username" => "required|min:3|max:50|",
            "email" => "required|email|unique:users,email," . $user->id,
            "phone" => "nullable",
            "tier" => 'nullable|in:bronze,silver,gold,platinum,diamond',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => '0', 'error' => $validator->errors()->toArray(), 'request' => $request->all()], 422);
        } else {
            //Change Password
            $user->name = ucwords($request->username);
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();
            return response()->json(['status' => '1', 'message' => 'Profile Info updated successfully', 'userInfo' => $user], 200);
        }
    }

    public function changePassword(Request $request)
    {

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
            // add data to the session
            return response()->json(['status' => '1', 'message' => 'Password updated successfully']);
        }
    }

    //  return redirect()->to(url()->previous()."#change_password_form")->with('client-success','Password is Updated');

    // return redirect()->route('profile.setting',$user->id)->with('client-success','Password is Updated');


}
