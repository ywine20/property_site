<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Amenity;
use Illuminate\Support\Facades\Validator;

// use App\Models\Project;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::all();
        $amenities = Amenity::all();
        return view('admin.amenity.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $projects = Project::all();
        $amenities = Amenity::all();
        return view('admin.amenity.create', compact('amenities'));
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
            'amenity' => "required|string|min:3|max:255",
        ]);

        // $project = Project::where('id', $request->id)->first();
        // if(!$project){
        //     return redirect()->back()->with('error', 'Not found project');
        // }

        $amenity = Amenity::create([
            'amenity' => $request->amenity,
            // 'project_id' => $project->id,
        ]);
        $amenity->save();
        return redirect('/admin/amenity')->with('success', 'Your Amenity has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $amenity = Amenity::where('id', $id)->first();
        if(!$amenity) {
            return redirect()->back()->with('error', 'Amenity not found');
        }
        return view('admin.amenity.show',compact('amenity'));
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
        $amenity = Amenity::where('id', $id)
            ->with('projects')
            ->first();
            if(!$amenity){
                return redirect()->back()->with('error', 'Amenity Not found');
            }
        return view('admin.amenity.edit', compact('amenity'));
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

        $validator =  Validator::make($request->all(), [
            'amenity_name' => 'required|string|min:3|max:255'
        ]);


        if ($validator->fails()) {
//            $errorText = $validator->messages()->getMessages();
            return redirect()->back()->with('error', 'Something Wrong');
        } else {
            Amenity::where('id', $request->amenity_id)->update([
                'amenity' => $request->amenity_name,
            ]);
        }
        return redirect('/admin/amenity')->with('status', 'Amenity Updated Successful');

//        $amenity = Amenity::where('id', $request->amenity_id);
//        if(!$amenity->first()){
//            return redirect()->back()->with('error', 'amenity is not here');
//        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenity = Amenity::where('id', $id);
        if(!$amenity->first()){
            return redirect()->back()->with('error', 'there is no amenity');
        }
        $amenity->delete();
        return response()->json([
            "status" => 'success',
            "info"=>'delete successful'
        ]);
        // return redirect('/admin/amenity')->with('success', 'Amenity deleted successfully');
    }

    public function multiDelAmenity(Request $request){
        $ids = $request->chk;
        Amenity::whereIn('id',$ids)->delete();
//        Category::destroy(collect($ids));
        return redirect()->back()->with('status','Multiple Delete Successful');
    }
}
