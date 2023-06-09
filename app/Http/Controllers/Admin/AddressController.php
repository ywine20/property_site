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
use App\Models\Project;
use Illuminate\Database\QueryException;

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
            'slug' => Str::slug($request->name) . uniqid(),
            'name' => $request->name,
        ]);
        return redirect('/admin/address')->with('success', 'your city or state has been added');
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
            'slug' => Str::slug($request->name) . uniqid(),
            'name' => $request->name,
            // 'city_id' => $city->id,
        ]);
        return redirect('/admin/address')->with('success', 'your township has been added');
    }

    public function destroy($id)
    {

        try {

            $city = City::where('id', $id);
            if (!$city->first()) {
                return redirect()->back()->with('error', 'there is no city');
            }
            // Check if any projects are associated with the category
            $projects = Project::where('city_id', $id)->exists();
            if ($projects) {
                return response()->json([
                    "status" => 'error',
                    "info" => 'Cannot delete the city because it is associated with one or more projects.'
                ]);
            }

            $city->delete();
            return response()->json([
                'status' => 'success',
                'info' => 'delete Successful'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "status" => 'error',
                "info" => 'An error occurred while deleting the city.'
            ]);
        }
    }

    public function delete($id)
    {

        try {

            $town = Town::where('id', $id);
            if (!$town->first()) {
                return redirect()->back()->with('error', 'there is no town');
            }
            // Check if any projects are associated with the category
            $projects = Project::where('township_id', $id)->exists();
            if ($projects) {
                return response()->json([
                    "status" => 'error',
                    "info" => 'Cannot delete the township because it is associated with one or more projects.'
                ]);
            }

            $town->delete();
            return response()->json([
                'status' => 'status',
                'info' => 'delete successful'
            ]);
        } catch (QueryException $e) {
            return response()->json([
                "status" => 'error',
                "info" => 'An error occurred while deleting the city.'
            ]);
        }
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
        return redirect('/admin/address')->with('status', 'Township Updated Successful');
    }



    public function multiDelCity(Request $request)
    {
        $ids = $request->chkCity;

        $associatedCities = Project::whereIn('city_id', $ids)->exists();
        if ($associatedCities) {
            return redirect()->back()->with('error', 'Cannot delete some city because they are associated with one or more projects.');
        }
        City::whereIn('id', $ids)->delete();
        return redirect()->back()->with('status', 'Cities Delete Successful');
    }

    public function multiDelTown(Request $request)
    {
        $ids = $request->chkTown;
        $associatedTownships = Project::whereIn('township_id', $ids)->exists();
        if ($associatedTownships) {
            return redirect()->back()->with('error', 'Cannot delete some township because they are associated with one or more projects.');
        }
        Town::whereIn('id', $ids)->delete();
        return redirect()->back()->with('status', 'Townships Delete Successful');
    }
}
