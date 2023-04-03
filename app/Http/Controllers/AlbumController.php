<?php

namespace App\Http\Controllers;


use Session;
use App\Models\Album;
use App\Models\project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ProjectController;
use illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('album', compact('albums'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'albums.*' => 'required',
            'title' => 'required',
        ]);

        if ($request->hasFile('albums')) {
            foreach ($request->file('albums') as $file) {
                $album_name = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('/public/album', $album_name);
                Album::create([
                    'title' => $request->title,
                    'album' => $album_name,
                ]);
            }
        }

        return back()->with('success', 'Albums saved successfully.');
    }

}

