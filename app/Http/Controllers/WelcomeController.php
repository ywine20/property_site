<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Models\Project;
// use App\Models\Address;
use App\Models\Slider;
use App\Models\FacebookLink;
use App\Models\Amenity;
use App\Models\City;
use App\Models\Town;
// use App\Models\Gallery;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


class WelcomeController extends Controller
{
    public function welcome(Request $request)
    {
        $currentURL = URL::current();
        // substr($string, $startPosition,$lengthOfSubstring);
        $string = $currentURL;
            if(substr($string, 0, 24) === "https://sunmyattunmm.com"){
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
            }else if(substr($string, 0, 28) === "https://www.sunmyattunmm.com") {
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
            }else{
                 // echo "The URL starts with not the desired URL.";
            }

        // $projects = Project::where('id', '<=', 6)->get();
        $projects = Project::latest('updated_at')->limit(6)->get();
        $amenities = Amenity::all();
        $facebooklinks = FacebookLink::latest()->limit(12)->get();
        $slider = Slider::all();
        // $address = Address::all();x  x
        $cities = City::all();
        $towns = Town::all();
        return view('welcome', compact('projects', 'slider', 'facebooklinks', 'amenities', 'cities', 'towns'));
    }

    public function detail($id)
    {
        $project = Project::find($id);
        $amenity = Amenity::all();
        $city = City::all();
        $town = Town::all();
        // $address = Address::all();
        // $gallery = Gallery::all();
        $category = Category::all();

        return view('projectdetail', compact('project', 'amenity', 'city', 'town', 'category'));
    }

    // public function livewire()
    // {
    //     return view('welcome', 'livewire');
    // }

}
