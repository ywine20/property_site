<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Town;
// use App\Models\City;
use Illuminate\Support\Str;

class TownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $towns = Town::all();
        // $cities = City::all();
        return view('admin.township.index', compact('towns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $towns = Town::all();
        // $cities = City::all();
        return view('admin.township.create', compact('towns'));
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

        // $city = City::where('slug', $request->city_slug)->first();
        // if(!$city){
        //     return redirect()->back()->with('error', 'Not found city');
        // }

        Town::create([
            'slug' => Str::slug($request->name) . uniqid(),
            'name' => $request->name,
            // 'city_id' => $city->id,
        ]);
        return redirect('/admin/township')->with('status', 'your township has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $cities = City::all();
        $town = Town::where('slug', $id)->first();
        if (!$town) {
            return redirect()->back()->with('error', 'township not found');
        }
        return view('admin.township.show', compact('town'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $cities = City::all();
        $town = Town::where('slug', $id)->first();
        if (!$town) {
            return redirect()->back()->with('error', 'township not found');
        }
        return view('admin.township.edit', compact('town'));
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

        $town = Town::where('slug', $id)->first();
        if (!$town) {
            return redirect()->back()->with('error', 'township not found');
        }

        // $city = City::where('slug', $request->city_slug)->first();
        // if(!$city){
        //     return redirect()->back()->with('error', 'not found city');
        // }

        Town::where('slug', $id)->update([
            'name' => $request->name,
            // 'city_id' => $city->id,
        ]);
        return redirect('/admin/township')->with('status', 'your township updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $town = Town::where('slug', $id);
        if (!$town->first()) {
            return redirect()->back()->with('error', 'township Not Found');
        }
        $town->delete();
        return redirect('/admin/township')->with('status', 'township deleted successfully');
    }
}
