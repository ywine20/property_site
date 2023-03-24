<?php

namespace App\Http\Controllers;

use App\Models\CustomerProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerProfileRequest;
use App\Http\Requests\UpdateCustomerProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
}
