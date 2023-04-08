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
            'small_img_1'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_2'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_3'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_4'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_5'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_6'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_7'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_8'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',
            'small_img_9'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',

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
            'description' => $request->description,
            'lower_price' => $request->lower_price,
            'upper_price' => $request->upper_price,
            'layer' =>$request->layer,
            'squre_feet' =>$request->squre_feet,
            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,
        ]);
        // for amenity select
        $p = Project::find($project->id);
        $p->amenity()->sync($amenities);

// start preview images

                $small_img_1=null;
                $image = $request->file('small_img_1');
                if($image){
                    $small_img_1 ='smallImg1_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_1);
                }

                $small_img_2=null;
                $image = $request->file('small_img_2');  //
                if($image){
                    $small_img_2 ='smallImg2_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_2);
                }

                $small_img_3=null;
                $image=$request->file('small_img_3');
                if($image){
                    $small_img_3 ='smallImg3_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_3);
                }

                $small_img_4=null;
                $image=$request->file('small_img_4');
                if($image){
                    $small_img_4 ='smallImg4_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_4);
                }

                $small_img_5=null;
                $image=$request->file('small_img_5');
                if($image){
                    $small_img_5 ='smallImg5_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_5);
                }

                $small_img_6=null;
                $image=$request->file('small_img_6');
                if($image){
                    $small_img_6='smallImg6_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_6);
                }

                $small_img_7=null;
                $image=$request->file('small_img_7');
                if($image){
                    $small_img_7 ='smallImg7_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_7);
                }

                $small_img_8=null;
                $image=$request->file('small_img_8');
                if($image){
                    $small_img_8 ='smallImg8_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_8);
                }

                $small_img_9=null;
                $image=$request->file('small_img_9');
                if($image){
                    $small_img_9 ='smallImg9_'.$project->project_name. uniqid() .'.'. $image->getClientOriginalExtension();
                    $image->storeAs('/public/images/gallery', $small_img_9);
                }


            $project=Previewimage::create([
                'project_id'=>$project->id,
                'small_img1'=>$small_img_1,
                'small_img2'=>$small_img_2,
                'small_img3'=>$small_img_3,
                'small_img4'=>$small_img_4,
                'small_img5'=>$small_img_5,
                'small_img6'=>$small_img_6,
                'small_img7'=>$small_img_7,
                'small_img8'=>$small_img_8,
                'small_img9'=>$small_img_9,
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
            'cover' => "nullable|mimes:jpeg,png,jpg,gif|max:2048|", // dimensions:width=600,height=900
            'gallery' => "nullable|mimes:jpeg,png,jpg,gif|max:2560",
            'description' => "required|string",
            'lower_price' => "required|min:2|max:20",
            'upper_price' => "required|min:2|max:30",
            'category_id' => "required",
            'layer' => "required|string|min:1|max:255",
            'squre_feet' => "required|string|min:1|max:255",
            'map_link'=>"required|string",
            'progress'=>"required|string",
            'amenity.*' => "required|string",
             'town' => "required",
            'city' => "required",
            'hou_no' => "required|string",
            'street' => "required|string",
            'ward' => "required|string",
            'small_img_1'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_2'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_3'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_4'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_5'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_6'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_7'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_8'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800
            'small_img_9'=>'nullable|mimes:jpeg,png|max:1024|dimensions:width=800,height=800',// |max:1024|dimensions:width=800,height=800

        ]);


        $find_project = Project::where('slug',$id);
        if(!$find_project->first()){
            return redirect()->back()->with('error', 'not found project');
        }

        $project_id = $find_project->first()->id;
        
        if($file = $request->file('cover')){
            $file_name = uniqid() . $file->getClientOriginalName();
            $file->move(public_path('/images/projects'), $file_name);

        }
        else{
            $file_name = $find_project->first()->cover;
        }

        $project_id = $find_project->first()->id;
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
            'description' => $request->description,
            'lower_price' => $request->lower_price,
            'upper_price' => $request->upper_price,
            'layer' =>$request->layer,
            'squre_feet' =>$request->squre_feet,
            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,

        ]);


         // for amenity select
         $project = Project::find($project_id);
         $project->amenity()->sync($amenities);

        //  return redirect(route('project.index', $slug))->with('status', 'Project updated successful.');

        //  preview image update
        $previewImage = Previewimage::where('project_id', $project_id)->first();

         $image1 = $request->file('small_img_1');
            if( $image1){
                Storage::delete('public/images/gallery/'.$previewImage->small_img_1);
                $small_img_1 ='smallImg1_'.$project->project_name. uniqid() .'.'. $image1->getClientOriginalExtension();
                $image1->storeAs('/public/images/gallery', $small_img_1);
                Previewimage::where('project_id', $project_id)->update(['small_img1' => $small_img_1]);
            }

         $image2 = $request->file('small_img_2');
            if( $image2){
                Storage::delete('public/images/gallery/'.$previewImage->small_img_2);
                $small_img_2 ='smallImg2_'.$project->project_name. uniqid() .'.'. $image2->getClientOriginalExtension();
                $image2->storeAs('/public/images/gallery', $small_img_2);
                Previewimage::where('project_id', $project_id)->update(['small_img2' => $small_img_2]);
            }

            $image3 = $request->file('small_img_3');
                if( $image3){
                    Storage::delete('public/images/gallery/'.$previewImage->small_img_3);
                    $small_img_3 ='smallImg3_'.$project->project_name. uniqid() .'.'. $image3->getClientOriginalExtension();
                    $image3->storeAs('/public/images/gallery', $small_img_3);
                    Previewimage::where('project_id', $project_id)->update(['small_img3' => $small_img_3]);
                }

                $image4 = $request->file('small_img_4');
                if( $image4){
                    Storage::delete('public/images/gallery/'.$previewImage->small_img_4);
                    $small_img_4 ='smallImg4_'.$project->project_name. uniqid() .'.'. $image4->getClientOriginalExtension();
                    $image4->storeAs('/public/images/gallery', $small_img_4);
                    Previewimage::where('project_id', $project_id)->update(['small_img4' => $small_img_4]);
                }

                $image5 = $request->file('small_img_5');
                if( $image5){
                    Storage::delete('public/images/gallery/'.$previewImage->small_img_5);
                    $small_img_5 ='smallImg5_'.$project->project_name. uniqid() .'.'. $image5->getClientOriginalExtension();
                    $image5->storeAs('/public/images/gallery', $small_img_5);
                    Previewimage::where('project_id', $project_id)->update(['small_img5' => $small_img_5]);
                }

                $image6 = $request->file('small_img_6');
                if( $image6){
                    Storage::delete('public/images/gallery/'.$previewImage->small_img_6);
                    $small_img_6 ='smallImg6_'.$project->project_name. uniqid() .'.'. $image6->getClientOriginalExtension();
                    $image6->storeAs('/public/images/gallery', $small_img_6);
                    Previewimage::where('project_id', $project_id)->update(['small_img6' => $small_img_6]);
                }

                $image7 = $request->file('small_img_7');
                if( $image7){
                    Storage::delete('public/images/gallery/'.$previewImage->small_img_7);
                    $small_img_7 ='smallImg7_'.$project->project_name. uniqid() .'.'. $image7->getClientOriginalExtension();
                    $image7->storeAs('/public/images/gallery', $small_img_7);
                    Previewimage::where('project_id', $project_id)->update(['small_img7' => $small_img_7]);
                }

                $image8 = $request->file('small_img_8');
                if( $image8){
                    Storage::delete('public/images/gallery/'.$previewImage->small_img_8);
                    $small_img_8 ='smallImg8_'.$project->project_name. uniqid() .'.'. $image8->getClientOriginalExtension();
                    $image8->storeAs('/public/images/gallery', $small_img_8);
                    Previewimage::where('project_id', $project_id)->update(['small_img8' => $small_img_8]);
                }

                $image9 = $request->file('small_img_9');
                if( $image9){
                    Storage::delete('public/images/gallery/'.$previewImage->small_img_9);
                    $small_img_9 ='smallImg9_'.$project->project_name. uniqid() .'.'. $image9->getClientOriginalExtension();
                    $image9->storeAs('/public/images/gallery', $small_img_9);
                    Previewimage::where('project_id', $project_id)->update(['small_img9' => $small_img_9]);
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

            // $imagePath=Previewimage
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

        // public function deleteimage($id){
        //     $image1=Previewimage::find($id);
        //     Storage::delete('public/images/gallery/'.$image1->small_img1);


        public function deleteimage($id){
        $image1=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image1->small_img1)) {
        File::delete(public_path("images/gallery/".$image1->small_img1));
        }
        $image2=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image2->small_img2)) {
        File::delete(public_path("images/gallery/".$image2->small_img2));
        }
         $image3=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image3->small_img3)) {
        File::delete(public_path("images/gallery/".$image3->small_img2));
        }
         $image4=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image4->small_img4)) {
        File::delete(public_path("images/gallery/".$image4->small_img4));
        }
         $image5=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image5->small_img5)) {
        File::delete(public_path("images/gallery/".$image5->small_img1));
        }
         $image6=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image6->small_img6)) {
        File::delete(public_path("images/gallery/".$image6->small_img6));
        }
         $image7=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image7->small_img7)) {
        File::delete(public_path("images/gallery/".$image7->small_img8));
        }
           $image8=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image8->small_img8)) {
        File::delete(public_path("images/gallery/".$image8->small_img8));
        }
           $image9=Previewimage::findOrFail($id);
            if (File::exists("images/gallery/".$image9->small_img9)) {
        File::delete(public_path("images/gallery/".$image9->small_img9));
        }

         Previewimage::find($id)->delete();
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
