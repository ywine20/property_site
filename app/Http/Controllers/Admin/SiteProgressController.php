<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\siteProgress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
                        $image->site_progress_id = $progress->id;
                        $image->save();

                    }


                    return redirect()->route('siteProgress.show',['projectId'=>$progress->project_id,'id'=>$progress->id])->with('status', 'Site progress created successfully.');
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

                    // pass the images to the view
                    return view('admin.siteProgress.show', [
                        'siteProgress' => $siteProgress,
                        // 'images' => $images,

                    ]);
                    // return $request->all();
                    // return $siteProgress;
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
                    // $images = unserialize($siteProgress->images);

                    // pass the images to the view
                    return view('admin.siteProgress.edit', [
                        'siteProgress' => $siteProgress,
                        // 'images' => $images,

                    ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesiteProgressRequest  $request
     * @param  \App\Models\siteProgress  $siteProgress
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesiteProgressRequest $request, $projectId,$id)
    {

        // return $request->all();
        $progress=siteProgress::findOrFail($id);
        $progress->update([
            "title" =>$request->title,
            "body"=>$request->description,
        ]);

        if($request->images){
            foreach($request->file("images") as $file){
                        $imageName='siteProgress'.time().'_'.$file->getClientOriginalName();
                        $file->storeAs('/public/images/siteimages',$imageName);
                        $image = new Image();
                        $image->image = $imageName;
                        $image->site_progress_id = $progress->id;
                        $image->save();

                    }
        }

                    return redirect()->route('siteProgress.show',['projectId'=>$projectId,'id'=>$id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\siteProgress  $siteProgress
     * @return \Illuminate\Http\Response
     */
    public function destroy(siteProgress $siteProgress,$projectId,$id)
    {
        // return $siteProgressId;

         $siteProgress=siteProgress::findOrFail($id);
         $images=Image::where("site_progress_id",$siteProgress->id)->get();
         foreach($images as $image){
                Storage::delete('public/images/siteimages/'.$image->image);
                $image->delete();
            }
         $siteProgress->delete();
         return back()->with('status','Deleted Successful');


    }

   public function imageDelete($siteProgressId,$id){

        // return $id;
    $siteProgress = SiteProgress::findOrFail($siteProgressId);

    // Find the image by ID and delete it
    $image = Image::findOrFail($id);
    Storage::delete('public/images/siteimages/'.$image->image);
    $image->delete();

    // return redirect()->back()->with('status', 'Image deleted successfully.');
    return redirect()->to(url()->previous()."#imagesDiv")->with('status', 'Image deleted successfully.');

   }
}
