<?php

namespace App\Http\Controllers;

use App\Models\siteProgress;
use App\Http\Requests\StoresiteProgressRequest;
use App\Http\Requests\UpdatesiteProgressRequest;
use Illuminate\Http\Request;

class SiteProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($projectId)
    {
        return view('admin.siteProgress.create', ['projectId' => $projectId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresiteProgressRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresiteProgressRequest $request)
    {
        // return $request;
        //
        $siteProgress = new siteProgress();
        $siteProgress->project_id = $request->project_id;
        $siteProgress->title = $request->title;
        $siteProgress->description = $request->description;

        // store the images and save their paths to the database
        $imagePaths = [];
        foreach ($request->file('images') as $image) {

            $imageName = 'siteProgress' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('/public/images/siteProgress', $imageName);
            $imagePaths[] = $imageName;
        }


        $siteProgress->images = serialize($imagePaths);;

        $siteProgress->save();

        return redirect()->back()->with('success', 'Site progress created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\siteProgress  $siteProgress
     * @return \Illuminate\Http\Response
     */
    public function show(siteProgress $siteProgress, $projectId ,$siteProgressId)
    {

        $siteProgress = siteProgress::findorfail($siteProgressId);
        // unserialize the images
        $images = unserialize($siteProgress->images);

        // pass the images to the view
        return view('admin.siteProgress.show', [
            'siteProgress' => $siteProgress,
            'images' => $images,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\siteProgress  $siteProgress
     * @return \Illuminate\Http\Response
     */
    public function edit(siteProgress $siteProgress,$projectId,$siteProgressId)
    {
        $siteProgress = siteProgress::find($siteProgressId);
        // unserialize the images
        $images = unserialize($siteProgress->images);

        // pass the images to the view
        return view('admin.siteProgress.edit', [
            'siteProgress' => $siteProgress,
            'images' => $images,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesiteProgressRequest  $request
     * @param  \App\Models\siteProgress  $siteProgress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesiteProgressRequest $request, siteProgress $siteProgress)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siteProgress  $siteProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(siteProgress $siteProgress,$projectId,$siteProgressId)
    {
        return $siteProgressId;
    }
}
