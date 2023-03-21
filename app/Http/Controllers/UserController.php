<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request$request)
    {
        if (isset($request->q)) {
            $users = User::query()
                ->where('name', 'LIKE', "%{$request->q}%")
                ->get();
        } else {
            $users = User::all();        
        }
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            [
                'name'=> 'required',
                'email'=> 'required',
                'phone'=> 'required',
                'email'=> 'required',
                'profile_img' => 'required|mimes:png,jpg,jpeg',
                'password'=>'required'

            ]);

            $image = $request->file('profile_img');
            if($image){
                $imageName = uniqid() . $image->getClientOriginalName();
                $image->move(public_path('/profiles'), $imageName);    
            }

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'tier' => $request->tier,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'profile_img' =>$imageName,

            ]
            );

            return redirect('/user')->with('msg', 'User has been created!! ');
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
        $users = User::findOrFail($id);
        return view('user.edit',compact('users'));
        
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
        $request->validate(
            [
                'name'=> 'required',
                'email'=> 'required',
                'phone'=> 'required',
                'email'=> 'required',
                'profile_img' => 'required|mimes:png,jpg,jpeg',
                'password'=>'required'

            ]);

            $image = $request->file('profile_img');
            if($image){
                $imageName = uniqid() . $image->getClientOriginalName();
                $image->move(public_path('/profiles'), $imageName);    
            }

        User::find($id)(
            [
                'name' => $request->name,
                'email' => $request->email,
                'tier' => $request->tier,
                'phone' => $request->phone,
                'password' => $request->password,
                'profile_img' =>$imageName,

            ]
            );

            return redirect('/user')->with('msg', 'User has been updated! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back()->with('msg','Customer has been deleted');
    }
}
