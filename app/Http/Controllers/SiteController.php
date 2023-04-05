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
    return view('site', compact('sitegalleries'));
    }


    public function sitesave(Request $request)
    {
        $request->validate([
            'galleries.*' => 'required',
            'title' => 'required',
            'description'=>'required',
        ]);

  $description = $request->input('description');

    foreach ($request->file('galleries') as $gallery) {
        $galleryName = time() . '_' . $gallery->getClientOriginalName();
        $gallery->storeAs('public/site_gallery', $galleryName);

        $siteGallery = new SiteGallery;
        $siteGallery->title = $request->input('title');
        $siteGallery->description = $description;
        $siteGallery->gallery = $galleryName;
        $siteGallery->save();
    }

        return back()->with('success', 'Albums saved successfully.');
    }




}
