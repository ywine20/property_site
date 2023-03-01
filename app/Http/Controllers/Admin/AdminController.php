<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('setting')->only(['create', 'edit', 'destroy','index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = Admin::where('id', '>', 1)->get();
        $data = Admin::all();
        return view('admin.setting.setting', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Admin::all();
        return view('admin.setting.moderatorcreate', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:admins,email',
        //     'password' => 'required|same:confirm-password|min:8',
        //     'role' => 'required',
        //     'phone' => 'required|max:15',
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        // ]);

        // $image = $request->file('image');
        // return $request->image;
        // $image_name = uniqid() . $image->getClientOriginalName();
        // $image->move(public_path('/images/admin/'), $image_name);

        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);

        // $admin = Admin::create($input, ['image' => '$image_name']);
        // $user->assignRole($request->input('roles'));
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'phone' => 'required|max:15',
            'password' => 'required|same:confirm-password|min:8',
            'role' => 'required|string|max:50',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
        ]);
         $image = $request->file('image');
         $image_name = uniqid() . $image->getClientOriginalName();
         $image->move(public_path('/images/admin/'), $image_name);

         $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'image' => $image_name,
         ]);
        //  return $request->all();
         return redirect('/admin/setting')->with('status', 'Moderator Created Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::where('id', $id)->first();
        if(!$admin){
            return redirect()->back()->with('error', 'there is no role');
        }
        return view('admin.setting.moderatoredit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$id,
            'password' => 'same:confirm-password',
            'role' => 'required',
            'phone' => 'required',
             'image' => 'mimes:jpeg,png,jpg,gif',
         ]);

        $input = $request->all();

         if ($image = $request->file('image')) {
            $destinationPath = 'images/admin/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = "$productImage";
        }else{
            unset($input['image']);
        }

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $admin = Admin::find($id);
        $admin->update($input);
        return redirect('admin/setting')->with('success', 'you has updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::where('id', $id);
        if (!$admin->first()){
            return redirect()->back()->with('error', 'Admin Not Found');
        }
        File::delete(public_path('images/admin/' . $admin->first()->image));
        $admin->delete();
        return response()->json([
            'status' => 'success',
            'info' => 'delete successful'
        ]);
        // return redirect('/admin/setting')->with('success', 'deleted');
    }

    public function hello()
    {
        return view('/admin/hello');
    }
}
