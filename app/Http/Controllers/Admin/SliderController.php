<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
// use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $slider=Slider::all();
        return view('admin.slider.index',compact('slider'));
    }


    public function create()
    {
       return view('admin.slider.create');
    }

    public function store(Request $request)
    {
       $slider=new Slider;
        if($request->hasfile('image'))
        {
          $file=$request->file('image');
          $extention=$file->getClientOriginalExtension();
          $filename=time().'.'.$extention;
          $file->move('uploads/slider/',$filename);
          $slider->image=$filename;
        }
        $slider->save();

       return redirect('/admin/slider')->with('status','Slider Image Added Successfully!');

    }

    public function edit($id)
    {
        $slider=Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request, $id)
    {

      $request->validate([
          'image'=>'required|mimes:jpeg,png,jpg.gif|max:2048|dimensions:width=1280,height=500'
      ]);

        $slider=Slider::find($id);

        if($request->hasfile('image'))
        {
          $destination='uploads/slider/'.$slider->image;
          $files = new \Illuminate\Filesystem\Filesystem();
          if($files->exists($destination)){
            $files->delete($destination);

          }
        //   if(File::exits($destination))
        //   {
        //      File::delete($destination);
        //   }
          $file=$request->file('image');
          $extention=$file->getClientOriginalExtension();
          $filename=time().'.'.$extention;
          $file->move('uploads/slider/',$filename);
          $slider->image=$filename;
        }

        $slider->update();
       return redirect('/admin/slider')->with('status','Slider Image Updated Successfully!');

    }

    public function show($id)
    {
        $slider=Slider::find($id);
        return view('admin.slider.show',compact('slider'));
    }

    public function destroy($id)
    {
        $slider=Slider::find($id);
        $destination='uploads/slider/'.$slider->image;
        $files = new \Illuminate\Filesystem\Filesystem();
          if($files->exists($destination)){
            $files->delete($destination);

          }
        $slider->delete();
        return redirect('/admin/slider')->with('status','Slider Image Deleted Successfully!');

    }



}
