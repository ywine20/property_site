<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\Project;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
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
        return redirect('/admin/amenity')->with('status', 'Your Amenity has been added');
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
        if (!$amenity) {
            return redirect()->back()->with('error', 'Amenity not found');
        }
        return view('admin.amenity.show', compact('amenity'));
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
        if (!$amenity) {
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

        try {
            $amenity = Amenity::find($id);

            if (!$amenity) {
                return response()->json([
                    "status" => 'error',
                    "info" => 'not found amenity'
                ]);
            }

            $usedInProjects = DB::table('project_amenity')->where('amenity_id', $id)->exists();

            if ($usedInProjects) {
                return response()->json([
                    "status" => 'error',
                    "info" => 'Cannot delete the amenity because it is associated with one or more projects.'
                ]);
            }

            $amenity->delete();

            return response()->json([
                "status" => 'success',
                "info" => 'Delete successful'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "status" => 'error',
                "info" => 'An error occurred while deleting the amenity..'
            ]);
        }
    }

    // public function multiDelAmenity(Request $request)
    // {
    //     $ids = $request->chk;
    //     Amenity::whereIn('id', $ids)->delete();
    //     //        Category::destroy(collect($ids));
    //     return redirect()->back()->with('status', 'Multiple Delete Successful');
    // }


    public function multiDelAmenity(Request $request)
    {
        $ids = $request->chk;

        // Check if any of the amenities are associated with projects
        $usedInProjects = DB::table('project_amenity')->whereIn('amenity_id', $ids)->exists();

        if ($usedInProjects) {
            return redirect()->back()->with('error', 'Cannot delete the amenity because it is associated with one or more projects.');
        }

        Amenity::whereIn('id', $ids)->delete();

        return redirect()->back()->with('status', 'Multiple Delete Successful');
    }
}
