<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    //
    //document create
   public function create(){
     return view('upload');
    }

    public function store(Request $request){
    $name=$request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public/documentimages/', $name);
    $photo=new Photo();
    $photo->name=$name;
    $photo->save();
    return redirect()->back();
   }
}
