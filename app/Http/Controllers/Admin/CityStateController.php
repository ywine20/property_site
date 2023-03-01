<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Str;

class CityStateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return view('admin.citystate.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.citystate.create');
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
            'name' => 'required|string',
        ]);
        City::create([
            'slug' => Str::slug($request->name).uniqid(),
            'name' => $request->name,
        ]);
        return redirect('/admin/citystate')->with('success', 'your city&state has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $city = City::where('id', $id)->first();
        if(!$city) {
            return redirect()->back()->with('error', 'city-state not found');
        }
        return view('admin.citystate.show',compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::where('id', $id)->first();
        if(!$city) {
            return redirect()->back()->with('error', 'City & State not found');
        }
        return view('admin.citystate.edit',compact('city'));
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
        'name' => 'required|string',
        ]);
        $city = City::where('id', $id)->first();
        if(!$city) {
            return redirect()->back()->with('error', 'City & State not found');
        }
        City::where('id', $id)->update([
            'name' => $request->name,
        ]);
        return redirect('/admin/citystate')->with('success', 'your city & state updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::where('id', $id);
        if (!$city->first()){
            return redirect()->back()->with('error', 'City & State Not Found');
        }
        $city->delete();
        return redirect('/admin/citystate')->with('success', 'City&State deleted successfully');
    }
}
