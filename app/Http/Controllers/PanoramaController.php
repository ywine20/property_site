<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Visitor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

// use App\Models\Gallery;

class PanoramaController extends Controller
{
    public function panorama($id,Request $request)
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

        $project = Project::find($id);
        return view('panorama360', compact('project'));
    }
}
