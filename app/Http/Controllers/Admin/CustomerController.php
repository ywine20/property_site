<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Assets;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Project;
use App\Models\siteProgress;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function customersList()
    {
        $customers = User::all();
        // dd($customers->toArray());
        return view('admin.customer.customerList', compact('customers'));
    }



    public function customerDetail($id)
    {
        $customer = User::find($id);
        $assets = Assets::where('customer_id', $id)->get();

        if (isset($assets) && count($assets) > 0) {
            return view("admin.customer.detail", ['customer' => $customer, 'assets' => $assets]);
        } else {
            return view("admin.customer.detail", ['customer' => $customer, 'assets' => $assets]);
        }
    }
}
