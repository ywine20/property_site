<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Town;
use App\Models\Amenity;
use App\Models\Previewimage;
use App\Models\City;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
        // $small_img_1=Previewimage::all();
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
            'threeSixtyImage' => "nullable|mimes:jpeg,png,jpg,gif|max:2560",
            'description' => "required|string",
            'lower_price' => "required|min:2|max:20",
            'upper_price' => "required|min:2|max:30",
            'category' => "required",
            'layer' => "required|string|min:1|max:255",
            'squre_feet' => "required|string|min:1|max:255",
            'map_link' => "required|string",
            'progress' => "required|string",
            'amenity.*' => "required|string",
            'hou_no' => "required|string",
            'street' => "required|string",
            'ward' => "required|string",
            'town_slug' => "required",
            'city_slug' => "required",
            'small_img_1' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_2' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_3' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_4' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_5' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_6' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_7' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_8' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_9' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',

        ]);

        $category = Category::where('category_id', $request->category)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Not found category');
        }

        $city = City::where('slug', $request->city_slug)->first();
        if (!$city) {
            return redirect()->back()->with('error', 'Not found city');
        }

        $town = Town::where('slug', $request->town_slug)->first();
        if (!$town) {
            return redirect()->back()->with('error', 'Not found township');
        }

        $amenities = [];
        foreach ($request->amenity as $am) {
            $amenity = Amenity::where('id', $am)->first();
            if (!$amenity) {
                return redirect()->back()->with('error', 'amenity not found');
            }
            $amenities[] = $amenity->id;
        }

        $cover_name = "";
        $cover = $request->file('cover');
        if ($cover) {
            $cover_name = 'cover_' . $request->project_Id . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();
            $cover->storeAs('/public/images/cover/', $cover_name);
        }

        $threeSixtyImage_name = '';
        $threeSixtyImage = $request->file('threeSixtyImage');
        if ($threeSixtyImage) {
            $threeSixtyImage_name = '360_' . $request->project_Id . '_' . uniqid() . '.' . $threeSixtyImage->getClientOriginalExtension();
            $threeSixtyImage->storeAs('/public/images/360Images', $threeSixtyImage_name);

        }

        $project = Project::create([
            'slug' => Str::slug($request->project_name) . uniqid(),
            'project_name' => $request->project_Id,
            'cover' => $cover_name,
            'three_sixty_image' =>  $threeSixtyImage_name,
            'category_id' => $category->category_id,
            'township_id' => $town->id,
            'city_id' => $city->id,
            'gmlink' => $request->map_link,
            'progress' => $request->progress,
            'description' => $request->description,
            'lower_price' => $request->lower_price,
            'upper_price' => $request->upper_price,
            'layer' => $request->layer,
            'squre_feet' => $request->squre_feet,

            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,
        ]);
        // for amenity select
        $p = Project::find($project->id);
        $p->amenity()->sync($amenities);

        // start preview images

        $small_img_1 = null;
        $image = $request->file('small_img_1');
        if ($image) {
            $small_img_1 = 'smallImg1_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_1);
        }

        $small_img_2 = null;
        $image = $request->file('small_img_2');  //
        if ($image) {
            $small_img_2 = 'smallImg2_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_2);
        }

        $small_img_3 = null;
        $image = $request->file('small_img_3');
        if ($image) {
            $small_img_3 = 'smallImg3_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_3);
        }

        $small_img_4 = null;
        $image = $request->file('small_img_4');
        if ($image) {
            $small_img_4 = 'smallImg4_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_4);
        }

        $small_img_5 = null;
        $image = $request->file('small_img_5');
        if ($image) {
            $small_img_5 = 'smallImg5_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_5);
        }

        $small_img_6 = null;
        $image = $request->file('small_img_6');
        if ($image) {
            $small_img_6 = 'smallImg6_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_6);
        }

        $small_img_7 = null;
        $image = $request->file('small_img_7');
        if ($image) {
            $small_img_7 = 'smallImg7_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_7);
        }

        $small_img_8 = null;
        $image = $request->file('small_img_8');
        if ($image) {
            $small_img_8 = 'smallImg8_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_8);
        }

        $small_img_9 = null;
        $image = $request->file('small_img_9');
        if ($image) {
            $small_img_9 = 'smallImg9_' . $project->project_name . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/public/images/gallery', $small_img_9);
        }


        $project = Previewimage::create([
            'project_id' => $project->id,
            'small_img1' => $small_img_1,
            'small_img2' => $small_img_2,
            'small_img3' => $small_img_3,
            'small_img4' => $small_img_4,
            'small_img5' => $small_img_5,
            'small_img6' => $small_img_6,
            'small_img7' => $small_img_7,
            'small_img8' => $small_img_8,
            'small_img9' => $small_img_9,
        ]);
        //end preview image


        return redirect('/admin/project')->with('status', 'Project created successful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $towns = Town::all();
        $cities = City::all();
        $amenities = Amenity::all();
        $categories = Category::all();
        $project = Project::where('slug', $slug)->first();
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found');
        }
        return view('admin.project.show', compact('project', 'amenities', 'categories', 'cities', 'towns'));
    }

    public function detail($id)
    {
        // return $id;
        $towns = Town::all();
        $cities = City::all();
        $amenity = Amenity::all();
        $categories = Category::all();
        $project = Project::with('siteProgresses')->where('id', $id)->first();

        foreach ($project->siteProgresses as $siteProgress) {
            $images = unserialize($siteProgress->images);
            foreach ($images as &$image) {
                $image = Storage::url('images/siteProgress/'.$image);
            }
            $siteProgress->images = $images;
        }
        
        if (!$project) {
            return redirect()->back()->with('error', 'Project not found');
        }
        return view('admin.project.detail', compact('project', 'amenity', 'categories', 'cities', 'towns'));
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
        $ategories = Category::all();
        $cities = City::all();
        $amenity = Amenity::all();
        $project = Project::where('slug', $id)
            ->with('categories', 'amenity', 'towns', 'cities')
            ->first();
        if (!$project) {
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
            'cover' => "nullable|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=600,height=900", // dimensions:width=600,height=900
            'threeSixtyImage' => "nullable|mimes:jpeg,png,jpg,gif|max:2560",
            'description' => "required|string",
            'lower_price' => "required|min:2|max:20",
            'upper_price' => "required|min:2|max:30",
            'category_id' => "required",
            'layer' => "required|string|min:1|max:255",
            'squre_feet' => "required|string|min:1|max:255",
            'map_link' => "required|string",
            'progress' => "required|string",
            'amenity.*' => "required|string",
            'town' => "required",
            'city' => "required",
            'hou_no' => "required|string",
            'street' => "required|string",
            'ward' => "required|string",
            'small_img_1' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_2' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_3' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_4' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_5' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_6' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_7' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_8' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800
            'small_img_9' => 'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800', // |max:1024|dimensions:width=800,height=800

        ]);

        $find_project = Project::find($id);
        // if (!$find_project->first()) {
        //     return redirect()->back()->with('error', 'not found project');
        // }

        // return $find_project

        $category = Category::where('category_id', $request->category_id)->first();
        if (!$category) {
            return redirect()->back()->with('error', 'Not found category');
        }

        $town = Town::where('id', $request->town)->first();
        if (!$town) {
            return redirect()->back()->with('error', 'Not found township');
        }

        $city = City::where('id', $request->city)->first();
        if (!$city) {
            return redirect()->back()->with('error', 'Not found city');
        }


        $amenities = [];
        foreach ($request->amenity as $am) {
            $amenity = Amenity::find($am);
            if (!$amenity) {
                return redirect()->back()->with('error', 'amenity not found');
            }
            $amenities[] = $amenity->id;
        }


        // Cover
        $cover = $request->file('cover');
        if ($cover) {
            Storage::delete('public/images/cover/' . $find_project->cover);
            $cover_name = 'cover_' . $request->project_Id . '_' . uniqid() . '.' . $cover->getClientOriginalExtension();
            $cover->storeAs('/public/images/cover', $cover_name);
        } else {
            $cover_name = $find_project->cover;
        }


        // 360 Images
        $threeSixtyImage = $request->file('threeSixtyImage');
        if ($threeSixtyImage) {
            Storage::delete('public/images/360Images/' . $find_project->three_sixty_image);
            $threeSixtyImage_name = '360_' . $request->project_Id . '_' . uniqid() . '.' . $threeSixtyImage->getClientOriginalExtension();
            $threeSixtyImage->storeAs('/public/images/360Images', $threeSixtyImage_name);
        } else {
            $threeSixtyImage_name = $find_project->three_sixty_image;
        }

        // $slug = uniqid() . Str::slug($request->project_name);
        $find_project->update([
            // 'slug' => $slug,
            'project_name' => $request->project_Id,
            'cover' => $cover_name,
            'three_sixty_image' => $threeSixtyImage_name,
            'category_id' => $category->category_id,
            'township_id' => $town->id,
            'city_id' => $city->id,
            'gmlink' => $request->map_link,
            'progress' => $request->progress,
            'description' => $request->description,
            'lower_price' => $request->lower_price,
            'upper_price' => $request->upper_price,

            'layer' => $request->layer,
            'squre_feet' => $request->squre_feet,
            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,
        ]);

        $project_id = $find_project->id;


        // for amenity select
        $project = Project::find($project_id);
        $project->amenity()->sync($amenities);

        //  preview image update
        $previewImage = Previewimage::where('project_id', $id)->first();


        $image1 = $request->file('small_img_1');

        if ($image1) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img1);
            $small_img_1 = 'smallImg1_' . $project->project_name . uniqid() . '.' . $image1->getClientOriginalExtension();
            $image1->storeAs('/public/images/gallery', $small_img_1);
            $previewImage->update(['small_img1' => $small_img_1]);
        }

        $image2 = $request->file('small_img_2');
        if ($image2) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img2);
            $small_img_2 = 'smallImg2_' . $project->project_name . uniqid() . '.' . $image2->getClientOriginalExtension();
            $image2->storeAs('/public/images/gallery', $small_img_2);
            $previewImage->update(['small_img2' => $small_img_2]);
        }

        $image3 = $request->file('small_img_3');
        if ($image3) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img3);
            $small_img_3 = 'smallImg3_' . $project->project_name . uniqid() . '.' . $image3->getClientOriginalExtension();
            $image3->storeAs('/public/images/gallery', $small_img_3);
            $previewImage->update(['small_img3' => $small_img_3]);
        }

        $image4 = $request->file('small_img_4');
        if ($image4) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img4);
            $small_img_4 = 'smallImg4_' . $project->project_name . uniqid() . '.' . $image4->getClientOriginalExtension();
            $image4->storeAs('/public/images/gallery', $small_img_4);
            $previewImage->update(['small_img4' => $small_img_4]);
        }

        $image5 = $request->file('small_img_5');
        if ($image5) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img5);
            $small_img_5 = 'smallImg5_' . $project->project_name . uniqid() . '.' . $image5->getClientOriginalExtension();
            $image5->storeAs('/public/images/gallery', $small_img_5);
            $previewImage->update(['small_img5' => $small_img_5]);
        }

        $image6 = $request->file('small_img_6');
        if ($image6) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img6);
            $small_img_6 = 'smallImg6_' . $project->project_name . uniqid() . '.' . $image6->getClientOriginalExtension();
            $image6->storeAs('/public/images/gallery', $small_img_6);
            $previewImage->update(['small_img6' => $small_img_6]);
        }

        $image7 = $request->file('small_img_7');
        if ($image7) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img7);
            $small_img_7 = 'smallImg7_' . $project->project_name . uniqid() . '.' . $image7->getClientOriginalExtension();
            $image7->storeAs('/public/images/gallery', $small_img_7);
            $previewImage->update(['small_img7' => $small_img_7]);
        }

        $image8 = $request->file('small_img_8');
        if ($image8) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img8);
            $small_img_8 = 'smallImg8_' . $project->project_name . uniqid() . '.' . $image8->getClientOriginalExtension();
            $image8->storeAs('/public/images/gallery', $small_img_8);
            $previewImage->update(['small_img8' => $small_img_8]);
        }

        $image9 = $request->file('small_img_9');
        if ($image9) {
            Storage::delete('public/images/gallery/' . $previewImage->small_img9);
            $small_img_9 = 'smallImg9_' . $project->project_name . uniqid() . '.' . $image9->getClientOriginalExtension();
            $image9->storeAs('/public/images/gallery', $small_img_9);
            $previewImage->update(['small_img9' => $small_img_9]);
        }

        return redirect(route('project.index', $id))->with('status', 'Project updated successful.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $project = Project::where('id', $id)->first();
        // Project::find($project->first()->id)->amenity()->sync([]);

        // Delete related records from project_amenity table
        Project::find($id)->amenity()->detach();    

        //delete cover from local
        Storage::delete('public/images/cover/' . $project->cover);

        //delete 360 image form local
        Storage::delete('public/images/360Images/' . $project->three_sixty_image);


        // delete small image form local
        $previewImage = Previewimage::where('project_id', $id)->first();
        for ($i = 1; $i <= 9; $i++) {
            $name = 'small_img' . $i;
            if ($previewImage->$name) {
                Storage::delete('public/images/gallery/' . $previewImage->$name);
            }
        }

        $previewImage->delete();
        $project->delete();
        return response()->json([
            "status" => 'success',
            "info" => 'delete successful',
        ]);
    }

    // Win Win Maw
    //  delete multiple project 
    public function multiDelProject(Request $request)
    {
        $ids = $request->chk;

        if (empty($ids)) {
            return response()->json(['message' => 'No IDs provided.'], 400);
        }

        $projects = Project::whereIn('id',$ids)->get();

        //Delete Cover Photo
        foreach($projects as $project){
            $cover = $project->cover;
           if($cover){
            Storage::delete('public/images/cover/' . $cover);
           }

        }

        //Delete 360 Image
        foreach($projects as $project){
            $threeSixty = $project->three_sixty_image;
           if($threeSixty){
            Storage::delete('public/images/360Images/' . $threeSixty);
           }

        }

           // delete small image form local
           $previewImage = Previewimage::whereIn('project_id', $ids)->get();
           foreach($previewImage as $smallImage){
               for ($i = 1; $i <= 9; $i++) {
               $name = 'small_img' . $i;
               if ($smallImage->$name) {
                   Storage::delete('public/images/gallery/' . $smallImage->$name);
               }
            }
           }

        Previewimage::whereIn('project_id', $ids)->delete();
        Project::whereIn('id', $ids)->delete();
        //        Category::destroy(collect($ids));
        return redirect()->back()->with('status', 'Multiple Delete Successful');
    }
}
