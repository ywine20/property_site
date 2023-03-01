<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenity;
use App\Models\Category;
use App\Models\City;
use App\Models\Town;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function address()
    {
        $city = City::all();
        $town = Town::all();
        return view('admin.address.address', compact('city', 'town'));
    }

    public function cityCreate()
    {
        return view('admin.address.citycreate');
    }

    public function cityStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        City::create([
            'slug' => Str::slug($request->name).uniqid(),
            'name' => $request->name,
        ]);
        return redirect('/admin/address')->with('success', 'your city&state has been added');
    }

    public function townCreate()
    {
        return view('admin.address.towncreate');
    }

    public function townStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Town::create([
            'slug' => Str::slug($request->name).uniqid(),
            'name' => $request->name,
            // 'city_id' => $city->id,
        ]);
        return redirect('/admin/address')->with('success', 'your township has been added');
    }

    public function destroy($id)
    {
        $city = City::where('id', $id);
        if(!$city->first()){
            return redirect()->back()->with('error', 'there is no city');
        }
        $city->delete();
        return response()->json([
            'status' => 'success',
            'info' => 'delete Successful'
        ]);
    }

    public function delete($id)
    {
        $town = Town::where('id', $id);
        if(!$town->first()){
            return redirect()->back()->with('error', 'there is no town');
        }
        $town->delete();
        return response()->json([
            'status' => 'success',
            'info' => 'delete successful'
        ]);
    }

    public function cityUpdate(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'city_name' => 'required|string|min:3|max:255'
        ]);


        if ($validator->fails()) {
//            $errorText = $validator->messages()->getMessages();
            return redirect()->back()->with('error', 'Something Wrong');
        } else {
            City::where('id', $request->city_id)->update([
                'name' => $request->city_name,
            ]);
        }
        return redirect('/admin/address')->with('status', 'City Updated Successful');


    }

    public function townUpdate(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'town_name' => 'required|string|min:3|max:255'
        ]);
        if ($validator->fails()) {
//            $errorText = $validator->messages()->getMessages();
            return redirect()->back()->with('error', 'Something Wrong');
        } else {
            Town::where('id', $request->town_id)->update([
                'name' => $request->town_name,
            ]);
        }
        return redirect('/admin/address')->with('status', 'Town Updated Successful');
    }

    public function multiDelCity(Request $request){
        $ids = $request->chkCity;
        City::whereIn('id',$ids)->delete();
        return redirect()->back()->with('status','City Multiple Delete Successful');
    }

    public function multiDelTown(Request $request){
        $ids = $request->chkTown;
        Town::whereIn('id',$ids)->delete();
        return redirect()->back()->with('status','Town Multiple Delete Successful');
    }
}
