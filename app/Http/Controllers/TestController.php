<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\albumTest;
use App\Models\AlbumTestImage;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class TestController extends Controller
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
                $files->save();
            }
        }



        return redirect()->route('project.detail', $request->project_id);
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
                $files->save();
            }
        }

        return redirect()->back()->with('status', 'Files upload success');
    }

    public function imageDelete(Request $request, $albumId, $imageName)
    {
        return $imageName;
    }
}
