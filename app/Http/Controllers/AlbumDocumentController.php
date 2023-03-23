<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumDocumentController extends Controller
{
   //document create
   public function create(){
    return view('albumdocument');
   }

   //document store
   public function store(Request $request){
    $name=$request->file('photo')->getClientOriginalName();

    $request->file('photo')->store('public/doc');
    return $name;
   }
}
