<?php

namespace App\Http\Controllers;

use App\Models\SiteGallery;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
     public function siteindex(){

        return view('site');
    }
    public function sitesave(Request $request){

       $gallery=array();
           if($files=$request->file('gallery')){
            foreach($files as $file){
                $gallery_name=uniqid();
                $ext=($file->getClientOriginalName());
                $gallery_full_name=$gallery_name.'_'.$ext;      //$ext is getclient and $image_name is uniquid
                $gallery_url=$gallery_full_name;
                $file->storeAs('/public/album',$gallery_full_name); //save in storage
                $gallery[]=$gallery_url;                     //$image[]=$imagename and $ext

            }

           }
           SiteGallery::create([
                'gallery'=>implode('|',$gallery),
                'description'=>$request->description,
                'title'=>$request->title
           ]);

           return back();
    }
}
