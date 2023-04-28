<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{

    public function customersList()
    {
        $customers = User::get();
        // dd($customers->toArray());
        dump($customers);
        return view('admin.customer.customerList', compact('customers'));
    }
}
