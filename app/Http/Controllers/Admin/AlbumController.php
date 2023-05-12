<?php

namespace App\Http\Controllers\Admin;

use App\Models\Album;
use App\Models\albumTest;
use Spatie\PdfToImage\Pdf;
use Illuminate\Http\Request;
use App\Models\AlbumTestImage;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\City;
use App\Models\Project;
use App\Models\Town;
use Illuminate\Support\Facades\Storage;


class AlbumController extends Controller
{
    //
    public function create($id)
    {
        return view('admin.album.create', ['projectId' => $id]);
    }

    public function store($projectId, Request $request)
    {

        if ($request->albumName) {
            $album = new albumTest();
            $album->project_id = $request->project_id;
            $album->title = $request->albumName;
        } else {
            $album = new albumTest();
            $album->project_id = $request->project_id;
            $album->title = 'Unitled Album';
        }

        $album->save();

        if ($request->uploadFile) {
            foreach ($request->uploadFile as $file) {
                $newName = "legal_" . uniqid() . "." . $file->extension();
                $file->storeAs('public/images/album', $newName);
                $files = new AlbumTestImage();
                $files->album_tests_id = $album->id;
                $files->image = $newName;
                $files->imageName = $file->getClientOriginalName();
                $files->save();
            }
        }

        $towns = Town::all();
        $categories = Category::all();
        $cities = City::all();
        $amenity = Amenity::all();
        $project = Project::where('id', $request->project_id)
            ->with('categories', 'amenity', 'towns', 'cities')
            ->first();
        if (!$project) {
            return redirect()->back()->with('error', 'Project Not found');
        }

        return 'upload success';

        return view('admin.project.edit', compact('categories', 'project', 'amenity', 'towns', 'cities'))->with('status', 'Files upload success');

        // return redirect()->route('project.detail', $request->project_id);
    }

    public function show($projectId, $id)
    {
        $albums = albumTest::with('albumTestImages')->where('id', $id)->first();
        // return $albums;
        return view('admin.album.show', ['albums' => $albums]);
    }

    public function update(Request $request, $projectId, $id)
    {
        // return $request;
        $album = albumTest::where('id', $id)->first();

        if ($request->albumName) {
            $album->title = $request->albumName;
        }
        $album->update();

        if ($request->uploadFile) {
            foreach ($request->uploadFile as $file) {
                $newName = "legal_" . uniqid() . "." . $file->extension();
                $file->storeAs('public/images/album', $newName);
                $files = new AlbumTestImage();
                $files->image = $newName;
                $files->album_tests_id = $album->id;
                $files->imageName = $file->getClientOriginalName();
                $files->save();
            }
        }

        $towns = Town::all();
        $categories = Category::all();
        $cities = City::all();
        $amenity = Amenity::all();
        $project = Project::where('id', $request->project_id)
            ->with('categories', 'amenity', 'towns', 'cities')
            ->first();
        if (!$project) {
            return redirect()->back()->with('error', 'Project Not found');
        }


        return view('admin.project.edit', compact('categories', 'project', 'amenity', 'towns', 'cities'))->with('status', 'Files upload success');

        // return redirect()->back()->with('status', 'Files upload success');
    }
    //the whole album delete
    public function albumDelete($id)
    {
        $album = AlbumTest::findOrFail($id);

        foreach ($album->albumTestImages as $image) {
            Storage::delete('public/images/album/' . $image->image);
            $image->delete();
            // return $id;
        }
        $album->delete();
        return redirect()->back()->with('status', 'Album deleted successfully.');
    }
    //each delete
    public function imageDel($albumId, $image)
    {
        $image = AlbumTestImage::where('album_tests_id', $albumId)->where('image',$image)->first();

        // Delete the image file from storage
        Storage::delete('public/images/album/' . $image->image);

        // Delete the image record from the database
        $image->delete();

        // Redirect the user back to the previous page with a success message
        return redirect()->back()->with('status', 'Image deleted successfully.');
    }
}
