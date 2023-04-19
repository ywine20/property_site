<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\siteProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoresiteProgressRequest;
use App\Http\Requests\UpdatesiteProgressRequest;

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
    //  if($request->hasFile("cover")){
    //         $file=$request->file("cover");
    //         $imageName=time().'_'.$file->getClientOriginalName();
    //         $file->storeAs('\public\sitecover',$imageName);
    //         // $file->move(\public_path("cover/"),$imageName);

    //         $progress =new Progress([
    //             "title" =>$request->title,
    //             "body" =>$request->body,
    //             "cover" =>$imageName,
    //         ]);
    //        $progress->save();
    //     }

    // return $request;
    //         $progress =new siteProgress([
    //                         "title" =>$request->title,
    //                         "description" =>$request->description,
    //                         'project_id' => $request->project_id,
    //                     ]);

            $progress = new siteProgress();
            $progress->title = $request->title;
            $progress->description = $request->description;
            $progress->project_id = $request->project_id;
            $progress->save();
            // return $progress;

                foreach($request->file("images") as $file){
                    $imageName='siteProgress'.time().'_'.$file->getClientOriginalName();
                    $file->storeAs('/public/images/siteimages',$imageName);
                    $image = new Image();
                    $image->image = $imageName;
                    $image->siteprogress_id = $progress->id;
                    $image->save();

                }


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

        $siteProgress = siteProgress::with('images')->findorfail($siteProgressId);
        return $siteProgress;
        // unserialize the images
        // $images = unserialize($siteProgress->images);

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
        // return $request;

        $progress=siteProgress::findOrFail($siteprogress);
        $progress->update([
            "title" =>$request->title,
            "body"=>$request->description,
        ]);

        if($request->hasFile("images")){
            $files=$request->file("images");
            foreach($files as $file){
                $imageName='siteProgress'.time().'_'.$file->getClientOriginalName();
                $request["site_progress_id"]=$id;
                $request["image"]=$imageName;
                $file->storeAs('/public/siteimages',$imageName);
                Image::create($request->all());

            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siteProgress  $siteProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(siteProgress $siteProgress,$projectId,$siteProgressId)
    {
        // return $siteProgressId;

         $progresses=siteProgress::findOrFail($siteProgressId);
         $images=Image::where("site_progress_id",$progresses->id)->get();
         foreach($images as $image){
         if (File::exists("public/images/siteimages/".$image->image)) {
            File::delete("public/images/siteimages/".$image->image);
        }
         }
         $progresses->delete();
         return back();


    }

    public function deleteimage($id){
        $images=Image::findOrFail($id);
        if (File::exists("/public/images/siteimages/".$images->image)) {
           File::delete("/public/images/siteimages/".$images->image);
       }

       Image::find($id)->delete();
       return back();
   }
}
