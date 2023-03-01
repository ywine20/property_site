<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Project;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects= Project::all();
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('admin.gallery.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => "required|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $image = $request->file('image');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('/images/360images/'), $image_name);

        $project = Project::where('id', $request->id)->first();
        if(!$project){
            return redirect()->back()->with('error', 'Not found project');
        }

        $gallery = Gallery::create([
            'image' => $image_name,
            'project_id' => $project->id,
        ]);
        $gallery->save();
        return redirect('/admin/gallery')->with('success', 'Your gallery created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::all();
        $gallery = Gallery::where('id', $id)->first();
        if(!$gallery){
            return redirect()->back()->with('error', 'Not found gallery');
        }
        return view('admin.gallery.show', compact('gallery', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Project::all();
        $gallery = Gallery::where('id', $id)
            ->with('projects')
            ->first();
            if(!$gallery){
                return redirect()->back()->with('error', 'not found gallery');
            }
        return view('admin.gallery.edit', compact('gallery', 'projects'));
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
        $gallery = Gallery::where('id', $id);
        if(!$gallery->first()){
            return redirect()->back()->with('error', 'not found gallery');
        }

        $project = Project::where('id', $request->id)->first();
        if(!$project){
            return redirect()->back()->with('error', 'not found project');
        }

        if($file = $request->file('image')){
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images/360images'), $file_name);
        }else{
            $file_name = $gallery->first()->image;
        }

        $gallery->update([
            'image' => $file_name,
            'project_id' => $project->id,
        ]);
        return redirect('/admin/gallery')->with('success', 'Your Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id);
        if (!$gallery->first()){
            return redirect()->back()->with('error', 'Gallery Not Found');
        }
        File::delete(public_path('images/360images/' . $gallery->first()->image));
        $gallery->delete();
        return redirect('/admin/gallery')->with('success', 'gallery deleted successfully');
    }
}
