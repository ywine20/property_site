<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\FacebookLink;
use Illuminate\Support\Facades\Storage;

// use App\Models\Project;

class FacebookLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::all();
        $facebooklinks = FacebookLink::all();
        return view('admin.facebooklink.index', compact('facebooklinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $projects = Project::all();
        return view('admin.facebooklink.create');
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
            'project_post_link' => "required|string",
            'picture' => "required|mimes:jpeg,png,jpg,gif|max:1024|dimensions:ratio=1/1",
            'description' => "required|string"
        ]);


        $image = $request->file('picture');
        $image_name = 'facebookCover_'. uniqid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('/public/images/fbImages', $image_name);

        $facebooklink = FacebookLink::create([
            'project_post_link' => $request->project_post_link,
            'description' => $request->description,
            'picture' => $image_name,
        ]);

        $facebooklink->save();

        return redirect('/admin/facebooklink')->with('status', 'FacebookLink created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $projects = Project::all();
        $facebooklink = FacebookLink::where('id', $id)->first();
        if(!$facebooklink){
            return redirect()->back()->with('error', 'Not found facebooklink');
        }
        return view('admin.facebooklink.show', compact('facebooklink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
  
        // $projects = Project::all();
        $facebooklink = FacebookLink::where('id', $id)
            ->first();
            if(!$facebooklink){
                return redirect()->back()->with('error', 'not found facebooklink');
            }
        return view('admin.facebooklink.edit', compact('facebooklink'));
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
//        return $request;
        $request->validate([
            'project_post_link' => "required|string",
            'description' => "required|string",
            'picture' => "nullable|mimes:jpeg,png,jpg,gif|max:1024|dimensions:ratio=1/1",

        ]);

        $facebooklink = FacebookLink::where('id', $id)->first();
       
        if($image = $request->file('picture')){

            Storage::delete('public/images/fbImages/' . $facebooklink->picture);
            $image_name = 'facebookCover_'. uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/fbImages', $image_name);

        }else{
            $image_name = $facebooklink->first()->picture;
        }

        $facebooklink->update([
            'picture' => $image_name,
            'project_post_link' => $request->project_post_link,
            'description' => $request->description,
        ]);
        return redirect('/admin/facebooklink')->with('status', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facebooklink = FacebookLink::where('id', $id)->first();

        Storage::delete('public/images/fbImages/' . $facebooklink->picture);

        $facebooklink->delete();

       return response()->json([
            'status' => 'success',
            'info' => 'delete successful'
       ]);
        // return redirect('/admin/facebooklink')->with('success', 'your facebooklink deleted successfully.');
    }

    public function multiDelFacebookLink(Request $request){
        $ids = $request->chk;


        if (empty($ids)) {
            return response()->json(['message' => 'No IDs provided.'], 400);
        }

        $facebooklinks =  FacebookLink::whereIn('id',$ids)->get();

        foreach($facebooklinks as $facebooklink)
        {
            $localPhoto = $facebooklink->picture;
            if($localPhoto){
                Storage::delete('public/images/fbImages/' . $localPhoto);
            }
        }

        FacebookLink::whereIn('id',$ids)->delete();

        return redirect()->back()->with('status','Multiple Delete Successful');
    }
}
