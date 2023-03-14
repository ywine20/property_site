<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Town;
use App\Models\Amenity;
use App\Models\Image;
use App\Models\City;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = Town::all();
        $cities = City::all();
        $categories = Category::with('project')->get();
        $projects = Project::latest('id')->get();
        // $amenities = Amenity::with('projects')->get();
        $amenities = Amenity::all();
        return view('admin.project.index', compact('projects', 'categories', 'amenities', 'towns', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $towns = Town::all();
        $projects = Project::all();
        $categories = Category::all();
        $cities = City::all();
        $amenities = Amenity::all();
        // $galleries = Gallery::all();
        return view('admin.project.create', compact('projects', 'categories', 'amenities', 'cities', 'towns'));
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
            'project_Id' => "required|string|min:3|max:255",
            // dimensions:width=600,height=900|max:2048|
            'cover' => "required|mimes:jpeg,png,jpg,gif",
            'gallery' => "nullable|mimes:jpeg,png,jpg,gif|max:2560",
            'description' => "required|string",
            'lower_price' => "required|min:2|max:20",
            'upper_price' => "required|min:2|max:30",
            'category' => "required",
            'layer' => "required|string|min:1|max:255",
            'squre_feet' => "required|string|min:1|max:255",
            'map_link'=>"required|string",
            'progress'=>"required|string",
            'amenity.*' => "required|string",
            'hou_no' => "required|string",
            'street' => "required|string",
            'ward' => "required|string",
            'town_slug' => "required",
            'city_slug' => "required",
            // |max:1024|dimensions:width=800,height=800
            'small_img_1'=>'nullable|mimes:jpeg,png',
        ]);


        $category = Category::where('category_id', $request->category)->first();
        if(!$category){
            return redirect()->back()->with('error', 'Not found category');
        }

        $city = City::where('slug', $request->city_slug)->first();
        if(!$city){
            return redirect()->back()->with('error', 'Not found city');
        }

        $town = Town::where('slug', $request->town_slug)->first();
        if(!$town){
            return redirect()->back()->with('error', 'Not found township');
        }

        // $address = Address::where('id', $request->id)->first();
        // if(!$address){
        //     return redirect()->back()->with('error', 'Not found Address');
        // }

        // $amenity = Amenity::where('amenity_id', $request->amenity_id)->first();
        // if(!$amenity){
        //     return redirect()->back()->with('error', 'Not found Amenity');
        // }

        // $gallery = Gallery::where('id', $request->id)->first();
        // if(!$gallery){
        //     return redirect()->back()->with('error', 'Not found Gallery');
        // }

        $amenities = [];
        foreach($request->amenity as $am){
            $amenity = Amenity::where('id', $am)->first();
            if(!$amenity){
                return redirect()->back()->with('error', 'amenity not found');
            }
            $amenities[] = $amenity->id;
        }

        $image_name="";
           $image = $request->file('cover');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/projects/'), $image_name);
        }

        $image_file = '';
        if($request->hasFile('gallery')){
            $image = $request->file('gallery');
            $image_file = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/360images/'), $image_file);
        }

        $project = Project::create([
            'slug' => Str::slug($request->project_name).uniqid(),
            'project_name' => $request->project_Id,
            'cover' => $image_name,
            'gallery' => $image_file,
            'category_id' => $category->category_id,
            'township_id' => $town->id,
            'city_id' => $city->id,
            'gmlink'=>$request->map_link,
            'progress'=>$request->progress,
            // 'amenity_id' => $amenity->amenity_id,
            'description' => $request->description,
            'lower_price' => $request->lower_price,
            'upper_price' => $request->upper_price,
            // 'longitude' => $request->longitude,
            // 'latitude' => $request->latitude,
            'layer' =>$request->layer,
            'squre_feet' =>$request->squre_feet,
            // 'project_id_number' => $request->project_id_number,

            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,
        ]);
        // for amenity select
        $p = Project::find($project->id);
        $p->amenity()->sync($amenities);

// start Small images

 $image_name="";
           $image = $request->file('small_img_1');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }

 $image_name="";
           $image = $request->file('small_img_2');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
 $image_name="";
           $image = $request->file('small_img_3');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
 $image_name="";
           $image = $request->file('small_img_4');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
 $image_name="";
           $image = $request->file('small_img_5');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
 $image_name="";
           $image = $request->file('small_img_6');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
 $image_name="";
           $image = $request->file('small_img_7');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
 $image_name="";
           $image = $request->file('small_img_8');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
 $image_name="";
           $image = $request->file('small_img_9');
        if($image){
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('/images/gallery/'), $image_name);
        }
        Image::create([
                'project_id'=>$project->id,
                'small_img1'=>$image_name,
                'small_img2'=>$image_name,
                'small_img3'=>$image_name,
                'small_img4'=>$image_name,
                'small_img5'=>$image_name,
                'small_img6'=>$image_name,
                'small_img7'=>$image_name,
                'small_img8'=>$image_name,
                'small_img9'=>$image_name,
        ]);

//end Small image


        return redirect('/admin/project')->with('status', 'Project created successful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $towns = Town::all();
        $cities = City::all();
        $amenities = Amenity::all();
        $categories = Category::all();
        $project = Project::where('slug', $id)->first();
        if(!$project) {
            return redirect()->back()->with('error', 'Project not found');
        }
        return view('admin.project.show',compact('project', 'amenities', 'categories', 'cities', 'towns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $towns = Town::all();
        $categories = Category::all();
        $cities = City::all();
        $amenity = Amenity::all();
        // $galleries = Gallery::all();
        $project = Project::where('slug', $id)
            ->with('categories', 'amenity', 'towns', 'cities')
            ->first();
            if(!$project){
                return redirect()->back()->with('error', 'Project Not found');
            }
        return view('admin.project.edit', compact('categories', 'project', 'amenity', 'towns', 'cities'));
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
        $request->validate([

            'project_Id' => "required|string|min:3|max:255",
            // dimensions:width=600,height=900
            'cover' => "nullable|mimes:jpeg,png,jpg,gif|max:2048|",
            'gallery' => "nullable|mimes:jpeg,png,jpg,gif|max:2560",
            'description' => "required|string",
            'lower_price' => "required|min:2|max:20",
            'upper_price' => "required|min:2|max:30",
            'category_id' => "required",
            'layer' => "required|string|min:1|max:255",
            'squre_feet' => "required|string|min:1|max:255",
            // 'project_id_number' => "required|integer",
            'map_link'=>"required|string",
            'progress'=>"required|string",
            'amenity.*' => "required|string",
             'town' => "required",
            'city' => "required",
            'hou_no' => "required|string",
            'street' => "required|string",
            'ward' => "required|string",
            'images.*'=> 'nullable|mimes:jpeg,png|max:1024|',

        ]);

        $find_project = Project::where('slug', $id);
        if(!$find_project->first()){
            return redirect()->back()->with('error', 'not found project');
        }

        $project_id = $find_project->first()->id;
        if($file = $request->file('cover')){
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images/projects'), $file_name);
        }else{
            $file_name = $find_project->first()->cover;
        }

        // $project_id = $find_project->first()->id;
        if($file = $request->file('gallery')){
            $file_image = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images/360images'), $file_image);
        }else{
            $file_image = $find_project->first()->gallery;
        }

        $category = Category::where('category_id', $request->category_id)->first();
        if(!$category){
            return redirect()->back()->with('error', 'Not found category');
        }

        $town = Town::where('id', $request->town)->first();
        if(!$town){
            return redirect()->back()->with('error', 'Not found township');
        }

        $city = City::where('id', $request->city)->first();
        if(!$city){
            return redirect()->back()->with('error', 'Not found city');
        }

        // $address = Address::where('id', $request->id)->first();
        // if(!$address){
        //     return redirect()->back()->with('error', 'Not found Address');
        // }

        // $amenity = Amenity::where('amenity_id', $request->amenity_id)->first();
        // if(!$amenity){
        //     return redirect()->back()->with('error', 'Not found Amenity');
        // }

        // $gallery = Gallery::where('id', $request->id)->first();
        // if(!$gallery){
        //     return redirect()->back()->with('error', 'Not found Gallery');
        // }

        $amenities = [];
        foreach($request->amenity as $am){
            $amenity = Amenity::where('id', $am)->first();
            if(!$amenity){
                return redirect()->back()->with('error', 'amenity not found');
            }
            $amenities[] = $amenity->id;
        }

        $slug = uniqid() . Str::slug($request->project_name);
        $find_project->update([
            'slug' => $slug,
            'project_name' => $request->project_Id,
            'cover' => $file_name,
            'gallery' => $file_image,
            'category_id' => $category->category_id,
            'township_id' => $town->id,
            'city_id' => $city->id,
            'gmlink'=>$request->map_link,
            'progress'=>$request->progress,
            // 'amenity_id' => $amenity->amenity_id,
            'description' => $request->description,
            'lower_price' => $request->lower_price,
            'upper_price' => $request->upper_price,
            // 'longitude' => $request->longitude,
            // 'latitude' => $request->latitude,
            'layer' =>$request->layer,
            'squre_feet' =>$request->squre_feet,
            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,
        ]);
        // for amenity select
        $project = Project::find($project_id);
        $project->amenity()->sync($amenities);

        // for images
        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $image_name=time().'_'.$file->getClientOriginalName();
                $request["project_id"]=$project->id;
                $request["image"]=$image_name;
                $file->move(\public_path("images/gallery"),$image_name);
                Image::create($request->all());

            }
        }

        return redirect(route('project.index', $slug))->with('status', 'Project updated successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function destroy($id)
        {
            $project = Project::where('id', $id);
            Project::find($project->first()->id)->amenity()->sync([]);
            $project->delete();
                return response()->json([
                    "status" => 'success',
                    "info"=>'delete successful'
                ]);
            // $projects=Project::findOrFail($id);

            // if(!$projects->first()){
            //     return redirect()->back()->with('error', 'not found project');
            // }

            // Project::find($projects->first()->id)->amenity()->sync([]);

            // if (File::exists("images/projects/".$projects->cover)) {
            // File::delete(public_path('images/projects/' . $projects->cover));
            // }

            // if (File::exists("images/360images/".$projects->gallery)) {
            // File::delete(public_path('images/360images/' . $projects->gallery));
            // }

            // $images = Image::where("id",$projects->id)->get();
            // foreach($images as $image){
            // if (File::exists("images/gallery/".$image->image)) {
            // File::delete(public_path('images/gallery/' . $image->first()->image));
            // }
            // }
            // $projects->delete();
            // return response()->json([
            //     "status" => 'success',
            //     "info"=>'delete successful'
            // ]);
            // return redirect('/admin/project')->with('success', 'Your project has been deleted successfully.');
        }

        public function deleteimage($id){
        $images=Image::findOrFail($id);
        if (File::exists("images/gallery/".$images->image)) {
        File::delete(public_path("images/gallery/".$images->image));
        }

        Image::find($id)->delete();
        return back();
        }

        public function deletecover($id){
        $cover=Project::findOrFail($id)->cover;
        if (File::exists("images/projects/".$cover)) {
        File::delete(public_path("images/projects/".$cover));
        }
        return back();
        }

        // $project = Project::where('id', $id);
        // if (!$project->first()){
        //     return redirect()->back()->with('error', 'Project Not Found');
        // }
        // File::delete(public_path('images/projects/' . $project->first()->image));
        // $project->delete();
        // return redirect('/project')->with('success', 'Project deleted successfully');


    // Win Win Maw
    public function multiDelProject(Request $request){
        $ids = $request->chk;
        Project::whereIn('id',$ids)->delete();
//        Category::destroy(collect($ids));
        return redirect()->back()->with('status','Multiple Delete Successful');
    }
}
