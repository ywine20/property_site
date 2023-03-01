<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Project;
use App\Models\Town;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use App\Models\Contact;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function login()
    {
        request()->validate([
            'email' => 'required|exists:admins',
            'password' => 'required',
        ]);

        $cre = request()->only('email', 'password');
        if(auth()->guard('admin')->attempt($cre)){
            return redirect('/admin');
        }
        return redirect()->back();
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function showDashboard()
    {
        $chartVisitor = Visitor::select(DB::raw("COUNT(*) as count"), DB::raw("Date(created_at) as date_name"))
            ->where('created_at', '>=', Carbon::today()->subDay(9))
            ->groupBy(DB::raw("date_name"))
            ->orderBy('date_name', 'ASC')
            ->pluck('count', 'date_name');


        $labels = $chartVisitor->keys();
        $chartData = $chartVisitor->values();

//        $projects = Project::all()->take(10);
        $projects = Project::orderBy('viewer', 'DESC')->take(10)->get();

        $categories = Category::all();
        $towns = Town::all();
        $cities = City::all();

        $data = Admin::take(1)->first();
        return view('admin.dashboard',[
            'data'=>$data,
            'labels' => $labels,
            'chartData' => $chartData,
            'projects'=>$projects,
            'categories'=>$categories,
            'towns'=>$towns,
            'cities'=>$cities
        ]);
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/');
    }

    public function profile()
    {
        return view('admin.user.profile');
    }
}
