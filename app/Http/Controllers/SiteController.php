<?php

namespace App\Http\Controllers;

use App\Models\SiteGallery;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function siteindex()
    {
        $sitegalleries = SiteGallery::all();
        return view('site');
    }

    public function sitesave(Request $request)
    {
        $request->validate([
            'galleries.*' => 'required',
            'title' => 'required',
            'description'=>'required',
        ]);

        if ($request->hasFile('galleries')) {
            foreach ($request->file('galleries') as $file) {
                $site_gallery_name = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('/public/site_gallery', $site_gallery_name);
                SiteGallery::create([
                    'title' => $request->title,
                    'description'=>$request->description,
                    'galleries' => $site_gallery_name,
                ]);
            }
        }

        return back()->with('success', 'Albums saved successfully.');
    }
}
