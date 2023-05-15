<?php

namespace App\Http\Controllers;

use App\Models\albumTest;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Amenity;
use App\Models\Assets;
use App\Models\Category;
// use App\Models\Address;
use App\Models\Town;
use App\Models\City;
use App\Models\siteProgress;
// use App\Models\Gallery;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class ProjectListController extends Controller
{

    public function projectlist(Request $request)
    {


        $currentURL = URL::current();
        // substr($string, $startPosition,$lengthOfSubstring);
        $string = $currentURL;
        if (substr($string, 0, 24) === "https://sunmyattunmm.com") {
            // echo "The URL starts with the desired URL.";
            $check_if_exists = DB::table('visitors')->where('session_id', $request->getSession()->getId())->first();
            $check_date = DB::table('visitors')->whereDate('created_at', Carbon::today())->get();

            if (!$check_if_exists || ($check_date->count()) < 1) {
                $visitor = new Visitor();
                $visitor->url = $request->url();
                $visitor->ip_address = $request->ip();
                $visitor->session_id = $request->getSession()->getId();
                $visitor->user_agent = $request->header('User-Agent');
                $visitor->visited_date = Carbon::now();
                $visitor->save();
            }

            Session::push('visited_user', request()->getSession()->getId());
        } else if (substr($string, 0, 28) === "https://www.sunmyattunmm.com") {
            // echo "The URL starts with the desired URL.";
            $check_if_exists = DB::table('visitors')->where('session_id', $request->getSession()->getId())->first();
            $check_date = DB::table('visitors')->whereDate('created_at', Carbon::today())->get();

            if (!$check_if_exists || ($check_date->count()) < 1) {
                $visitor = new Visitor();
                $visitor->url = $request->url();
                $visitor->ip_address = $request->ip();
                $visitor->session_id = $request->getSession()->getId();
                $visitor->user_agent = $request->header('User-Agent');
                $visitor->visited_date = Carbon::now();
                $visitor->save();
            }

            Session::push('visited_user', request()->getSession()->getId());
        } else {
            // echo "The URL starts with not the desired URL.";
        }


        $cities = City::all();
        $amenities = Amenity::all();
        $categories = Category::all();
        // $address = Address::all();
        $towns = Town::all();
        $projects = Project::latest()->paginate(9);
        $findCat = Category::where('category_id')->first();
        $findTon = Town::where('id')->first();
        $finPro = Project::where('id')->first();
        $findPro = Project::where('id')->first();
         $user = Auth::guard('user')->user();


        return view('projectlist', compact('user','projects', 'amenities', 'categories', 'towns', 'cities', 'findCat', 'findTon', 'findPro', 'finPro'));
    }

    // public function search(Request $request){
    //     return redirect()->back()->with('error',"sorry we can't find ");
    //    $projects = Project::latest();
    //    $projects = $projects->where('project_name','LIKE','%'.$request->search.'%')->get();
    //    return $projects;


    // }

    public function advance(Request $request)
    {
        $categories = Category::all();
        $cities = City::all();
        $amenities = Amenity::all();
        // $address = Address::all();
        $towns = Town::all();
        $projects = Project::latest();
        $user = Auth::guard('user')->user();


        if ($category_id = request()->category) {
            $findCategory = Category::where('category_id', $category_id)->first();
            if (!$findCategory) {
                return redirect('/projectlist')->with('error', 'category not found');
            }
            $projects->where('category_id', $findCategory->category_id);
        }

        if ($id = request()->township) {
            $findTown = Town::where('id', $id)->first();
            if (!$findTown) {
                return redirect('/projectlist')->with('error', 'township not found');
            }
            $projects->where('township_id', $findTown->id);
        }


       if ($request->input('search')) {
    $searchTerm = strtolower($request->search);
    $projects = $projects->whereRaw('LOWER(project_name) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(lower_price) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(upper_price) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(squre_feet) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(progress) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(layer) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(hou_no) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(street) LIKE ?', ['%'.$searchTerm.'%'])
        ->orWhereRaw('LOWER(ward) LIKE ?', ['%'.$searchTerm.'%']);
}

        // $arr = [];
        $findCat = Category::where('category_id', $category_id)->pluck('category_name')->first();
        $findTon = Town::where('id', $id)->pluck('name')->first();
        $finPro = $request->get('min_price');
        $findPro = $request->get('max_price');
        $findSearch = $request->get('search');


        if ($request->min_price && $request->max_price) {
            $minPrice  = (int) $request->min_price;
            $maxPrice  = (int) $request->max_price;

            $projects = $projects->whereHas('unitprice', function ($query) use ($minPrice, $maxPrice) {
                $query->where('price', '>=', $minPrice)
                    ->where('price', '<=', $maxPrice);
            })->get();


            return view('projectListAdvance', compact('user','projects', 'amenities', 'categories', 'towns', 'cities', 'findCat', 'findTon', 'finPro', 'findPro', 'findSearch',));
        }


        $findCat = Category::where('category_id', $category_id)->pluck('category_name')->first();
        $findTon = Town::where('id', $id)->pluck('name')->first();
        $finPro = $request->get('min_price');
        $findPro = $request->get('max_price');
        $findSearch = $request->get('search');

        $projects = $projects->paginate(9);

        return view('projectlist', compact('user','projects', 'amenities', 'categories', 'towns', 'cities', 'findCat', 'findTon', 'finPro', 'findPro', 'findSearch'));
    }

    public function detail($id, Request $request)
    {
        //production route
          $user = Auth::guard('user')->user();
        if(!$user) {
            return view('error');
        }


        $project = Project::find($id);


        if ($project) {

            $currentURL = URL::current();
            // substr($string, $startPosition,$lengthOfSubstring);
            $string = $currentURL;
            if (substr($string, 0, 24) === "https://sunmyattunmm.com") {
                // echo "The URL starts with the desired URL.";
                $check_if_exists = DB::table('visitors')->where('session_id', $request->getSession()->getId())->first();
                $check_date = DB::table('visitors')->whereDate('created_at', Carbon::today())->get();

                if (!$check_if_exists || ($check_date->count()) < 1) {
                    $visitor = new Visitor();
                    $visitor->url = $request->url();
                    $visitor->ip_address = $request->ip();
                    $visitor->session_id = $request->getSession()->getId();
                    $visitor->user_agent = $request->header('User-Agent');
                    $visitor->visited_date = Carbon::now();
                    $visitor->save();
                }

                Session::push('visited_user', request()->getSession()->getId());
            } else if (substr($string, 0, 28) === "https://www.sunmyattunmm.com") {
                // echo "The URL starts with the desired URL.";
                $check_if_exists = DB::table('visitors')->where('session_id', $request->getSession()->getId())->first();
                $check_date = DB::table('visitors')->whereDate('created_at', Carbon::today())->get();

                if (!$check_if_exists || ($check_date->count()) < 1) {
                    $visitor = new Visitor();
                    $visitor->url = $request->url();
                    $visitor->ip_address = $request->ip();
                    $visitor->session_id = $request->getSession()->getId();
                    $visitor->user_agent = $request->header('User-Agent');
                    $visitor->visited_date = Carbon::now();
                    $visitor->save();
                }

                Session::push('visited_user', request()->getSession()->getId());
            } else {
                // echo "The URL starts with not the desired URL.";
            }




            $amenity = Amenity::all();
            $city = City::all();
            $town = Town::all();
            // $address = Address::all();
            // $gallery = Gallery::all();
            $category = Category::all();
            $siteProgress = siteProgress::latest()->with('images')->where('project_id', $project->id)->first();
            $albums = albumTest::where('project_id', $project->id)->get();

            $assets =  Assets::where('customer_id',  Auth::guard('user')->user()->id)
                ->where('project_id', $id)
                ->first();

            // if ($siteProgressAssets && $siteProgressAssets->site_progress == "1") {
            //     return $siteProgressAssets;
            // }


            $expiresAt = now()->addHours(3);


            views($project)
                ->cooldown($expiresAt)
                ->record();
            $count = views($project)->count();
            $project->viewer = $count;
            $project->update();

            return view('projectdetail', compact('project', 'amenity', 'city', 'town', 'category', 'siteProgress', 'albums', 'assets'));
        } else {
            return redirect()->back();
        }
    }

    public function siteProgressList($projectId)
    {
            $user = Auth::guard('user')->user();

        if($user) {
            $assets =  Assets::where('customer_id',  Auth::guard('user')->user()->id)
                ->where('project_id', $projectId)
                ->first();
                // return $projectId;
            if($assets->customer_id == $user->id){
                 $siteProgresses = siteProgress::latest()->where('project_id', $projectId)->get();
                return view('siteprogress.list', ['siteProgresses' => $siteProgresses]);
            }else{
                return view('error');
            }
        }
        else{
            return view('error');
        }



    }

    public function siteProgressDetail($projectId,$id)
    {

         $user = Auth::guard('user')->user();
        if($user) {
            $assets =  Assets::where('customer_id',  Auth::guard('user')->user()->id)
                ->where('project_id', $projectId)
                ->first();
                // dd($assets);
            if($assets->customer_id == $user->id){

                $siteProgress = siteProgress::find($id);
                if($siteProgress){
                    return view('siteprogress.show', ['siteProgress' => $siteProgress]);
                }else{
                    return abort(404);
                }

            }else{
                return view('error');
            }
        }
        else{
            return view('error');
        }

    }

    public function albumDetail($projectId,$id)
    {
        $user = Auth::guard('user')->user();
        if($user) {
            $assets =  Assets::where('customer_id',  Auth::guard('user')->user()->id)
                ->where('project_id', $projectId)
                ->first();
            if($assets->customer_id == $user->id){
                $album = albumTest::where('id', $id)->first();
                if($album){

                    return view('albumDetail', ['album' => $album]);
                }
                else{
                     return abort(404);
                }
            }else{
                return view('error');
            }
        }
        else{
            return view('error');
        }

    }
}
    // public function advance(Request $request)
    // {
    //     $data = \DB::table('projects');
    //     if( $request->min_price && $request->max_price ){
    //         $data = $data->where('l_price', '>=', $request->min_price)
    //                      ->where('r_price', '<=', $request->max_price);
    //     }
    //     $data = $data->paginate(3);
    //     return view('projectlist', compact('data'));
    // }

    // public function index()
    // {
    //     $data['categories'] = Category::get(["category_name", "category_id"]);
    //     return view('projectlist', $data);
    // }
    // public function fetchProject(Request $request)
    // {
    //     $data['projects'] = Project::where("category_id",$request->category_id)->get(["name", "id"]);
    //     return response()->json($data);
    // }
