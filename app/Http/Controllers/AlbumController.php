<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Validator;
use App\Models\Album;
use Session;

class AlbumController extends Controller
{
    //Album documnet
    public function index(){

        return view('album');
    }


        public function save(Request $request)
        {

        $request->validate([
            'album'=>'required',
            // 'album' =>'required|mimes:jpg,jpeg,png,bmp,webp,pdf,docx|max:1024',
            'title'=>'required',
        ]);




           $album=array();
           if($files=$request->file('album')){
            foreach($files as $file){
                $album_name=uniqid();

                $ext=($file->getClientOriginalName());
                $album_full_name=$album_name.'_'.$ext;              //$ext is getclient and $image_name is uniquid
                $album_url=$album_full_name;
                $file->storeAs('/public/album',$album_full_name);   //save in storage
                $album[]=$album_url;                                           //$image[]=$imagename and $ext
                
            }

           }
           Album::create([
                'album'=>implode('|',$album),
                'title'=>$request->title
           ]);

          return back();
        }
}
